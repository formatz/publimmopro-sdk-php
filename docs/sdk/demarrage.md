# Démarrage

## Installer le SDK

### Avec Composer

Ajoutez ce package à votre fichier composer.json

```json
"repositories": [
  ...
  {
    "type": "vcs",
    "url": "git@github.com:alanpilloud/publimmopro-sdk-php.git"
  }
  ...
],
```

Puis ce requirement

```json
"require": {
  ...
  "publimmopro/phpsdk": "*",
  ...
},
```

Puis exécutez `composer update`.

### Sans Composer

Téléchargez le SDK sur [github](https://github.com/alanpilloud/publimmopro-sdk-php).

Placez le contenu de `/src/PublimmoPro/` dans un répertoire accessible à votre code, puis incluez les différents fichiers.

## Initialisation

```php
use \PublimmoPro\Client;

// Indiquez l'ID d'agence Publimmo, et sa clé
$PublimmoClient = new Client(99999, 'key');
```
