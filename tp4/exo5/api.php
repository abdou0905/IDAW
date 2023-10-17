<!-- mettre les fonctions de l'api -->
<?php

   //initialisation de la base de données
   require_once('init_db.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //On recupere l'uri de la requete
   $uri = $_SERVER['REQUEST_URI'];
   
   //renvoyer le tableau des users
   if($methode==='GET' && $uri==='/IDAW/tp4/exo5/index.php/api/userAll'){
      $users=userAll($pdo);
      echo $users;
   } else {
      http_response_code(404);
      echo json_encode(['error' => 'Route non trouvee']);
   }

   function userAll($pdo) {
      $sql_read = 'SELECT * FROM users';
      $statement = $pdo->query($sql_read);
    
      if ($statement === false) {
         // Gérez l'erreur de requête ici
         return json_encode(['error' => 'Erreur SQL']);
      }
 
      $users = $statement->fetchAll(PDO::FETCH_OBJ);
      
      return json_encode($users);
   }
?>