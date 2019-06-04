# FAQ

## Comment lire un fichier JSON facilement

En utilisant un outil de mise en forme, comme [JsonLint](http://jsonlint.com/).

---

## Proposez-vous la possibilité d’ajouter des champs supplémentaires tels que "latitude" et "longitude" par exemple ?
 
Oui, en utilisant une clé personnelle, il vous sera possible d'accéder à ces données. Le développement serait pris en charge par nous-même (en cas d’abonnement à notre service).

### Localisation des objets avec une clé de sécurité

Si le WebService est utilisé avec la clé correspondante de l'agence, les informations de latitude et longitude seront automatiquement rajoutées à chaque objet.

Depuis le profil de l'agence, ajout de la possibilité d'activer la clé d'accès:

 - créer la clé
 - visualiser la clé
 - effacer la clé

> __Attention :__ si positionnement sur carte, bloquer le zoom afin de ne pas permettre aux acheteurs de localiser exactement sans passer par l'agence.

---

## Comment utiliser la clé pour récupérer les coordonnées de géolocalisation.

_Nous avons essayé en ajoutant ?key=[la clé] et /[la clé] à l'URI_

Voici un exemple : https://syn.publimmo.ch/api/v1/10543/objets?key=c8da38eada82dc8374470c4d860cbd

---

## Dans l’exemple transmis figure un champ "Caddy"; il n’est pas présent dans la doc transmise, à quoi correspond-t-il ?


Il n'est pas utilisé pour l'instant, vous pouvez l'ignorer.

---

## L’information de volume (en m3) figure dans le schéma mais pas dans l’exemple, est-il réellement exporté en temps normal ?

Oui. Toutefois, si cette valeur n'est pas définie pour l'objet en question, elle n'est pas envoyée dans le flux.

---

## Le champ "disponibilité" comprend-t-il le statut "vendu"? Ou est-ce qu’un bien vendu n’est simplement plus récupérable en JSON ?

Oui, les objets avec le statut vendu sont accessibles pour ce qui est des objets promotion uniquement

 - Le flux de données reprend les informations du logiciel de façon adaptée à Publimmo, cela signifie plus d'informations et de meilleure qualité pour les agences
 - l'accès au flux est mis à jour toutes les 30 minutes, une modification sur PI est accessible dans un temps maximum de 30 minutes
 - facilité d'intégration pour les webmaster des agences

---


## Filtrer par promotion

Pour le filtre par promotion, on a bien mis en place un paramètre promotionId pour nos produits publimmo.pro, pour distinguer dans les résultats les lots de promotion et non en tant que filtre.
Nous avons mis la doc à jour.

Actuellement pour les promotions, il est possible:

 - de filtrer pour avoir uniquement les promotions http://syn.publimmo.ch/api/v1/10543/objets?p=2
 - de filtrer pour avoir uniquement les objets appartenant à une promotion http://syn.publimmo.ch/api/v1/10543/objets?p=1
 - d'obtenir la liste des promotions (lot 0) http://syn.publimmo.ch/api/v1/10543/objets/?p=2
 - d'avoir la liste des lots et leur statut pour une promotion donnée http://syn.publimmo.ch/api/v1/10543/objets/1700 (dans promotionTable)

---

## Comment récupérer les informations de canton, NPA et localité ?

Les indications de NPA et canton sont disponibles au niveau du détail de l'objet
https://syn.publimmo.ch/api/v1/10543/objets/5399

---

## Comment différencier les objets de l'agence ou des membres de son réseau dans la syndication ?

Au niveau de l'API, utiliser le champ `selfOnly` et le définir à `1`.   
Au niveau du SDK, utiliser la méthode `setSelfOnly`.

---

### Quels sont les formats d'image disponibles ?

| nom| taille |
| --- | --- |
| carousel | hauteur maximale 479px, largeur en proportion |
| gallery | largeur maximale 965px, hauteur en proportion |
| small | au max 300x200px |
| sq | au max 767x767px |
| sq2 | au max 469x469px |
| med | au max 480x320px |
| gallery-cropped | 960x640px |
| fullhd | hauteur maximale 1080px, largeur en proportion |

Pour accéder au format voulu, il suffit de le remplacer dans l'url retournée par le webservice:

 - https://media2.publimmo.ch/thumbs/small/45715/469288.jpg
 - https://media2.publimmo.ch/thumbs/med/45715/469288.jpg
 - https://media2.publimmo.ch/thumbs/sq/45715/469288.jpg
 - https://media2.publimmo.ch/thumbs/gallery-cropped/64091/672168.jpg
 - https://media2.publimmo.ch/thumbs/fullhd/45715/469288.jpg

 ---

## Comment envoyer une demande de dossier ?

Reprise des demandes du web-service dans Publimmo, frais uniques de paramétrage et mise en place de la passerelle fr 450.- HTVA
Merci de nous en faire la demande auparavant à info@publimmo.ch

Pour envoyer une demande, veuillez vous réferer au SDK.

Le champs "contact.contactWebmail" de l'objet en question contient l'adresse email (pour qu'elle soit valide il faut y additionner "@publimmo.net") à utiliser pour l'envoi de la demande (une copie de cet email est automatiquement envoyée à l'adresse du courtier concerné).

Veuillez nous communiquer au préalable un exemple d'email généré par votre application afin que nous puissions le valider et procéder à la configuration de la passerelle.

> ! Pour les reprises en IDX 3.01 utiliser le champ 79 agency_email qui contient l'adresse de retour publimmo.net

Le sujet doit contenir le nom de votre site, si une modification ultérieure du code ou du sujet devait être faite merci de nous informer afin que nous puissions adapter la passerelle.

Une fois ceci intégré dans votre site, je vous prierai de faire un test du formulaire en l'envoyant à chris@publimmo.ch comme destinataire. Après contrôle, nous activerons la passerelle pour la reprise des demandes.

---

## Comment obtenir des résultats dans une autre langue ?

Au niveau de l'API, utiliser le champ `ul` et le définir à `en` ou `de`.
Au niveau du SDK, utiliser la méthode `setLanguage` avec un paramètre `en` ou `de`.

---

## Tri par date de création dans le webservice au niveau de la recherche  (paramètre "tri") pour limiter la requête aux seuls objets de l'agence dans le cadre d'un réseau utiliser le paramètre "selfOnly".

> __Attention :__ l'utilisation de ce tri exclu l'afficahge des objets du réseau !

Au niveau de l'API, utiliser le champ `tri` et le définir à une valeur de tri.
Au niveau du SDK, utiliser la méthode `setLanguage` avec un paramètre de valeur de tri.

### Valeurs de tri

| Type | Constante SDK | Valeur |
| --- | --- | --- |
| Prix | Client::SORT_BY_PRICE | 0 |
| Pièces | Client::SORT_BY_ROOMS | 1 |
| Surface | Client::SORT_BY_SURFACE | 2 |
| Date de création | Client::SORT_BY_CREATED_AT | 3 |

---

##  Quel est le tri par défaut lors de l'afficheage des résultats ?

Si il n'y a pas de recherche on arrive sur une page à vendre ou à louer.
Sont d'abord affichés les objets de l'agence classés par ordre selon le paramètre "tsMaj int1474362505000Date du dernier enregistrement (clic du bouton "enregsitrer" dans l'interface PI) en nombre de millisecondes depuis le 1.1.1970.

Si il y a une recherche par critère, les résultats sont affichés par rapport à celui qui se trouve le plus près du centre de la localité recherchée par ordre de prix, taille etc.
