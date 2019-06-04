### __construct(ObjectEntity $objectEntity, array $userdata, string $siteUrl)

Créé une nouvelle instance de PublimmoPro\Mailer.

#### Paramètres

| Param | Type | Description |
| --- | --- | --- |
| $objectEntity | PublimmoPro\ObjectEntity | Entité d'objet, représente l'objet pour lequel on veut faire la demande |
| $userData | array | Tableau de clé/valeur contenant obligatoirement les clés suivantes `title, lastname, firstname, email, phone, language` et accessoirement `address, zipcode, city, message` |
| $siteUrl | string | Url du site courrant |

#### Exemple 

```php
$Mailer = new Mailer($currentObjectEntity, $userData, 'https://mywebsite.com');
```

