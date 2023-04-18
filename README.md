# Documentation du projet CRUD

## Introduction
 Ce projet est un projet d'étude dont l'objectif principal est de réaliser un CRUD. 
 
 Le site simule une interface de gestion de location de van aménagé. 
 
 Par l'intermédiaire du site il est possible de consulter les 3 catégories de véhicules et de voir leur caractéristiques. 
Il est également possible de voir les détails de chaque véhicule existant dans la base de données. 
l'utilisateur peut créer un nouveau van, modifier les caractéristiques des vans existants et supprimer un van de la flotte. 


## Architecture et technologies utilisées

### Langages de programmation :
Le front end a été réalisé en HTML et CSS avec l'aide de Bootstrap. 
Le back end est en PHP. 
La base de données est une base de données MySQL. 


## Installation et configuration

Le projet étant très simple et n'utilisant pas de framework, il n'y a pas de dépendance particulière. 
Nous avons utilisé la version 8 de Php et la version 5 de bootstrap. 

Le fonctionnement de la base de données nécessite un fichier de créer soi mêmem le fichier pages/connect.php

un modèle est présent dans /connectSample.php



## Utilisation


 ![image](https://user-images.githubusercontent.com/73989955/232737810-50d66b08-e5d4-4df0-a203-cb003574fad8.png)
 
 La page d'accueil présente en premier un tableau sur lequel figure les différents modèle de véhicule qui sont présent dans la flotte. 
 En cliquant sur le bouton avec le nom du van l'utilisateur est redirigé vers le descriptif détaillé du modèle. 
 la couleur du background du nombre de place varie selon le nombre de place. 
 
 l'élément suivant permet d'accéder à la page de création d'un nouveau véhicule. 

En fin le bouton "voir la liste des véhicules existants" permet d'accéder à la liste de tous les vans présent dans la flotte : 

![image](https://user-images.githubusercontent.com/73989955/232739089-5f7f9162-6063-4b29-b27a-6b381dfac825.png)

Chaque page est doté d'un bouton permettant de revenir à la page d'accueil. 


## Gestion des données

Les données sont héberger sur un VPS et gérer via MySQL.


## Sécurité

Pour éviter les injections SQL nous avons utiliser le module PDO.

## Maintenance et évolution

Améliorations futures : 
- amélioration du front-end
- implémentation de la possibilité de gérer les réservations de van (possibilité déjà existantes dans la base de données).


