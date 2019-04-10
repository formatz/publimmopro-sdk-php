### sort(mixed $instructions)

Trie les résultats selon les instructions données.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $instructions | mixed | Chaîne d'instruction ou tableau de châines d'instructions |

#### Composition de l'instruction

Une instruction est une châine composée des trois éléments suivants :

 - **Le champ** : nom du champ tel que décrit dans l'API
 - **Sens de tri** : 'asc' ou 'desc'
 - **Type de champ** : 'integer', 'float' ou 'string'

Sa syntaxe est `"champ:sens:type"`.

#### Exemple 

```php
$Collection->sort('prix:asc:integer')->get();
$Collection->sort(['prix:asc:integer', 'pieces:desc:float'])->get();
```

