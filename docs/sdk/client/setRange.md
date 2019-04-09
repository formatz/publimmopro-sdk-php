### setRange(string $type, int $min, int $max)

Définit une fourchette de prix, surface ou chambres.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $type | string | Type de valeur, "price", "surface" ou "room" |
| $min | int | Prix minimum désiré |
| $max | int | Prix maximum désiré |

#### Exemple 

```php
$Client->setRange("price", 2000, 2900);

// définir plusieurs fourchettes
$Client->setRange("price", 2000, 2900)
       ->setRange("room", 3, 6);
```
