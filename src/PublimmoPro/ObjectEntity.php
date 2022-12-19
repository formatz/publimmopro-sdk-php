<?php

namespace PublimmoPro;

class ObjectEntity
{
    /** @var object rawObject represents the Object as received in constructor parameter */
    private $rawObject;

    public function __construct(object $result)
    {
        $this->rawObject = $result;
    }

    /**
     * Get raw Object as passed to the constructor
     */
    public function raw()
    {
        return $this->rawObject;
    }

    /**
     * Check if the object is an object from the network
     */
    public function isFromNetwork() {
        // objects in the network have no contact name, but a courtierPrincipal
        return !isset($this->rawObject->contact->name) && !empty($this->rawObject->contact->courtierPrincipal);
    }

    /**
     * Check if the object is a promotion object
     **/
    public function isPromotion() {
        if (
            (isset($this->rawObject->type) && $this->rawObject->typeCode == self::PROMOTION_CODE)
            || isset($this->rawObject->promotionId)
            || (isset($this->rawObject->promotionTable) && count($this->rawObject->promotionTable)>0)
            || isset($this->rawObject->inPromotionTable)
        )
        {
        	return true;
        } else {
            return false;
        }
    }

    /**
     * Check if the object is of the given type using the typeCode field
     *
     * @param  int  $objectType type of object
     *
     * @return boolean             whether the object's type is the one we've asked for
     */
    public function isType(int $objectType){
        if (!in_array($objectType, [Client::APPARTMENT, Client::BUILDING, Client::COMMERCIAL, Client::HOUSE, Client::LAND, Client::PARKING])) {
            throw new \InvalidArgumentException('Type parameter should be one of Client::APPARTMENT, Client::BUILDING, Client::COMMERCIAL, Client::HOUSE, Client::LAND, Client::PARKING');
        }

        return $this->rawObject->typeCode == $objectType;
    }
}
