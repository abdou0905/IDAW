<!-- mettre les fonctions de l'api -->
<?php

   //initialisation de la base de données
   require_once('init_db.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //On recupere l'uri de la requete
   $uri = $_SERVER['REQUEST_URI'];
   
   print_r($methode);
   //renvoyer le tableau des users
   if($methode==='GET' && $uri==='/IDAW/tp4/exo5/index.php/api/userAll'){
      $users=userAll($pdo);
      echo $users;
   } else if ($methode === 'GET' && strpos($uri, '/IDAW/tp4/exo5/index.php/api/deleteUser') === 0) {
      // Extraire l'ID de l'URI
      $id = $_GET['id'];
      $result = deleteUser($pdo, $id);
      echo $result;
   } else if ($methode === 'GET' && strpos($uri, '/IDAW/tp4/exo5/index.php/api/modifyUser') === 0) {
      echo 'prout';
      if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['email']) ) {
         $id = $_GET['id'];
         $name = $_GET['name'];
         $email = $_GET['email'];
         $result = modifyUser($pdo,$id,$name,$email);
      } else {
         $result='erreur URL';
      }
      echo $result;
   }
   
   else {
      http_response_code(404);
      echo json_encode(['error' => 'Route non trouvee']);
   }

   //Get all the users
   function userAll($pdo) {
      //Preparation and execution of the request
      $sql_read = 'SELECT * FROM users';
      $statement = $pdo->query($sql_read);
    
      if ($statement === false) { //Error
         return json_encode(['error' => 'Erreur SQL']);
      } else {
         $users = $statement->fetchAll(PDO::FETCH_OBJ);
         return json_encode($users);
      }
   }

   //Delete user by ID
   function deleteUser($pdo, $id) {
      //Preparation and execution of the delete request
      $delete_request=$pdo->prepare('DELETE FROM users WHERE id=?');
      $sucess=$delete_request->execute([$id]);

      if($sucess === false) { //error
         return json_encode(['error'=>'Erreur SQl']);
      } else { // success
         return json_encode(['User deleted']);
      }
   }

   //Modify user by ID 
   function modifyUser($pdo, $id, $name,$email) {
      //Preparation and execution of the modify request
      $modify_request=$pdo->prepare("UPDATE users SET `name` = ?, `email` = ? WHERE `id`=?");
      $sucess=$modify_request->execute([$name,$email,$id]);  

      if($sucess === false ) { //error
         return json_encode(['error'=>'Erreur SQl']);
      } else { //sucess
         return json_encode(['User modified']);
      }
   }

?>