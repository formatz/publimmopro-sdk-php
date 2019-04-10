<?php
use PHPUnit\Framework\TestCase;
use \PublimmoPro\ObjectEntity;

final class ObjectEntityTest extends TestCase
{
    private $queryResults;
    private $Collection;

    public function setUp(): void
    {
        $this->queryResults = json_decode(file_get_contents(__dir__.'/searchResults.json'));
        $this->Collection = new ObjectCollection($this->queryResults->results, $this->queryResults->resultTotal);
    }
}
