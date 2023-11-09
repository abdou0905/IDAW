<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   /*****************************************************FONCTIONS*************************************************/
   function allRepasByDate($pdo, $date){
      //Existance des repas en base
      $sql_existance = $pdo->prepare('SELECT COUNT(*) FROM repas WHERE date = ?');
      $sql_existance->execute([$date]);
      $exist = $sql_existance->fetchColumn();

      if($exist == 0){ //Aucun repas n'existe
         http_response_code(500);
         echo(json_encode(['Les repas de cette date nexiste pas']));
         return json_encode(['Les repas de cette date nexiste pas']);
      } else {
         $sql = $pdo->prepare('SELECT * FROM repas WHERE date =?');
         $sucess=$sql->execute([$date]);
         if($sucess === false ) { //Erreur
            http_response_code(500);
            exit(json_encode(['Erreur SQL']));
         } else {
            http_response_code(200);
            $repas = $sql->fetchAll(PDO::FETCH_OBJ);
            exit(json_encode($repas)); 
         }
      }
   }

   /*****************************************************REQUETES*************************************************/
   if($methode === "GET") {
      if(isset($_GET['date'])){
         $date = $_GET['date'];
         // $date='2023-11-01';
         return allRepasByDate($pdo, $date);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }