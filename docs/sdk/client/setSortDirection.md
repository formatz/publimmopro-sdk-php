### setSortDirection(string $sortDirection)

Permet de définir le sens du tri. Fonctionne de paire avec `setSort`.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $sortDirection | string | Sens du tri, accepte 'asc' ou 'desc' |



#### Exemple 

```php
$Client->setSort(Client::SORT_BY_PRICE)->setSortDirection('asc');
```
