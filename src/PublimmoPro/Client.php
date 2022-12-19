<?php

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

    /** @var int SORT_BY_PRICE Internal number for sorting by price */
    public const SORT_BY_PRICE = 0;

    /** @var int SORT_BY_ROOMS Internal number for sorting by rooms */
    public const SORT_BY_ROOMS = 1;

    /** @var int SORT_BY_SURFACE Internal number for sorting by surface */
    public const SORT_BY_SURFACE = 2;

    /** @var int SORT_BY_CREATED_AT Internal number for sorting by creation date */
    public const SORT_BY_CREATED_AT = 3;

    /** @var int AVAILABILITY_IS_AVAILABLE Internal number for availability is available */
    public const AVAILABILITY_IS_AVAILABLE = 0;

    /** @var int AVAILABILITY_IS_RESERVED Internal number for availability is reserved */
    public const AVAILABILITY_IS_RESERVED = 1;

    /** @var int AVAILABILITY_IS_SOLD Internal number for availability is sold */
    public const AVAILABILITY_IS_SOLD = 2;

    /** @var int AVAILABILITY_IS_OPTION Internal number for availability is option */
    public const AVAILABILITY_IS_OPTION = 3;

    /** @var int LOCATION_TYPE_WEEK Internal number for weekly location type */
    public const LOCATION_TYPE_WEEK = 1;

    /** @var int LOCATION_TYPE_SEASON Internal number for season location type */
    public const LOCATION_TYPE_SEASON = 2;

    /** @var int LOCATION_TYPE_YEAR Internal number for yearly location type */
    public const LOCATION_TYPE_YEAR = 3;

    /** @var int PROMOTION_TYPE_NOT_PROMOTION Internal number all objects but promotion */
    public const PROMOTION_TYPE_NOT_PROMOTION = 0;

    /** @var int PROMOTION_TYPE_NEW Internal number for new objects type */
    public const PROMOTION_TYPE_NEW = 1;

    /** @var int PROMOTION_TYPE_PROMOTION Internal number for promotion type */
    public const PROMOTION_TYPE_PROMOTION = 2;


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

    /** @var int $sousType subType of the requested object (must use only type_1) */
    private $sousType;

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

    /** @var int $plaquetteUrl Url to a brochure pdf file */
    private $plaquetteUrl;

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
            throw new \InvalidArgumentException('setType requires at least one parameter');
        }

        foreach ($types as $k => $type) {
            $this->{'type_'.($k+1)} = $type;
        }

        return $this;
    }

    public function setSubType(int $subtype)
    {
        $this->sousType = $subtype;

        return $this;
    }

    public function setPromotionType(int $type)
    {
        $this->p = $type;

        return $this;
    }

    public function setRange(string $type, int $min, int $max)
    {
        if ($min > $max) {
            throw new \InvalidArgumentException('min value cannot be higher than max value.');
        }

        switch ($type) {
            case 'price':
                $this->prixMin = $min;
                $this->prixMax = $max;
                break;

            case 'surface':
                $this->surfaceMin = $min;
                $this->surfaceMax = $max;
                break;
            
            case 'room':
                $this->pieceMin = $min;
                $this->pieceMax = $max;
                break;

            default:
                throw new \InvalidArgumentException('range type should be one of "price", "surface" or "room".');
        }

        return $this;
    }

    public function setCityId(int $cityId)
    {
        $this->commune = $cityId;

        return $this;
    }

    public function setDistance(int $distance)
    {
        $this->dist = $distance;

        return $this;
    }

    public function setRegion(int $region)
    {
        $this->region = $region;

        return $this;
    }

    public function setReference($ref)
    {
        $this->id = $ref;

        return $this;
    }

    public function setSearchString(string $searchString)
    {
        $this->ns = $searchString;

        return $this;
    }

    public function setCountry(string $countryCode)
    {
        if (strlen($countryCode) !== 2) {
            throw new \InvalidArgumentException('Country code must respect ISO 3166-alpha2 format (2 characters code)');
        }

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
        if ($transaction !== 1 && $transaction !== 2 ) {
            throw new \InvalidArgumentException('Transaction should be 1 (Client::BUY) or 2 (Client::RENT)');
        }

        $this->t = $transaction;

        return $this;
    }

    public function setSelfOnly()
    {
        $this->selfonly = 1;

        return $this;
    }

    public function setOrder(int $sortBy, string $sortDirection = null)
    {
        if (!in_array($sortBy, [self::SORT_BY_PRICE, self::SORT_BY_ROOMS, self::SORT_BY_SURFACE, self::SORT_BY_CREATED_AT])) {
            throw new \InvalidArgumentException('Sort criterion should be one of '.self::SORT_BY_PRICE. '(Client::SORT_BY_PRICE), '.self::SORT_BY_ROOMS. '(Client::SORT_BY_ROOMS), '.self::SORT_BY_SURFACE. '(Client::SORT_BY_SURFACE), '.self::SORT_BY_CREATED_AT. '(Client::SORT_BY_CREATED_AT)');
        }

        if ($sortDirection == 'asc') {
            $this->triSens = 2;
        } elseif ($sortDirection == 'desc') {
            $this->triSens = 1;
        } elseif (!empty($sortDirection)) {
            throw new \InvalidArgumentException('Sort direction should be either "asc" or "desc"');
        }

        $this->tri = $sortBy;

        return $this;
    }

    public function setLanguage(string $ul)
    {
        if (!in_array($ul, ['fr', 'en', 'de'])) {
            throw new \InvalidArgumentException('Language code should be one of "fr", "en" or "de"');
        }

        $this->ul = $ul;

        return $this;
    }

    public function setIds(int ...$ids)
    {
        if (empty($ids)) {
            throw new \InvalidArgumentException('setIds requires at least one parameter');
        }

        $this->ids = implode(',',$ids);

        return $this;
    }

    public function setCourtierId(int $id)
    {
        $this->courtierId = $id;

        return $this;
    }

    public function setForeigners()
    {
        $this->foreigners = 1;
        return $this;
    }

    public function setDisponiblite(int $disponibility)
    {
        if (!in_array($disponibility, [self::AVAILABILITY_IS_AVAILABLE, self::AVAILABILITY_IS_RESERVED, self::AVAILABILITY_IS_SOLD, self::AVAILABILITY_IS_OPTION])) {
            throw new \InvalidArgumentException('Availability parameter should be one of '.self::AVAILABILITY_IS_AVAILABLE. '(Client::AVAILABILITY_IS_AVAILABLE), '.self::AVAILABILITY_IS_RESERVED.'(Client::AVAILABILITY_IS_RESERVED), '.self::AVAILABILITY_IS_SOLD. '(Client::AVAILABILITY_IS_SOLD), '.self::AVAILABILITY_IS_OPTION.'(Client::AVAILABILITY_IS_OPTION)');
        }

        $this->disponiblite = $disponibility;
        return $this;
    }

    public function setResidenceSecondaire(bool $state)
    {
        $this->residenceSecondaire = $state ? 1 : 2;
        
        return $this;
    }

    public function setLocationType(int $type)
    {
        if (!in_array($type, [self::LOCATION_TYPE_WEEK, self::LOCATION_TYPE_SEASON, self::LOCATION_TYPE_YEAR])) {
            throw new \InvalidArgumentException('Type parameter should be one of '.self::LOCATION_TYPE_WEEK. '(Client::LOCATION_TYPE_WEEK), '.self::LOCATION_TYPE_SEASON.'(Client::LOCATION_TYPE_SEASON), '.self::LOCATION_TYPE_YEAR. '(Client::LOCATION_TYPE_YEAR)');
        }

        $this->locationType = $type;

        return $this;
    }

    public function setNpaOrder(int $npaOrder)
    {
        $this->npaOrder = $npaOrder;

        return $this;
    }

    public function getQueryURL()
    {
        $args = array_filter(get_object_vars($this), function ($arg) {
            // accepts 0 values
            return !empty($arg) || $arg === 0;
        });

        $args['idagence'] = null;

        return self::API_URL.'/'.$this->idagence.'/objets?'.http_build_query($args);
    }

    public function query(int $id = null)
    {
        if ($id !== null && is_int($id)) {
            // this is an object query
            $response = $this->fetch(self::API_URL.'/'.$this->idagence.'/objets/'.$id);

            if (empty($response)) {
                return false;
            }

            return new ObjectEntity($response);
        } elseif ($id === null) {
            // this is a search query
            $response = $this->fetch($this->getQueryURL());

            if (empty($response)) {
                return false;
            }

            return new ObjectCollection($response->results, $response->resultTotal);
        }
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

