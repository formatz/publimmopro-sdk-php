<?php
use PublimmoPro\ObjectCollection;
use PublimmoPro\ObjectEntity;

namespace PublimmoPro;

class Client
{
    /** @var int APPARTMENT Internal number for object of type appartment */
    public const APPARTMENT = 1;

    /** @var int BUILDING Internal number for object of type building */
    public const BUILDING = 2;

    /** @var int COMMERCIAL Internal number for object of type commercial */
    public const COMMERCIAL = 3;

    /** @var int HOUSE Internal number for object of type house */
    public const HOUSE = 4;

    /** @var int LAND Internal number for object of type land */
    public const LAND = 5;

    /** @var int PARKING Internal number for object of type parking */
    public const PARKING = 6;

    /** @var int BUY Internal number for transaction of type buy */
    public const BUY = 1;

    /** @var int RENT Internal number for transaction of type rent */
    public const RENT = 2;



    /** @var string API_URL holds the api URL */
    private const API_URL = 'http://syn.publimmo.ch/api/v1';

    /** @var int $idagence Publimmo Agency ID */
    private $idagence;

    /** @var string $key Publimmo Agency Key */
    private $key;

    /** @var int $type_1 1st type of requested object */
    private $type_1;

    /** @var int $type_2 2nd type of requested object */
    private $type_2;

    /** @var int $type_3 3rd type of requested object */
    private $type_3;

    /** @var int $type_4 4th type of requested object */
    private $type_4;

    /** @var int $type_5 5th type of requested object */
    private $type_5;

    /** @var int $type_6 6th type of requested object */
    private $type_6;

    /** @var int $p The type of promotion */
    private $p; //| int | 1 | 2=Fiches promotions uniquement,1=Objets neufs/promotion uniquement, 0=Objets (par défaut) |

    /** @var array $prixMin Price range */
    private $prixMin;

    /** @var array $prixMax Price range */
    private $prixMax;

    /** @var array $surfaceMin Surface range */
    private $surfaceMin;

    /** @var array $surfaceMax Surface range */
    private $surfaceMax;

    /** @var array $pieceMin Room range */
    private $pieceMin;

    /** @var array $pieceMax Room range */
    private $pieceMax;

    /** @var int $commune ID of the city */
    private $commune;

    /** @var int $dist Distance from the center of the city */
    private $dist;

    /** @var int $region ID of the region */
    private $region;

    /** @var int $id Object ID */
    private $id;

    /** @var string $ns Search keywords */
    private $ns;

    /** @var string $pays Country in ISO 3166-alpha2 */
    private $pays;

    /** @var string $loc City name */
    private $loc;

    /** @var string $t Transaction type */
    private $t;

    /** @var int $selfOnly In a network, display only the agency objects */
    private $selfOnly; // | int | 1 | N'affiche que les objets de l'agence/groupe |

    /** @var int $tri Sort criteria */
    private $tri; // (0=Prix, 1=Nombre de pièces, 2=Surface,3=Date de création) |

    /** @var int $triSens Sort order */
    private $triSens; //(1=décroissant,2=croissant)

    /** @var string $ul User language */
    private $ul; //(fr,en ou de)

    /** @var string $ids Objects IDs, seperated by comas */
    private $ids;

    /** @var int $courtierId Display only objects assigned to this courtier */
    private $courtierId;

    /** @var int $foreigners Show objects allowed to be selled to foreigners */
    private $foreigners;

    /** @var int $disponiblite Code of disponibility */
    private $disponiblite; //(0=disponible,1=reserve,2=vendu,3=option) |

    /** @var int $residenceSecondaire Secondary residence allowed */
    private $residenceSecondaire; // (1=OUI, 2=NON)

    /** @var int $locationType Type of rental */
    private $locationType; // (1=semaine,2=saison,3=année)

    /** @var int $npaOrder Sort results beginning by this ZIPCode */
    private $npaOrder;

    /** @var int $listPhotos Allow listing of pictures */
    private $listPhotos = 1;

    /** @var int $extendedInfos Allow to get more infos per object */
    private $extendedInfos = 1;

    /**
     * Class constructor
     */
    public function __construct(int $id, string $key) {
        $this->idagence = $id;
        $this->key = $key;
    }

    public function setType(int ...$types)
    {
        if (empty($types)) {
            throw new \Exception('setType requires at least one parameter');
        }

        foreach ($types as $k => $type) {
            $this->{'type_'.($k+1)} = $type;
        }

        return $this;
    }

    public function setPromotionType(int $type)
    {
        $this->p = $type;

        return $this;
    }

    public function setPriceRange(int $min, int $max)
    {
        $this->prixMin = $min;
        $this->prixMax = $max;

        return $this;
    }

    public function setSurfaceRange(int $min, int $max)
    {
        $this->surfaceMin = $min;
        $this->surfaceMax = $max;

        return $this;
    }

    public function setRoomRange(int $min, int $max)
    {
        $this->pieceMin = $min;
        $this->pieceMax = $max;

        return $this;
    }

    public function setCityId(int $cityId)
    {
        $this->commune = $cityId;

        return $this;
    }

    public function setDist(int $dist)
    {
        $this->dist = $dist;

        return $this;
    }

    public function setRegion(int $region)
    {
        $this->region = $region;

        return $this;
    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function setSearchString(string $searchString)
    {
        $this->ns = $searchString;

        return $this;
    }

    public function setCountry(string $countryCode)
    {
        $this->pays = $countryCode;

        return $this;
    }

    public function setCity(string $city)
    {
        $this->loc = $city;

        return $this;
    }

    public function setTransaction(int $transaction)
    {
        $this->t = $transaction;

        return $this;
    }

    public function setSelfOnly(int $selfOnly)
    {
        $this->selfonly = $selfOnly;

        return $this;
    }

    public function setSort(int $sortBy)
    {
        $this->tri = $sortBy;

        return $this;
    }

    public function setTriSens(int $sortDirection)
    {
        $this->triSens = $sortDirection;

        return $this;
    }

    public function setLanguage(string $ul)
    {
        $this->ul = $ul;

        return $this;
    }

    public function setIds(string $ids)
    {
        $this->ids = $ids;

        return $this;
    }

    public function setCourtierId(int $id)
    {
        $this->courtierId = $id;

        return $this;
    }

    public function setForeigners(bool $isForeigner)
    {
        $this->foreigners = $isForeigner;
        return $this;
    }

    public function setDisponiblite(int $disponibility)
    {
        $this->disponibilite = $disponibility;

        return $this;
    }

    public function setResidenceSecondaire(int $allow)
    {
        $this->residenceSecondaire = $allow;
        
        return $this;
    }

    public function setLocationType(int $type)
    {
        $this->locationType = $type;

        return $this;
    }

    public function setNpaOrder(int $npaOrder)
    {
        $this->npaOrder = $npaOrder;

        return $this;
    }

    public function query()
    {
        $args = array_filter(get_object_vars($this));
        $args['idagence'] = null;

        $results = $this->fetch(self::API_URL.'/'.$this->idagence.'/objets?'.http_build_query($args));

        return new ObjectCollection($results->results, $results->resultTotal);
    }

    private function fetch($url){
        $url = str_replace(' ','%20',$url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        $result = curl_exec($ch);

        if (curl_error($ch)) {
            throw new \Exception(curl_error($ch));
        }

        curl_close($ch);
        return json_decode($result);
    }
}

