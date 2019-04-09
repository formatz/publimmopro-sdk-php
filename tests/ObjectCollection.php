<?php
use PHPUnit\Framework\TestCase;
use \PublimmoPro\ObjectCollection;

final class ObjectCollectionTest extends TestCase
{
    private $queryResults;

    public function setUp(): void
    {
        $this->queryResults = file_get_contents('resultdata.json');
    }

    public function testConstantsAreCorrectlySet(): void
    {
    }
}
