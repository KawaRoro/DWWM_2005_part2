# Cereals

Pour cet exercice, vous devez créer une application web affichant la liste des céréales accessibles à partir d'une API. 
Les informations proviennent d'une API fictive et sont rendues disponibles à travers une API REST disponible à cette adresse : 
- https://devoldere.net/api/cereals/

Les céréales sont listés dans un tableau, avec les informations suivantes :
- ID 
- Name 
- Calories 
- Protéïnes
- Sel
- Fibres
- Glucides
- Sucre
- Potassium
- Vitamines
- Évaluation

Les différents composants sont exprimés en g/100g (nombre de grammes pour 100g de produit fini).
Une valeur égale à "-1" signifie que la donnée n'est pas disponible pour ce céréale.


Vous ajouterez au tableau :

- Une colonne contenant le nutri-score (de A à E) calculé selon l'évaluation :
    - A: Plus de 80%
    - B: Entre 70% et 80%
    - C: Entre 55% et 70%
    - D: Entre 35% et 55%
    - E: Moins de 35%
- Une colonne d'actions contenant un bouton d'action permettant de supprimer un céréale du tableau
- Le décompte du nombre de céréales affiché en-pied de la colonne ID.
- La moyenne des calories affichée en-pied de la colonne Calories.
- Un bouton de tri dans les entêtes de colonne Calories, Sel et Evaluation permet le tri croissant / décroissant des valeurs de ces colonnes.



L'interface présentera également :

- Un champs de recherche pour rechercher un céréale par son nom
- Une recherche multi-critères permettant d'afficher :
    - les céréales ayant un nutri-score particulier (A,B,C,D ou E)
    - +
    - les céréales "sans sucre" (taux de sucre inférieur à 1)
    - ou
    - les céréales pauvres en sel (taux de sel inférieur à 50)
    - ou
    - les céréales "boost" (taux de vitamines supérieur ou égal à 25 + taux de fibres supérieur ou égal à 10)



L’affichage « en français » devrait ressembler à la capture suivante :

