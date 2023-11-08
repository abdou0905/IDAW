<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //Variable categorie
   $categories = array('legume', 'fruit', 'feculent','proteine','produitLaitier','boisson','snackSale','snackSucre');

   /*****************************************************FONCTIONS*************************************************/
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
      print_r("je suis dans le get des aliments du repas hehe");
      $idAliments = json_decode($_GET['id_aliments']);
      // print_r('api id aliments');
      print_r($idAliments);
      // print_r(json_encode($idAliments));
      // exit(json_encode($idAliments));
   } else if ()

   if($methode === 'GET') {
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