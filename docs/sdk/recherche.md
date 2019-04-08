# Recherche

```
$Client = new Client('2121313', 'unecle');
$Client->setType(Client::PARKING);
$Client->setPromotionType(Client::APPARTMENT);
$Client->query();
```

## Méthodes

### query($args)

Permet de faire une recherche d'objets selon les critères définis.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $object_ids | int \| array | ID d'objet ou tableau d'IDs d'objets |

---

### include($object_ids)

Permet d'inclure spécifiquement les objets mentionnés.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $object_ids | int \| array | ID d'objet ou tableau d'IDs d'objets |

---

### exclude($object_ids)

Permet d'exclure spécifiquement les objets mentionnés.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $object_ids | int \| array | ID d'objet ou tableau d'IDs d'objets |
