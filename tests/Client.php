<?php
use PHPUnit\Framework\TestCase;
use \PublimmoPro\Client;

final class ClientTest extends TestCase
{
    private $Client;

    public function setUp(): void
    {
        $this->Client = new Client(99999, 'key');
    }

    public function testConstantsAreCorrectlySet(): void
    {
        $this->assertEquals(Client::APPARTMENT , 1);
        $this->assertEquals(Client::BUILDING , 2);
        $this->assertEquals(Client::COMMERCIAL , 3);
        $this->assertEquals(Client::HOUSE , 4);
        $this->assertEquals(Client::LAND , 5);
        $this->assertEquals(Client::PARKING , 6);
        $this->assertEquals(Client::BUY , 1);
        $this->assertEquals(Client::RENT , 2);

        $this->assertEquals(Client::SORT_BY_PRICE, 0);
        $this->assertEquals(Client::SORT_BY_ROOMS, 1);
        $this->assertEquals(Client::SORT_BY_SURFACE, 2);
        $this->assertEquals(Client::SORT_BY_CREATED_AT, 3);

        $this->assertEquals(Client::AVAILABILITY_IS_AVAILABLE, 0);
        $this->assertEquals(Client::AVAILABILITY_IS_RESERVED, 1);
        $this->assertEquals(Client::AVAILABILITY_IS_SOLD, 2);
        $this->assertEquals(Client::AVAILABILITY_IS_OPTION, 3);

        $this->assertEquals(Client::LOCATION_TYPE_WEEK, 1);
        $this->assertEquals(Client::LOCATION_TYPE_SEASON, 2);
        $this->assertEquals(Client::LOCATION_TYPE_YEAR, 3);

        $this->assertEquals(Client::PROMOTION_TYPE_NOT_PROMOTION, 0);
        $this->assertEquals(Client::PROMOTION_TYPE_NEW, 1);
        $this->assertEquals(Client::PROMOTION_TYPE_PROMOTION, 2);
    }

    public function testQueryUrlCanBeBuilt(): void
    {
        $query = $this->Client->getQueryURL();
        $this->assertEquals($query, 'http://syn.publimmo.ch/api/v1/99999/objets?key=key&listPhotos=1&extendedInfos=1');
    }

