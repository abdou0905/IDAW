<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //Variable categorie
   $categories = array('legume', 'fruit', 'feculent','proteine','produitLaitier','boisson','snackSale','snackSucre');

   /*****************************************************FONCTIONS*************************************************/
   
   /*****************GET ALIMENTS BY ID*************/
   function getAlimentsById($pdo, $id_aliments) {
      // Chaîne de substitution pour chaque ID d'aliment dans le tableau
      $placeholders = implode(',', array_fill(0, count($id_aliments), '?'));

      // Créez la requête SQL en utilisant les substitutions
      $sql = "SELECT * FROM aliments WHERE id_aliment IN ($placeholders) ORDER BY designation ASC";
      
      $statement = $pdo->prepare($sql);
      $success = $statement->execute($id_aliments);

      if ($success) {
         // Récupérez les résultats dans un tableau d'objets ou de tableaux associatifs
         $aliments = $statement->fetchAll(PDO::FETCH_ASSOC);
         return json_encode($aliments);
      } else {
         return false;
      }
   }

   /*****************GET ALIMENTS BY CATEGORIE*************/
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

   /*****************AJOUTER UN NOUVEL ALIMENT*************/
   function ajouterAliment($pdo, $designation, $categorie, $calories, $proteine, $glucide, $lipide, $sel, $sucre) {
      //Verification de la redondance
      $sql_redondance = $pdo->prepare('SELECT COUNT(*) FROM aliments WHERE designation = ?');
      $sql_redondance->execute([$designation]);
      $exist = $sql_redondance->fetchColumn();
      
      //Requete d'ajout
      $add_request=$pdo->prepare('INSERT INTO aliments (designation, categorie, calories, proteine, glucide, lipide, sel, sucre) VALUES (?,?,?,?,?,?,?,?)');
      
      if($exist==0) {
         $sucess=$add_request->execute([$designation, $categorie, $calories, $proteine, $glucide, $lipide, $sel, $sucre]);
         if($sucess === false ) {
            http_response_code(500);
            return json_encode(['Erreur SQL']);
         } else {
            http_response_code(201);
            return json_encode(['Aliment ajoute avec succes']);
         }
      } else {
         return json_encode(['Aliment deja existant']);
      }
   }

   /*****************************************************REQUETES*************************************************/
   
   /*****************GET ALIMENTS BY ID*************/
   if($methode ==="GET" && isset($_GET['id_aliments']) && $_GET['id_aliments']!= NULL){
      $idAliments = json_decode($_GET['id_aliments']);
      exit (json_encode(getAlimentsById($pdo,$idAliments)));
   } 
   /*****************GET ALIMENTS BY CATEGORIE*************/
   else if ($methode === 'GET') {
      foreach($categories as $categorie) {
         $aliments[$categorie] = getAlimentsByCategorie($pdo,$categorie);
      }
      exit (json_encode($aliments));
   } 

   /*****************AJOUTER UN NOUVEL ALIMENT*************/
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