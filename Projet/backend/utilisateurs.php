<?php 
   //Initialisation de la base de données
   require_once('init_db.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //On recupere l'uri de la requete
   $uri = $_SERVER['REQUEST_URI'];

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
   function modifierUtilisateur($pdo, $id, $nom, $prenom, $email, $sexe, $age, $poids, $taille) {
      echo('je suis dans modify');
      //Preparation and execution of the modify request
      $sql=$pdo->prepare("UPDATE utilisateurs SET `nom` = ?, `prenom` = ?, `email` = ?, `sexe` = ?, `age` = ?, `poids` = ?,`taille` = ? WHERE `id`=?");
      $sucess=$sql->execute([$nom, $prenom, $email, $sexe, $age, $poids, $taille, $id]);  

      if($sucess === false ) { //error
         http_response_code(500);
         echo json_encode(['error'=>'Erreur SQl']);
         return json_encode(['error'=>'Erreur SQl']);
      } else { //sucess
         http_response_code(200);
         echo json_encode(['User modified']);
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

   if($methode==='POST') { 
      if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['sexe'])&& isset($_POST['age']) && isset($_POST['poids']) && isset($_POST['taille'])) {
         $result = modifierUtilisateur($pdo, $_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['sexe'], $_POST['age'], $_POST['poids'], $_POST['taille']);
         echo($result);
      } else {
         $result='erreur Formulaire';
      }


   }