    public function testOneTypeCanBeSet(): void
    {
        $queryUrl = $this->Client->setType(Client::APPARTMENT)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'type_1='.Client::APPARTMENT) !== false);
    }

    public function testUpToSixTypesCanBeSet(): void
    {
        $queryUrl = $this->Client->setType(
            Client::APPARTMENT,
            Client::BUILDING,
            Client::COMMERCIAL,
            Client::HOUSE,
            Client::LAND,
            Client::PARKING
        )->getQueryURL();

        $this->assertTrue(strpos($queryUrl, 'type_1='.Client::APPARTMENT) !== false, 'type 1 is Appartment');
        $this->assertTrue(strpos($queryUrl, 'type_2='.Client::BUILDING) !== false, 'type 2 is Building');
        $this->assertTrue(strpos($queryUrl, 'type_3='.Client::COMMERCIAL) !== false, 'type 3 is Commercial');
        $this->assertTrue(strpos($queryUrl, 'type_4='.Client::HOUSE) !== false, 'type 4 is House');
        $this->assertTrue(strpos($queryUrl, 'type_5='.Client::LAND) !== false, 'type 5 is Land');
        $this->assertTrue(strpos($queryUrl, 'type_6='.Client::PARKING) !== false, 'type 6 is Parking');
    }

    public function testTypeCannotBeEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setType()->getQueryURL();
    }

    public function testPromotionTypeCanBeSet(): void
    {
        $queryUrl = $this->Client->setPromotionType(0)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'p=0') !== false);
    }

    public function testPriceRangeCanBeSet(): void
    {
        $queryUrl = $this->Client->setPriceRange(0, 3000)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'prixMin=0') !== false);
        $this->assertTrue(strpos($queryUrl, 'prixMax=3000') !== false);
    }

    public function testPriceRangeCannotHaveMaxValueHigherThanMinValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setPriceRange(3000, 0)->getQueryURL();
    }

    public function testSurfaceRangeCanBeSet(): void
    {
        $queryUrl = $this->Client->setSurfaceRange(0, 300)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'surfaceMin=0') !== false);
        $this->assertTrue(strpos($queryUrl, 'surfaceMax=300') !== false);
    }

    public function testSurfaceRangeCannotHaveMaxValueHigherThanMinValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setSurfaceRange(300, 0)->getQueryURL();
    }

    public function testRoomRangeCanBeSet(): void
    {
        $queryUrl = $this->Client->setRoomRange(0, 3)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'pieceMin=0') !== false);
        $this->assertTrue(strpos($queryUrl, 'pieceMax=3') !== false);
    }

    public function testRoomRangeCannotHaveMaxValueHigherThanMinValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setRoomRange(3, 0)->getQueryURL();
    }

    public function testCityIdCanBeSet(): void
    {
        $queryUrl = $this->Client->setCityId(1000)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'commune=1000') !== false);
    }

    public function testDistanceCanBeSet(): void
    {
        $queryUrl = $this->Client->setDistance(40)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'dist=40') !== false);
    }

    public function testRegionCanBeSet(): void
    {
        $queryUrl = $this->Client->setRegion(2)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'region=2') !== false);
    }

    public function testIdCanBeSet(): void
    {
        $queryUrl = $this->Client->setReference(8989)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'id=8989') !== false);
    }

    public function testSearchStringCanBeSet(): void
    {
        $queryUrl = $this->Client->setSearchString('piscine')->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'ns=piscine') !== false);
    }

    public function testCountryCanBeSet(): void
    {
        $queryUrl = $this->Client->setCountry('ch')->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'pays=ch') !== false);
    }

    public function testCountryCharactersLengthMustBeTwo(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setCountry('fr_ch')->getQueryURL();
    }

    public function testCityCanBeSet(): void
    {
        $queryUrl = $this->Client->setCity('Lausanne')->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'loc=Lausanne') !== false);
    }

    public function testTransactionCanBeSet(): void
    {
        $queryUrl = $this->Client->setTransaction(Client::BUY)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 't='.Client::BUY) !== false);

        $queryUrl = $this->Client->setTransaction(Client::RENT)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 't='.Client::RENT) !== false);
    }

    public function testTransactionCanOnlyBeOfPredefinedTypes(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setTransaction(0)->getQueryURL();
    }

    public function testSelfOnlyCanBeSet(): void
    {
        $queryUrl = $this->Client->setSelfOnly()->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'selfonly=1') !== false);
    }

    public function testSortCanBeSet(): void
    {
        $queryUrl = $this->Client->setOrder(Client::SORT_BY_PRICE)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'tri='.Client::SORT_BY_PRICE) !== false);

        $queryUrl = $this->Client->setOrder(Client::SORT_BY_ROOMS)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'tri='.Client::SORT_BY_ROOMS) !== false);

        $queryUrl = $this->Client->setOrder(Client::SORT_BY_SURFACE)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'tri='.Client::SORT_BY_SURFACE) !== false);

        $queryUrl = $this->Client->setOrder(Client::SORT_BY_CREATED_AT)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'tri='.Client::SORT_BY_CREATED_AT) !== false);
    }

    public function testSortCanOnlyBeOfPredefinedTypes(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setOrder(6)->getQueryURL();
    }

    public function testSortDirectionCanBeSet(): void
    {
        $queryUrl = $this->Client->setOrder(Client::SORT_BY_CREATED_AT, 'asc')->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'triSens=2') !== false);

        $queryUrl = $this->Client->setOrder(Client::SORT_BY_CREATED_AT, 'desc')->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'triSens=1') !== false);
    }

    public function testSortDirectionCanOnlyBeOfPredefinedType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setOrder(Client::SORT_BY_CREATED_AT, 'asc,desc')->getQueryURL();
    }

    public function testLanguageCanBeSet(): void
    {
        $queryUrl = $this->Client->setLanguage('en')->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'ul=en') !== false);
    }

    public function testLanguageCanOnlyBeOfPredefinedType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setLanguage('it')->getQueryURL();
    }

    public function testIdsCanBeSet(): void
    {
        $queryUrl = $this->Client->setIds(2000,3000)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'ids=2000%2C3000') !== false);
    }

    public function testIdsCannotBeEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setIds()->getQueryURL();
    }

    public function testCourtierIdCanBeSet(): void
    {
        $queryUrl = $this->Client->setCourtierId(1999)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'courtierId=1999') !== false);
    }

    public function testForeignersCanBeSet(): void
    {
        $queryUrl = $this->Client->setForeigners()->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'foreigners=1') !== false);
    }

    public function testDisponibliteCanBeSet(): void
    {
        $queryUrl = $this->Client->setDisponiblite(Client::AVAILABILITY_IS_AVAILABLE)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'disponiblite='.Client::AVAILABILITY_IS_AVAILABLE) !== false);

        $queryUrl = $this->Client->setDisponiblite(Client::AVAILABILITY_IS_RESERVED)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'disponiblite='.Client::AVAILABILITY_IS_RESERVED) !== false);

        $queryUrl = $this->Client->setDisponiblite(Client::AVAILABILITY_IS_SOLD)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'disponiblite='.Client::AVAILABILITY_IS_SOLD) !== false);

        $queryUrl = $this->Client->setDisponiblite(Client::AVAILABILITY_IS_OPTION)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'disponiblite='.Client::AVAILABILITY_IS_OPTION) !== false);
    }

    public function testDisponibliteCanOnlyBeOfPredefinedTypes(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setDisponiblite(60)->getQueryURL();
    }

    public function testResidenceSecondaireCanBeSet(): void
    {
        $queryUrl = $this->Client->setResidenceSecondaire(true)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'residenceSecondaire=1') !== false);

        $queryUrl = $this->Client->setResidenceSecondaire(false)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'residenceSecondaire=2') !== false);
    }

    public function testLocationTypeCanBeSet(): void
    {
        $queryUrl = $this->Client->setLocationType(Client::LOCATION_TYPE_WEEK)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'locationType='.Client::LOCATION_TYPE_WEEK) !== false);

        $queryUrl = $this->Client->setLocationType(Client::LOCATION_TYPE_SEASON)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'locationType='.Client::LOCATION_TYPE_SEASON) !== false);

        $queryUrl = $this->Client->setLocationType(Client::LOCATION_TYPE_YEAR)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'locationType='.Client::LOCATION_TYPE_YEAR) !== false);
    }

    public function testLocationTypeCanOnlyBeOfPredefinedTypes(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $queryUrl = $this->Client->setLocationType(60)->getQueryURL();
    }

    public function testNpaOrderCanBeSet(): void
    {
        $queryUrl = $this->Client->setNpaOrder(1000)->getQueryURL();
        $this->assertTrue(strpos($queryUrl, 'npaOrder=1000') !== false);
    }
}
