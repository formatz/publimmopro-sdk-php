### setLocationType(int $type)

Définit la durée du contrat de location.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $type | int | Type de durée |

#### Constantes

 - Client::LOCATION_TYPE_WEEK : Location à la semaine
 - Client::LOCATION_TYPE_SEASON : Location à la saison
 - Client::LOCATION_TYPE_YEAR : Location à l'année

#### Exemple 

```php
$Client->setLocationType(Client::LOCATION_TYPE_WEEK);
```
