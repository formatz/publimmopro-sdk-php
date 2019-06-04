### isType(int $objectType)

Vérifie le type d'objet.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $objectType | int | Type d'objet, utilisez les constantes de types de la classe PublimmoPro\Client.


#### Constantes de types de la classe PublimmoPro\Client

 - Client::APPARTMENT
 - Client::BUILDING
 - Client::COMMERCIAL
 - Client::HOUSE
 - Client::LAND
 - Client::PARKING

#### Exemple 

```php
$ObjectEntity->isType(Client::HOUSE)
    ? echo 'vrai'
    : echo 'faux';
```

