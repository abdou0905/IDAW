<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //Recuperation des Aliments par leur catégorie
   function getAlimentsByCategorie($pdo, $categorie) {
      //Preparation et Execution de la requete
      $sql = 'SELECT * FROM aliments WHERE categorie = ? ORDER BY designation ASC';

      $statement = $pdo->prepare($sql);
      $sucess=$statement->execute([$categorie]);

      if($sucess === false ) { //Erreur
         http_response_code(500);
         return json_encode(['Erreur SQL']);
      } else { //Succès
         http_response_code(200);
         return json_encode($statement->fetchAll(PDO::FETCH_OBJ));
      }
   }

   //Ajout d'un aliment
   function ajouterAliment($pdo, $designation, $categorie, $calories, $proteine, $glucide, $lipide, $sel, $sucre) {
      //Verification de la redondance
      $sql_redondance = $pdo->prepare('SELECT COUNT(*) FROM aliments WHERE designation = ?');
      $sql_redondance->execute([$designation]);
      $exit = $sql_redondance->fetchColumn();
      
      //Requete d'ajout
      $add_request=$pdo->prepare('INSERT INTO aliments (designation, categorie, calories, proteine, glucide, lipide, sel, sucre) VALUES (?,?,?,?,?,?,?,?)');
      
      if($exit==0) {
         $sucess=$add_request->execute([$designation, $categorie, $calories, $proteine, $glucide, $lipide, $sel, $sucre]);
         if($sucess === false ) {
            http_response_code(500);
            return json_encode(['Erreur SQL']);
         } else {
            http_response_code(201);
            echo(json_encode(['Aliment ajoute avec Succes']));
            return json_encode(['Aliment ajoute avec Succes']);
         }
      }
   }

   if($methode === 'GET') {
      if (isset($_GET['categorie'])) {
         $categorie = $_GET['categorie'];
         // echo getAlimentsByCategorie($pdo, $categorie);
         return getAlimentsByCategorie($pdo, $categorie);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }

   if($methode ==="POST") {      
      if(isset($_POST['designation']) && isset($_POST['categorie']) && isset($_POST['calorie']) && isset($_POST['proteine']) && isset($_POST['glucide']) && isset($_POST['lipide']) && isset($_POST['sel'])&& isset($_POST['sucre'])) {
         $designation = $_POST['designation'];
         $categorie = $_POST['categorie'];
         $calories = $_POST['calorie'];
         $proteine = $_POST['proteine'];
         $glucide = $_POST['glucide'];
         $lipide = $_POST['lipide'];
         $sel = $_POST['sel'];
         $sucre = $_POST['sucre'];
         return ajouterAliment($pdo, $designation, $categorie, $calories, $proteine, $glucide, $lipide, $sel, $sucre);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }

?>