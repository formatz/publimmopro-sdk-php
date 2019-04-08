# Démarrage

## Installer le SDK

### Avec Composer

Ajoutez ce package à votre fichier composer.json

```
"repositories": [
  ...
  {
    "type": "package",
    "package": {
      "name": "publimmopro/phpsdk",
      "version": "0.1.0",
      "dist": {
        "type": "zip",
        "url": "https://github.com/alanpilloud/publimmopro-sdk-php/archive/master.zip"
      }
    }
  }
  ...
],
```

Puis ce requirement

```
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

```
use \PublimmoPro\Client;

// Indiquez l'ID d'agence Publimmo, et sa clé
$PublimmoClient = new Client(99999, 'key');
```
