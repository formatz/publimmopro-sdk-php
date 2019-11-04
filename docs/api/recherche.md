# Recherche

## Endpoint

https://syn.publimmo.ch/api/v1/{idagence}/objets

## Paramètres de recherche

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| idagence | int | 10061 | Référence Publimmo de l'agence |
| type_1 | int | 1 | Type d'objet  1 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain, 6= parc, garage) |
| type_2 | int |  | Type d'objet  1 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain, 6= parc, garage) |
| type_3 | int |  | Type d'objet  1 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain, 6= parc, garage) |
| type_4 | int |  | Type d'objet  1 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain, 6= parc, garage) |
| type_5 | int |  | Type d'objet  1 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain, 6= parc, garage) |
| type_6 | int |  | Type d'objet  1 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain, 6= parc, garage) |
| p | int | 1 | 2=Fiches promotions uniquement,1=Objets neufs/promotion uniquement, 0=Objets (par défaut) |
| prixMin | int | 1000000 | Prix minimum |
| prixMax | int | 2000000 | Prix maximum |
| surfaceMin | int | 100 | Surface minimum |
| surfaceMax | int | 450 | Surface maximum |
| pieceMin | float | 2,5 | Nombre de pièce minimum |
| pieceMax | float | 4,5 | Nombre de pièces maximum |
| commune | int | 632 | No de la commune |
| dist | int | 15 | Distance en kilomètre depuis le centre de la commune (15 par défaut) |
| region | int | 1 | Numéro de la région |
| id | String | D127 | Référence objet (agence ou publimmo) |
| ns | String | piscine, vue | Mots-clés |
| pays | String | fr | Pays selon ISO 3166-alpha2 (en minuscule) |
| loc | String | Lausanne | Localité |
| t | int | 1 | Transaction (1=vente, 2=location) |
| selfOnly | int | 1 | N'affiche que les objets de l'agence/groupe |
| tri | int | 0 | Critère pour le tri (0=Prix, 1=Nombre de pièces, 2=Surface,3=Date de création) |
| triSens | int | 2 | Sens du tri (1=décroissant,2=croissant) |
| key | String | bc62a0637292b34893d4f1 | Clé d'authentification permettant l'accès aux coordonées GPS |
| ul | String | fr | Langue dans laquelle la réponse doit être envoyée (fr,en ou de) |
| ids | String | 120344,10882,189045 | Liste de numéros d'objet Publimmo séparés par une virgule |
| courtierId | int | 10029 | N'affiche que les objets du courtier indiqué |
| foreigners | int | 1 | Vente aux non résidents étrangers (quota) (1=oui) |
| disponiblite | int | 2 | Code de disponiblité (0=disponible,1=reserve,2=vendu,3=option) |
| residenceSecondaire | int | 1 | Vente en résidence secondaire si précisé dans Publimmo (1=OUI, 2=NON) |
| locationType | int | 2 | Location saisonnière (1=semaine,2=saison,3=année) |
| sousType | int | 1 | Sous-type des objets pour le type sélectionné (1 type max), consulter [api/Types](/api/types)  |
| npaOrder | int | 1204 | Trie les résultats en commençant par le npa indiqué |

## Réponse

### Global

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| label | String | Tous les objets |  |
| resultTotal | int | 78 |  |
| id | int | 3,75E+08 |  |
| results | Array |  | contient la liste des objets trouvés |

### Objets dans results

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| localite | String | Puidoux | Localité |
| prixEuro | String | 2'166'667.- | Prix en Euro |
| transaction | String | A Vendre | Type de transaction A Vendre, A Louer |
| prix | String | 2'600'000.- | Prix en CHF |
| id | int | 123456 | Référence Publimmo |
| photo | String | https://media2.publimmo.ch/thumbs/small/10782/111582.jpg | URL du thumbnail . Voir FAQ pour les différrents formats disponibles Point 12 FAQ |
| promotionId | int | 4526 | Id de la promotion (si l'objet fait partie d'une promotion) |
| desc | String | Maison 6.5 pièces - 177 m² | Courte description du bien |
| descInternet | String | Située au coeur du village d'Avenche.. | Descriptif internet de l'objet (max 500 caractères) |
| soustitre | String | Belle demeure avec vue sur le lac | Soustitre |
| pos | int | 11 | Position dans l'ordre des résultats |
| type | String | Maison | Type principal de l'objet |
| typeCode | int  | 1 | Type d'objet  5 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain,6=Parc,7=Promotion) |
| sousType | String | Villa individuelle | Sous-type (si disponible) |
| pieces | String | 4,5 | Nombre de pièces (si disponible) |
| movie | Boolean | VRAI | Présent si une vidéo est disponible pour cet objet |
| virtualVisit | Boolean | VRAI | Présent si une visite virtuelle est disponible pour cet objet |
| longitude | Number | 6.3738421 | Position de l'objet, longitude (nécessite une clé valide - voir key ci-dessus) |
| latitude | Number | 46.283483 | Position de l'objet, latitude (nécessite une clé valide - voir key ci-dessus) |
| disponibilite | String | Réservé | Disponiblité de l'objet |
| disponibiliteCode | int | 2 | Code de disponiblité de l'objet (0=disponible,1=reserve,2=vendu,3=option) |
| dateCreation | String | 13.08.2012 | Date de création de l'objet |
| dateMaj | String | 14.08.2014 | Date modification de l'objet (selon critères PI) |
| tsMaj | int | 1474362505000 | Date du dernier enregistrement (clic du bouton "enregsitrer" dans l'interface PI) en nombre de millisecondes depuis le 1.1.1970. |

## Exemples

#### Listing des objets à vendre avec piscine en dessous d'un million situés dans les 5 km du centre de la commune d'Epalinges :  
https://syn.publimmo.ch/api/v1/10543/objets?t=1&prixMax=1000000&commune=496&dist=5&ns=piscine

#### Lots de type Promotion  

https://syn.publimmo.ch/api/v1/146748/objets?p=1

> attention il faut que la passerelle syndication "site de l'agence" soit activée, cochée pour obtenir ces informations


#### Fiches promotion  
https://syn.publimmo.ch/api/v1/146748/objets?p=2
> attention il faut que la passerelle syndication "site de l'agence" soit activée, cochée pour obtenir ces informations
