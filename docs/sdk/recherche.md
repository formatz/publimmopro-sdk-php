# Recherche

```
$Client = new Client('2121313', 'unecle');

$Client->setType(Client::PARKING)
       ->setDisponiblite(AVAILABILITY_IS_AVAILABLE)
       ->query();
```

## Initialisation

Utilisez la classe `PublimmoPro\Client` pour pouvoir faire des requêtes à l'API.

```
use \PublimmoPro\Client;

// Indiquez l'ID d'agence Publimmo, et sa clé
$PublimmoClient = new Client(99999, 'key');
```

## Méthodes

### setType(...$types)

Permet de faire une recherche d'objets selon les critères définis.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $types | int | Liste de types, 1 à 6 types possibles |


### Constantes de types

 - APPARTMENT
 - BUILDING
 - COMMERCIAL
 - HOUSE
 - LAND
 - PARKING

#### Exemple 

```php
$Client->setType(Client::APPARTMENT,Client::HOUSE);
```

---

### query()

Envoie la requête au webservice et récupère les résultats.

#### Paramètres

Pas de paramètres

#### Retour

Une instance de `PublimmoPro\ObjectCollection` est retournée.

---

#### Exemple 

```php
$Client->query();
```
