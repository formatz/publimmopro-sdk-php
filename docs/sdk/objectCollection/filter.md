### filter(string $filter_type, mixed $objects_to_filter)

Filtre les résultats en incluant ou excluant les identifiants d'objets indiqués.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $filter_type | string | Type de filtre, accepte "include" ou "exclude" |
| $objects_to_filter | mixed | identifiant de l'objet à filtrer ou tableau d'objets à filtrer |

#### Exemple 

```php
$Collection->filter('include', 85763)->get();
$Collection->filter('exclude', [85763, 24987])->get();
```


