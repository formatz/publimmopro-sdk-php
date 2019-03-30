# Démarrage

## Installer le SDK

## Initialisation

```
$PClient = new PublimmoProClient([
    'key' => 'your_agency_key',
]);


// then, ask for an object or a query
$results = $PClient->with()->get();

$object = $PClient->object(125944)->get();
```
