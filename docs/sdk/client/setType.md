### setType(int ...$types)

Permet de faire une recherche d'objets selon les critères définis.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $types | int | Liste de types, 1 à 6 types possibles |


#### Constantes de types

 - Client::APPARTMENT
 - Client::BUILDING
 - Client::COMMERCIAL
 - Client::HOUSE
 - Client::LAND
 - Client::PARKING

#### Exemple 

```php
$Client->setType(Client::APPARTMENT,Client::HOUSE);
```
