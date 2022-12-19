<?php

namespace PublimmoPro;

class Subtypes
{
    /** @var array APPARTMENT Internal number for object of subtype appartment */
    public const APPARTMENT = [
        'appartement' => 0,
        'studio' => 1,
        'loft' => 2,
        'attique' => 3,
        'duplex' => 4,
        'meuble' => 5,
        'terrasse' => 6,
    ];

    /** @var array BUILDING Internal number for object of subtype building */
    public const BUILDING = [
        'mixte' => 0,
        'industriel' => 1,
        'commercial' => 2,
        'locatif' => 3,
    ];

    /** @var array COMMERCIAL Internal number for object of subtype commercial */
    public const COMMERCIAL = [
        'administratif' => 0,
        'arcade' => 1,
        'depot' => 2,
        'artisanal' => 3,
        'industriel' => 4,
        'restaurant' => 5,
        'halle' => 6,
        'garage' => 7,
        'hotel' => 8,
        'aremettre' => 9,
        'cafe' => 10,
        'kiosk' => 11,
        'viticole' => 12,
    ];

    /** @var array HOUSE Internal number for object of subtype house */
    public const HOUSE = [
        'villaindividuelle' => 0,
        'villajumelle' => 1,
        'villacontigue' => 2,
        'villamitoyenne' => 3,
        'maisonmultiapp' => 4,
        'proprietemaitre' => 5,
        'maisonvillage' => 6,
        'ferme' => 7,
        'corpsferme' => 8,
        'chateau' => 9,
        'chalet' => 10,
        'villa' => 11,
        'maison' => 12,
        'grange' => 13,
        'terrasse' => 14,
    ];

    /** @var array LAND Internal number for object of subtype land */
    public const LAND = [
        'villa' => 0,
        'immeuble' => 1,
        'industriel' => 2,
        'agricole' => 3,
        'commercial' => 4,
    ];

    /** @var array PARKING Internal number for object of subtype parking */
    public const PARKING = [
        'place_ouverte' => 0,
        'place_couverte' => 1,
        'garage_individuel' => 2,
        'garage_double' => 3,
        'place_souterraine' => 4,
        'halle_bateaux' => 6,
        'place_exterieure_bateaux' => 7,
        'halle_motos' => 8,
        'place_exterieure_motos' => 9,
        'boxe_ecurie' => 10,
        'place_bateau_balisee' => 11,
    ];
}

