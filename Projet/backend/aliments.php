<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //Variable categorie
   $categories = array('legume', 'fruit', 'feculent','proteine','produitLaitier','boisson','snackSale','snackSucre');

   /*****************************************************FONCTIONS*************************************************/
   function getAlimentsById($pdo, $id_aliments) {
      // Créez une chaîne de substitution "?" pour chaque ID d'aliment dans le tableau
      $placeholders = implode(',', array_fill(0, count($id_aliments), '?'));

      // Créez la requête SQL en utilisant les substitutions
      $sql = "SELECT * FROM aliments WHERE id_aliment IN ($placeholders) ORDER BY designation ASC";
      
      // Préparez la requête
      $statement = $pdo->prepare($sql);

      // Exécutez la requête avec les ID d'aliments en tant que paramètres
      $success = $statement->execute($id_aliments);
      if ($success) {
         // Récupérez les résultats dans un tableau d'objets ou de tableaux associatifs
         $aliments = $statement->fetchAll(PDO::FETCH_ASSOC);
         // print_r($aliments);
         return json_encode($aliments);
      } else {
         // Gérez les erreurs ici
         return false;
      }
   }
   
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
            echo(json_encode(['Aliment ajoute avec succes']));
            return json_encode(['Aliment ajoute avec succes']);
         }
      } else {
         echo(json_encode(['Aliment deja existant']));
         return json_encode(['Aliment deja existant']);
      }
   }

   /*****************************************************REQUETES*************************************************/
   //Ecrire autrement la condition ?
   if($methode ==="GET" && isset($_GET['id_aliments']) && $_GET['id_aliments']!= NULL){
      
      $idAliments = json_decode($_GET['id_aliments']);
      exit (json_encode(getAlimentsById($pdo,$idAliments)));
      
   } else if ($methode === 'GET') {
      foreach($categories as $categorie) {
         $aliments[$categorie] = getAlimentsByCategorie($pdo,$categorie);
      }
      exit (json_encode($aliments));
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