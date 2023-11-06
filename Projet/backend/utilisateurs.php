<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //On recupere l'uri de la requete
   $uri = $_SERVER['REQUEST_URI'];

   //definition de put
   parse_str(file_get_contents("php://input"), $_PUT);

   //Recuperation des utilisateurs
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

   //Modifier l'utilisateur
   function modifierUtilisateur($pdo, $id, $nom, $prenom, $email, $sexe, $age, $poids, $taille, $sport) {
      //Preparation et execution de la requete
      $sql=$pdo->prepare("UPDATE utilisateurs SET `nom` = ?, `prenom` = ?, `email` = ?, `age` = ?, `taille` = ?, `poids` = ?, `sexe` = ?, `sport` = ?  WHERE `id_utilisateur`=?");
      $sucess=$sql->execute([$nom, $prenom, $email, $age, $poids, $taille, $sexe, $sport, $id]);  
         
      if($sucess === false ) { //error
         http_response_code(500);
         // echo json_encode(['error'=>'Erreur SQl']);
         return json_encode(['error'=>'Erreur SQl']);
      } else { //sucess
         http_response_code(200);
         // echo json_encode(['User modified']);
         return json_encode(['User modified']);
      }
   }

   //Arbre de requetes
   // if($methode==='GET') { 
   //    $utilisateurs=getUtilisateurs($pdo);
   //    // print_r($utilisateurs);
   //    // return $utilisateurs;
   //    // return getUtilisateurs($pdo);
   // }

   // if(isset($_POST["update"])) {
   //    if(isset($_POST['id_utilisateur']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['sexe'])&& isset($_POST['age']) && isset($_POST['poids']) && isset($_POST['taille']) && isset($_POST['activite'])) {
   //      $result = modifierUtilisateur($pdo, $_POST['id_utilisateur'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['sexe'], $_POST['age'], $_POST['poids'], $_POST['taille'], $_POST['activite']);
   //       echo($result);
   //    } else {
   //       $result='erreur Formulaire';
   //    }
   // }


   if($methode === 'GET') {
      $utilisateurs = getUtilisateurs($pdo);
      echo($utilisateurs);
      return $utilisateurs;
   } else if($methode === 'PUT') {
      if(isset($_PUT["id_utilisateur"]) && isset($_PUT["nom"]) && isset($_PUT["prenom"]) && isset($_PUT["email"]) && isset($_PUT["sexe"]) && isset($_PUT["age"]) && isset($_PUT["poids"]) && isset($_PUT["taille"]) && isset($_PUT["activite"])){
         $id=$_PUT["id_utilisateur"];
         $nom=$_PUT["nom"];
         $prenom=$_PUT["prenom"];
         $email=$_PUT["email"];
         $sexe=$_PUT["sexe"];
         $age=$_PUT["age"];
         $poids=$_PUT["poids"];
         $taille=$_PUT["taille"];
         $sport=$_PUT["activite"];
         
         $resultat = modifierUtilisateur($pdo, $id, $nom, $prenom, $email, $sexe, $age, $poids, $taille, $sport);
         echo($resultat);
         return $resultat;
      }
   }