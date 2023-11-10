//////////////////////////////////////////////////AVANT DE COMMENCER A UTILISER IMANGERMIEUX/////////////////////////////////////////////////////

//////////////////////////////////////////////////
1 INITIALISATION DE LA BASE DE DONNEES
//////////////////////////////////////////////////

Il faut executer une fois le fichier backend/init_db.php au début de votre utilisation.

Cela va:
   -créer toute la base de données (sql/create_db.sql)
   -insérer des donnéesà la base (sql/data.sql)

Remarque concernant les données:
   -1- un seul utilisateur
   -2- de nombreux aliments dans toutes les catégories
   -3- les repas crées vont du 10-11-2023 au 16-11-2023
   -4- des aliments ont été inclus dans tous les repas crées (du 10-11-2023 au 16-11-2023)

//////////////////////////////////////////////////
2 CONFIGURATION URL
//////////////////////////////////////////////////

Rendez vous dans frontend/js/confiURL.js
Remplacer la valeur de la variable url par celle de votre environnement en local.

//////////////////////////////////////////////////DOCUMENTATION API/////////////////////////////////////////////////////

//////////////////
API UTILISATEURS
//////////////////
API pour la gestion des utilisateurs
   Endpoint : /utilisateurs.php
   Méthodes Supportées:

      [Obtenir tous les utilisateurs][
         Endpoint : /utilisateurs.php
         Méthode HTTP : GET

         Réponses possibles :
            Code 200 : Liste de tous les utilisateurs (format JSON)
            Code 500 : Erreur SQL
      ]

      [Modifier un utilisateur par ID][
         Endpoint : /utilisateurs.php
         Méthode HTTP : PUT
         Paramètres :
            id_utilisateur : Identifiant de l'utilisateur
            nom : Nom de l'utilisateur
            prenom : Prénom de l'utilisateur
            email : Adresse email de l'utilisateur
            sexe : Sexe de l'utilisateur
            age : Âge de l'utilisateur
            poids : Poids de l'utilisateur
            taille : Taille de l'utilisateur
            activite : Niveau d'activité/sport de l'utilisateur

         Réponses possibles :
            Code 200 : Utilisateur modifié avec succès
            Code 500 : Erreur de données ou erreur SQL
      ]
//////////////////
API ALIMENTS
//////////////////
API pour la gestion des aliments
   Endpoint : /aliments.php
   Méthodes Supportées

      [Obtenir des aliments par ID][
         Endpoint : /aliments.php
         Méthode HTTP : GET
         Paramètres :
            id_aliments : Liste d'identifiants d'aliments (format JSON)

         Réponses possibles :
            Code 200 : Liste des aliments correspondants aux identifiants fournis (format JSON)
            Code 500 : Erreur SQL
      ]

      [Obtenir des aliments par catégorie][
         Endpoint : /aliments.php
         Méthode HTTP : GET

         Réponses possibles :
            Code 200 : Liste des aliments par catégorie (format JSON)
            Code 500 : Erreur SQL
      ]

      [Ajouter un nouvel aliment][
         Endpoint : /aliments.php
         Méthode HTTP : POST
         Paramètres :
            designation : Nom de l'aliment
            categorie : Catégorie de l'aliment
            calorie : Nombre de calories
            proteine : Quantité de protéines
            glucide : Quantité de glucides
            lipide : Quantité de lipides
            sel : Quantité de sel
            sucre : Quantité de sucre

         Réponses possibles :
            Code 201 : Aliment ajouté avec succès
            Code 500 : Erreur de données ou erreur SQL
      ]

//////////////////
API REPAS
//////////////////
API pour la gestion des repas
   Endpoint : /repas.php
   Méthodes Supportées

      [Ajouter un repas][
         Endpoint : /repas.php
         Méthode HTTP : POST
         Paramètres :
            date : Date du repas
            type : Type de repas (petit déjeuner, déjeuner, dîner, etc.)

         Réponses possibles :
            Code 201 : Repas créé avec succès
            Code 500 : Erreur de données ou erreur SQL
      ]

      [Supprimer un repas][
         Endpoint : /repas.php
         Méthode HTTP : DELETE
         Paramètres :
            id_repas : Identifiant du repas à supprimer

         Réponses possibles :
            Code 200 : Repas supprimé avec succès
            Code 500 : Erreur de données ou erreur SQL
      ]
      
      [Obtenir un repas par date et type][
         Endpoint : /repas.php
         Méthode HTTP : GET
         Paramètres :
            date : Date du repas
            type : Type de repas (petit déjeuner, déjeuner, dîner, etc.)

         Réponses possibles :
            Code 200 : Détails du repas correspondant à la date et au type fournis (format JSON)
            Code 500 : Erreur de données ou erreur SQL
      ]

//////////////////
API REPAS ALIMENTS
//////////////////
API pour la gestion des repas et des aliments
	Endpoint : /repas_aliment.php
	Méthodes Supportées

   [Ajouter un aliment à un repas par ID_REPAS][
      Endpoint : /repas_aliment.php
      Méthode HTTP : POST
      Paramètres :
         id_repas : Identifiant du repas
         id_aliment : Identifiant de l'aliment
         quantite : Quantité de l'aliment à ajouter
      Réponses possibles :
         Code 201 : Aliment ajouté au repas avec succès
         Code 500 : Erreur de données ou erreur SQL
   ]

   [Suppimer un aliment d'un repas par ID_REPAS et ID_ALIMENT][
      Endpoint : /repas_aliment.php
      Méthode HTTP : DELETE
      Paramètres :
         id_repas : Identifiant du repas
         id_aliment : Identifiant de l'aliment

      Réponses possibles :
         Code 200 : Aliment supprimé du repas avec succès
         Code 500 : Erreur de données ou erreur SQL
   ]

   [Obtenir la liste des aliments d'un repas par ID_REPAS][
      Endpoint : /repas_aliment.php
      Méthode HTTP : GET
      Paramètres :
         id_repas : Identifiant du repas

      Réponses possibles :
         Code 200 : Liste des aliments du repas (format JSON)
         Code 500 : Erreur de données
   ]

