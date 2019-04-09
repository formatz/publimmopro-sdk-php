### setPromotionType(int $type)

Définit le type de promotion à récupérer.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $type | int | Type de promotion |


#### Constantes

 - Client::PROMOTION_TYPE_PROMOTION : retourne les objets dont le type est "promotion"
 - Client::PROMOTION_TYPE_NEW : retourne les objets de promotion et les appartments et maisons neuves
 - Client::PROMOTION_TYPE_NOT_PROMOTION : retourne les objets dont le type n'est pas "promotion"

#### Exemple 

```php
$Client->setPromotionType(Client::PROMOTION_TYPE_NEW);
```
