<?php
use PHPUnit\Framework\TestCase;
use PublimmoPro\Client;
use \PublimmoPro\ObjectEntity;

final class ObjectEntityTest extends TestCase
{
    private $queryResult;
    private $Object;

    public function setUp(): void
    {
        $this->queryResult = json_decode(file_get_contents(__dir__.'/objectResult.json'));
        $this->Object = new ObjectEntity($this->queryResult);

        $this->ObjectPromotion = new ObjectEntity(json_decode(file_get_contents(__dir__.'/objectPromotion.json')));
        $this->ObjectInPromotion = new ObjectEntity(json_decode(file_get_contents(__dir__.'/objectInPromotion.json')));
        $this->ObjectInNetwork = new ObjectEntity(json_decode(file_get_contents(__dir__.'/objectInNetwork.json')));
    }

    public function testRawReturnsSameObject()
    {
        $this->assertEquals($this->Object->raw(), $this->queryResult);
    }

    public function testObjectIsFromNetwork()
    {
        $this->assertEquals($this->ObjectInNetwork->isFromNetwork(), true);
        $this->assertEquals($this->Object->isFromNetwork(), false);
        $this->assertEquals($this->ObjectPromotion->isFromNetwork(), false);
        $this->assertEquals($this->ObjectInPromotion->isFromNetwork(), false);
    }

    public function testObjectIsPromotion()
    {
        $this->assertEquals($this->ObjectPromotion->isPromotion(), true);
        $this->assertEquals($this->ObjectInPromotion->isPromotion(), true);
        $this->assertEquals($this->ObjectInNetwork->isPromotion(), false);
        $this->assertEquals($this->Object->isPromotion(), false);
    }

    public function testIsType()
    {
        $this->assertTrue($this->Object->isType(Client::APPARTMENT));
        $this->assertFalse($this->Object->isType(Client::HOUSE));
    }

    public function testIsTypeArgumentCanOnlyBeOfPredefinedType()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->Object->isType(985);
    }
}
