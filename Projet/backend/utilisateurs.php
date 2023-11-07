<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   /*****************************************************FONCTIONS*************************************************/
   function getUtilisateurs($pdo) {
      //Preparation et Execution de la requete
      $sql = 'SELECT * FROM utilisateurs';
      $statement = $pdo->query($sql);
    
      if ($statement === false) { //Erreur
         return json_encode(['error' => 'Erreur SQL']);
      } else { //Succès
         $users = $statement->fetchAll(PDO::FETCH_OBJ);
         exit (json_encode($users));
      }
   }

   function modifierUtilisateur($pdo, $id, $nom, $prenom, $email, $sexe, $age, $poids, $taille, $sport) {
      //Preparation et Execution de la requete
      $sql=$pdo->prepare("UPDATE utilisateurs SET `nom` = ?, `prenom` = ?, `email` = ?, `age` = ?, `taille` = ?, `poids` = ?, `sexe` = ?, `sport` = ?  WHERE `id_utilisateur`=?");
      $sucess=$sql->execute([$nom, $prenom, $email, $age, $taille, $poids, $sexe, $sport, $id]);  
         
      if($sucess === false ) { //Erreur
         http_response_code(500);
         return json_encode(['Erreur SQL']);
      } else { //Succès
         http_response_code(200);
         return json_encode(['Utilisateur modifié avec Succès']);
      }
   }

   /*****************************************************REQUETES*************************************************/
   //Requete de d'obtention des Utilisateurs
   if($methode === 'GET') {
      $utilisateurs = getUtilisateurs($pdo);
      // echo($utilisateurs);
      return $utilisateurs;
   }
   
   //Requete de Mise à Jour d'un Utilisateur
   if($methode === 'PUT') {
      parse_str(file_get_contents("php://input"), $_PUT);
      if(isset($_PUT["id_utilisateur"]) && isset($_PUT["nom"]) && isset($_PUT["prenom"]) && isset($_PUT["email"]) && isset($_PUT["sexe"]) && isset($_PUT["age"]) && isset($_PUT["poids"]) && isset($_PUT["taille"]) && isset($_PUT["activite"])){
         $id = $_PUT["id_utilisateur"];
         $nom = $_PUT["nom"];
         $prenom = $_PUT["prenom"];
         $email = $_PUT["email"];
         $sexe = $_PUT["sexe"];
         $age = $_PUT["age"];
         $poids = $_PUT["poids"];
         $taille = $_PUT["taille"];
         $sport = $_PUT["activite"];
         $resultat = modifierUtilisateur($pdo, $id, $nom, $prenom, $email, $sexe, $age, $poids, $taille, $sport);
      } else {
         http_response_code(500);
         $resultat = json_encode(['Erreur Données']);
      }
      // echo($resultat);
      return $resultat;
   }