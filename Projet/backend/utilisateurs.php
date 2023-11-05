<?php 
   //Initialisation de la base de données
   require_once('init_db.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //On recupere l'uri de la requete
   $uri = $_SERVER['REQUEST_URI'];

   //Fonction de l'API
   function getUtilisateurs($pdo) {
      //Preparation and execution of the request
      $sql = 'SELECT * FROM utilisateurs';
      $statement = $pdo->query($sql);
    
      if ($statement === false) { //Error
         return json_encode(['error' => 'Erreur SQL']);
      } else {
         $users = $statement->fetchAll(PDO::FETCH_OBJ);
         return json_encode($users);
      }
   }

   //Arbre de requetes
   // if($methode==='GET') { 
   //    $utilisateurs=getUtilisateurs($pdo);
   //    // print_r($utilisateurs);
   //    // return $utilisateurs;
   //    // return getUtilisateurs($pdo);
   // }
