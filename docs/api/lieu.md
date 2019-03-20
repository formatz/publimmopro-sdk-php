# Lieu

## Endpoint

https://syn.publimmo.ch/api/v1/{idagence}/geo/{querystring}

## Paramètres de recherche

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| querystring | String | veve | Texte à rechercher |
| idagence | int | 10061 | Référence Publimmo de l'agence |

## Réponse

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| results | Array |  | voir [Résultats](#résultats) |

### Résultats

| key | type | Exemple | Description |
| --- | --- | --- | --- |
| text | String | Vevey | Nom du lieu trouvé |
| longitude | Number | 6.3738421 | Longitude du centre du lieu |
| latitude | Number | 46.283483 | Latitude du centre du lieu |
| type | String | commune | L'id retoruné doit être placée dans le paramètre indiqué (commune/region) pour la rercherche |
| id | int | 456 | Référence Publimmo |

## Exemple

Recherche pour "vev"

https://syn.publimmo.ch/api/v1/10061/geo/vev
