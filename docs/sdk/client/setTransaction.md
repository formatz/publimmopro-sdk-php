### setTransaction(int $transaction)

Définit le type de transaction, acheter ou louer.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $transaction | int | Type de transaction |


#### Constantes de transaction

 - Client::BUY
 - Client::RENT

#### Exemple 

```php
$Client->setTransaction(Client::BUY);
```
