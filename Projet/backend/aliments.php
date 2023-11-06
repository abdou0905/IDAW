<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //On recupere l'uri de la requete
   $uri = $_SERVER['REQUEST_URI'];

   function getAlimentsByCategorie($pdo, $categorie) {
      //Preparation and execution of the request
      $sql = 'SELECT * FROM aliments WHERE categorie= ?';
      $statement = $pdo->prepare($sql);
      $sucess=$statement->execute([$categorie]);

      if($sucess === false ) { //error
         http_response_code(500);
         return json_encode(['error'=>'Erreur SQl']);
      } else { //sucess
         http_response_code(200);
         return json_encode($statement->fetchAll(PDO::FETCH_OBJ));
      }
   }
?>