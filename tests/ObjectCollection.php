<?php
use PHPUnit\Framework\TestCase;
use \PublimmoPro\ObjectCollection;

final class ObjectCollectionTest extends TestCase
{
    private $queryResults;
    private $Collection;

    public function setUp(): void
    {
        $this->queryResults = json_decode(file_get_contents(__dir__.'/searchResults.json'));
        $this->Collection = new ObjectCollection($this->queryResults->results, $this->queryResults->resultTotal);
    }

    public function testGetTotalReturnsTotal(): void
    {
        $this->assertEquals($this->queryResults->resultTotal, $this->Collection->getTotal());
    }

    public function testGetReturnsResults(): void
    {
        $this->assertEquals($this->queryResults->results, $this->Collection->get());
    }

    public function testInclusiveFilterReturnsOnlyIncludedObjects(): void
    {
        // get objects to filter
        $objectsToFilter = array_splice($this->queryResults->results, 0, 3);
        $objectsToFilter = array_map(function($object) {
            return $object->id;
        }, $objectsToFilter);

        $filteredResults = $this->Collection->filter('include', $objectsToFilter)->get();

        $filteredResults = array_map(function($object) {
            return $object->id;
        }, $filteredResults);

        $this->assertEquals($objectsToFilter, $filteredResults);
    }

    public function testExclusiveFilterDoesNotReturnExcludedObjects(): void
    {
        // get objects to filter
        $objectsToFilter = array_splice($this->queryResults->results, 0, 3);
        $objectsToFilter = array_map(function($object) {
            return $object->id;
        }, $objectsToFilter);

        $filteredResults = $this->Collection->filter('exclude', $objectsToFilter)->get();

        $filteredResults = array_map(function($object) {
            return $object->id;
        }, $filteredResults);

        $this->assertNotEquals(count($objectsToFilter), count($filteredResults));
        $this->assertTrue($objectsToFilter !== $filteredResults);
    }

    public function testSortDescUsingOneInstruction(): void
    {
        $sortedResults = $this->Collection->sort('prix:desc:integer')->get();

        array_reduce($sortedResults, function($acc, $object) {

            $price = filter_var(rtrim($object->prix ?? '', '-'), FILTER_SANITIZE_NUMBER_INT);

            if ($acc !== null) {
                $this->assertGreaterThanOrEqual($price, $acc);
            }

            $acc = $price;
            return $acc;
        }, null);
    }

    public function testSortAscUsingOneInstruction(): void
    {
        $sortedResults = $this->Collection->sort('prix:asc:integer')->get();

        array_reduce($sortedResults, function($acc, $object) {

            $price = filter_var(rtrim($object->prix ?? '', '-'), FILTER_SANITIZE_NUMBER_INT);

            if ($acc !== null) {
                $this->assertLessThanOrEqual($price, $acc);
            }

            $acc = $price;
            return $acc;
        }, null);
    }

    public function testSortUsingMultipleInstructions(): void
    {
        $sortedResults = $this->Collection->sort(['prix:desc:integer', 'pieces:desc:float'])->get();

        array_reduce($sortedResults, function($acc, $object) {

            $price = filter_var(rtrim($object->prix ?? '', '-'), FILTER_SANITIZE_NUMBER_INT);
            $room = $object->pieces;

            if ($acc['price'] !== null) {
                $this->assertGreaterThanOrEqual($price, $acc['price']);
            }

            // jumping to another category of price will reset the comparaison counter of rooms
            if ($price !== $acc['price']) {
                $acc['room'] = null;
            }

            if ($acc['room'] !== null) {
                $this->assertGreaterThanOrEqual($room, $acc['room'],  $acc['room'].'>='. $room);
            }

            $acc = ['price' => $price, 'room' => $room];
            return $acc;
        }, ['price' => null, 'room' => null]);
    }

    public function testSortUsingWrongOrderRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $sortedResults = $this->Collection->sort('prix:wrong:integer')->get();
    }
}
