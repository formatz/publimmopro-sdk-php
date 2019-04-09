### setDisponiblite(int $disponibility)

Définit la disponiblitité des objets à retourner.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $disponiblitity | int | Identifiant de disponibilité |

#### Constantes

 - Client::AVAILABILITY_IS_AVAILABLE
 - Client::AVAILABILITY_IS_RESERVED
 - Client::AVAILABILITY_IS_SOLD
 - Client::AVAILABILITY_IS_OPTION

#### Exemple 

```php
$Client->setDisponiblite(Client::AVAILABILITY_IS_AVAILABLE);
```
