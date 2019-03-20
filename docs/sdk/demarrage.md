# Démarrage

## Installer le SDK

## Initialisation

```
$PClient = new PublimmoProClient([
    'key' => 'your_agency_key',
]);


// then, ask for an object or a query
$results = $PClient->query();

$object = $PClient->object(125944);
```
