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
      $exist = $sql_redondance->fetchColumn();

      //Requete d'ajout
      $add_request=$pdo->prepare('INSERT INTO repas (date, type) VALUES (?,?)');
      
      if($exist==0) {
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
      $sql_existance = $pdo->prepare('SELECT COUNT(*) FROM repas WHERE id_repas = ?');
      $sql_existance->execute([$id]);
      $exist = $sql_existance->fetchColumn();

      //requete de suppression des aliments
      $deleteAliment_request=$pdo->prepare('DELETE FROM repas_aliment WHERE id_repas=?');

      //requete de suppression du repas
      $deleteRepas_request=$pdo->prepare('DELETE FROM repas WHERE id_repas=?');
      
      if($exist == 1) {
         //suppression en base des aliments associés au repas
         $sucess=$deleteAliment_request->execute([$id]);

         if($sucess === false) {
            http_response_code(500);
            return json_encode(['Erreur SQL']);
         } else { 
            //supression en base de ce repas
            $success2 = $deleteRepas_request->execute([$id]);

            if($success2 == 0) {
               http_response_code(500);
               return json_encode(['Erreur SQL']);
            } else {
               http_response_code(200);
               echo(json_encode(['Repas supprime avec succes']));
               return json_encode(['Repas supprime avec succes']);
            }
         }
      } else {
         echo(json_encode(['Repas non existant']));
         return json_encode(['Repas non existant']);
      }
   }

   function getRepasById($pdo, $id_repas){
      $sql_existance = $pdo->prepare('SELECT COUNT(*) FROM repas WHERE id_repas = ?');
      $sql_existance->execute([$id_repas]);
      $exist = $sql_existance->fetchColumn();

      
      if($exist == 0){ //Le repas n'existe pas
         http_response_code(500);
         echo(json_encode(['Le repas nexiste pas']));
         return json_encode(['Le repas nexiste pas']);
      } else {
         $sql = $pdo->prepare('SELECT * FROM repas WHERE id_repas = ?');
         $sucess=$sql->execute([$id_repas]);      

         if($sucess === false ) { //Erreur
            http_response_code(500);
            return json_encode(['Erreur SQL']);
         } else {
            http_response_code(200);
            $repas = $sql->fetch(PDO::FETCH_OBJ);
            print_r($repas);
            return json_encode($repas);
         }
      }
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

   if($methode === "DELETE") {
      //Recuperation des données de la requete
      parse_str(file_get_contents("php://input"), $_DELETE);

      if(isset($_DELETE)){
         $id = $_DELETE['id_repas'];
         return supprimerRepas($pdo, $id);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }

   if($methode === "GET") {
      if(isset($_GET['id_repas'])){
         $id_repas = $_GET['id_repas'];
         return getRepasById($pdo, $id_repas);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }

