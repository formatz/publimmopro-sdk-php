# Object Collection

`PublimmoPro\ObjectCollection` est une classe représentant une liste d'objets obtenue lors d'une recherche.

## Initialisation

Utilisez la classe `PublimmoPro\Collection` pour pouvoir faire des manipulations sur les résultats de recherche.

**Exemple d'instanciation de l'objet**

Il est peu probable que ceci ait besoin d'être fait à la main  
En effet, la méthode query() de la classe PublimmoPro\Client retourne déjà un objet ObjectCollection.

```php
use \PublimmoPro\ObjectCollection;

$Collection = new ObjectCollection($results, 80);

$Collection->get();
```

Il est plus probable que cela soit utilisé à la suite d'une requête Client. 

```php

use \PublimmoPro\Client;

$Client = new Client('2121313', 'unecle');

$Collection = $Client->setType(Client::PARKING)
       ->setDisponiblite(Client::AVAILABILITY_IS_AVAILABLE)
       ->query();

$Collection->get();
```

## Méthodes

[filename](objectCollection/get.md ':include')

---


[filename](objectCollection/getTotal.md ':include')

---

[filename](objectCollection/filter.md ':include')

---

[filename](objectCollection/sort.md ':include')

