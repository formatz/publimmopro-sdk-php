# Objet

## Endpoint

https://syn.publimmo.ch/api/v1/{idagence}/objets/{id}

## Paramètres de recherche

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| key | String | bc62a0637292b34893d4f1 | Clé d'authentification permettant l'accès aux coordonées GPS |

## Réponse

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| contact | Objet |  |  |
| longitude | Number | 6.3738421 | Position de l'objet, longitude (nécessite une clé valide - voir key ci-dessus) |
| latitude | Number | 46.283483 | Position de l'objet, latitude (nécessite une clé valide - voir key ci-dessus) |
| desc | String | Construite en 1784, cette très belle… | Description de l'objet |
| descShort | String | Maison 10 pièces - 400 m² | Résumé des prinsicaplescaractéristiques de l'objet |
| garages | int | 1 | Nombre de garages |
| id | int | 123456 | Référence Publimmo |
| adresse | String | Rue de la plage 5 | Adresse de l'objet pour la location uniquement |
| localite | String | Puidoux | Localité |
| npa | String | 1066 | NPA |
| canton | String | VD | Canton de l'objet |
| m3 | String | 2831 | Volume ECA |
| parcs | int | 1 | Nombre de parcs extérieurs |
| photos | Array |  | Photos, voir [photos/plans/annexes](#photosplansannexes) |
| plans | Array |  | Plans (nécessite une clé valide - voir key ci-dessus), voir [photos/plans/annexes](#photosplansannexes) |
| annexes | Array |  | Documents - PDF (nécessite une clé valide - voir key ci-dessus), voir [photos/plans/annexes](#photosplansannexes) |
| pieces | String | 10 | Nombre de pièces |
| prixEuro | String | 2'166'667.- | Prix en Euro |
| prix | String | 2'600'000.- | Prix en CHF |
| prixCache | String | 2'600'000.- | Prix en CHF ne doit pas être affiché sur le site internet (nécessite une clé valide - voir key ci-dessus) |
| transaction | String | A Vendre | Type de transaction A Vendre, A Louer |
| soustitre | String | Belle demeure avec vue sur le lac | Soustitre |
| surface | String | 400 | Surface en m2 habitable si appartement ou maison. Si terrain = de la parcelle  |
| surfaceParcelle | String | 4297 | Surface de la parcelle en m2 pour une maison  |
| technicalData | Array |  | voir [technicalData](#technicalData) |
| titre | String | Maison 10 pièces à Puidoux | Titre de l'objet (généré automatiquement) |
| typeCode | int  | 1 | Type d'objet  5 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain,6=Parc,7=Promotion) |
| disponibilite | String | Réservé | Disponiblité de l'objet |
| disponibiliteCode | int | 2 | Code de disponiblité de l'objet (0=disponible,1=reserve,2=vendu,3=option) |
| promotionTable | Array |  | voir [promotionTable](#promotionTable) |
| movieUrl | String |  | Lien sur film youtube |
| virtualVisitUrl | String |  | Lien sur la visite virtuelle |
| locationType | int | 2 | Type de location saisonnière (1=semaine, 2=saisonnière, 3=annuelle) |
| locationTypeLabel | String | saisonnière | Libellé du type de location saisonnière |
| locationSaisonniereUrl | String |  | Lien vers la page de réservation du bien en location saisonière |
| ul | String | fr | Langue dans laquelle la réponse doit être envoyée (fr,en ou de) |
| translated | boolean | VRAI | true si la description de l'objet provient d'une traduction automatisée |
| motscle | String | Minergie, Tour | Mots-clés définis dans la fiche |
| dateCreation | String | 13.08.2012 | Date de création de l'objet |
| dateMaj | String | 14.08.2014 | Date modification du prix de l'objet (selon critères PI) |

## Structures

### Contact

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| address | String | Ch de la Suite 8 | Adresse postale |
| city | String | La Tour-de-Peilz | Localité |
| company | String | Acheter-Louer.ch | Nom de l'agence |
| name | String | John Le Courtier | Nom du courtier |
| tel | String |  +41 79 210 60 xx | No de téléphone de l'agence |
| mob | String |  +41 79 210 60 xx | No de mobile de l'agence |
| fax | String |  +41 79 210 60 xx | No de fax de l'agence |
| courtierTel | String |  +41 79 210 60 xx | No de téléphone du courtier |
| courtierMob | String |  +41 79 210 60 xx | No de mobile du courtier |
| courtierFax | String |  +41 79 210 60 xx | No de fax du courtier |
| zip | String |  | npa |
| contactId | int | 18900 | Id du contact |
| contactWebmail | String | courtier-18900 | Identification pour reprise dans webmail Publimmo |
| courtierPrincipal | String | John le Courtier | Nom du courtier principal de l'agence |
 | |  |  | email  au format PI, une demande sur un objet qui provient d'un réseau doit comporter un champ supplémentaire "ContactId" dans l'email généré par l'application. L'id correspond au chiffre à la fin du champs contact.contactWebmail du JSON. |

### technicalData 

Plusieurs données techniques sont disponibles à cette étape, par exemple :

 - Charges mensuelles
 - Date de disponibilité
 - Type de location, semainne ou année

Merci de regarder directement les infos disponibles dans le webservice.

L'idée est que ces technicalData puissent évoluer sans modification de l'API

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| name | String | Vue | Nom de la donnée |
| value | String | Dégagée, Lac, Campagne | Valeur de cette donnée |

### photos/plans/annexes 

Affiche les plans au format JPEG et les annexes au format PDF

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| thumb | String | https://media2.publimmo.ch/thumbs/small/10782/111582.jpg | URL du thumbnail |
| desc | String | Terrasse extérieure | Description du media |
| URL | String | https://media2.publimmo.ch/thumbs/gallery/10782/111582.jpg | Url de l'image ou du fichier PDF |

### promotionTable

Si l'objet est une promotion, la liste des lots de la promotion est contenue ici.

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| id | int | 123456 | Référence Publimmo |
| lot | String | C | Identification du lot |
| type | String | Villa individuelle | Type ou soustype de l''objet |
| pieces | String | 10 | Nombre de pièces |
| typeCode | int  | 1 | Type d'objet  5 (1=Appartement, 2=Immeuble, 3=Commercial, 4=Maison, 5=Terrain) |
| surface | String | 400 | Surface en m2 |
| disponibilite | String | Réservé | Disponiblité de l'objet |
| disponibiliteCode | int | 2 | Code de disponiblité de l'objet (0=disponible,1=reserve,2=vendu,3=option) |
| prix | String | 2'600'000.- | Prix en CHF |

## Exemple

https://syn.publimmo.ch/api/v1/10543/objets/66000
