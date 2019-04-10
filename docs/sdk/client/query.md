### query(int $id = null)

Envoie la requête au webservice et récupère les résultats.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $id | int | Optionnel, identifiant de l'objet à chercher |

#### Retour

Pour les requêtes d'objet, une instance de `PublimmoPro\ObjectEntity` est retournée ou `false` si la requête n'a pas retourné de résultat.

Pour les requêtes de recherche, Une instance de `PublimmoPro\ObjectCollection` est retournée ou `false` si la requête n'a pas retourné de résultat.

#### Exemple

```php
$Client->query(43284); // retourne un objet ObjectEntity

$Client->query(); // retourne un objet ObjectCollection
```
