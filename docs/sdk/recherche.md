# Recherche

```php
$Client = new Client('2121313', 'unecle');

$Client->setType(Client::PARKING)
       ->setDisponiblite(AVAILABILITY_IS_AVAILABLE)
       ->query();
```

## Initialisation

Utilisez la classe `PublimmoPro\Client` pour pouvoir faire des requêtes à l'API.

```php
use \PublimmoPro\Client;

// Indiquez l'ID d'agence Publimmo, et sa clé
$PublimmoClient = new Client(99999, 'key');
```

## Méthodes

[filename](client/setType.md ':include')

---

[filename](client/query.md ':include')

---

[filename](client/getQueryURL.md ':include')

---

[filename](client/setCity.md ':include')

---

[filename](client/setCityId.md ':include')

---

[filename](client/setCountry.md ':include')

---

[filename](client/setCourtierId.md ':include')

---

[filename](client/setDisponiblite.md ':include')

---

[filename](client/setDistance.md ':include')

---

[filename](client/setForeigners.md ':include')

---

[filename](client/setId.md ':include')

---

[filename](client/setIds.md ':include')

---

[filename](client/setLanguage.md ':include')

---

[filename](client/setLocationType.md ':include')

---

[filename](client/setNpaOrder.md ':include')

---

[filename](client/setPriceRange.md ':include')

---

[filename](client/setPromotionType.md ':include')

---

[filename](client/setRegion.md ':include')

---

[filename](client/setResidenceSecondaire.md ':include')

---

[filename](client/setRoomRange.md ':include')

---

[filename](client/setSearchString.md ':include')

---

[filename](client/setSelfOnly.md ':include')

---

[filename](client/setSort.md ':include')

---

[filename](client/setSortDirection.md ':include')

---

[filename](client/setSurfaceRange.md ':include')

---

[filename](client/setTransaction.md ':include')

---

[filename](client/setType.md ':include')

---

