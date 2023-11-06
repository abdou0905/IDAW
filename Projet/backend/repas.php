<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   /*****************************************************FONCTIONS*************************************************/
   function ajouterRepas($pdo, $date, $type) {
      //Verification de la redondance
      $sql_redondance = $pdo->prepare('SELECT COUNT(*) FROM repas WHERE date = ? AND type = ?');
      $sql_redondance->execute([$date, $type]);
      $exit = $sql_redondance->fetchColumn();

      //Requete d'ajout
      $add_request=$pdo->prepare('INSERT INTO repas (date, type) VALUES (?,?)');
      
      if($exit==0) {
         $sucess=$add_request->execute([$date, $type]);
         if($sucess === false ) {
            http_response_code(500);
            return json_encode(['Erreur SQL']);
         } else {
            http_response_code(201);
            echo(json_encode(['Repas cree avec succes']));
            return json_encode(['Repas cree avec succes']);
         }
      } else {
         echo(json_encode(['Repas deja existant']));
         return json_encode(['Repas deja existant']);
      }
   }

   function supprimerRepas($pdo, $id) {
      //verification de l'existence de l'id dans les repas existants
      $sql_existance = $pdo->prepare('SELECT COUNT(*) FROM repas WHERE id = ?');
      $sql_existance->execute([$id]);
      $exit = $sql_existance->fetchColumn();

      //requete de suppression des aliments
      $deleteAliment_request=$pdo->prepare('DELETE FROM repas_aliment WHERE id_repas=?');

      //requete de suppression du repas
      $deleteRepas_request=$pdo->prepare('DELETE FROM repas WHERE id_repas=?');
      
      if($exit==0) {
         $sucess=$deleteAliment_request->execute([$id]);
         if($sucess === false ) {
            http_response_code(500);
            return json_encode(['Erreur SQL']);
         } else {
            http_response_code(201);
            echo(json_encode(['Repas cree avec succes']));
            return json_encode(['Repas cree avec succes']);
         }
      } else {
         echo(json_encode(['Repas non existant']));
         return json_encode(['Repas non existant']);
      }
      //suppression en base des aliments associés au repas


      //supression en base de ce repas

   }


   /*****************************************************REQUETES*************************************************/
   if($methode ==="POST") {      
      if(isset($_POST['date']) && isset($_POST['type'])) {
         $date = $_POST['date'];
         $type = $_POST['type'];
         return ajouterRepas($pdo, $date, $type);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }

   if($method === "DELETE") {

   }