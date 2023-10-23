<!-- mettre les fonctions de l'api -->
<?php

   //initialisation de la base de données
   require_once('init_db.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   //On recupere l'uri de la requete
   $uri = $_SERVER['REQUEST_URI'];
   

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
         http_response_code(500);
         return json_encode(['error'=>'Erreur SQl']);
      } else { // success
         http_response_code(200);
         return json_encode(['User deleted']);
      }
   }

   //Modify user by ID 
   function modifyUser($pdo, $id, $name,$email) {
      //Preparation and execution of the modify request
      $modify_request=$pdo->prepare("UPDATE users SET `name` = ?, `email` = ? WHERE `id`=?");
      $sucess=$modify_request->execute([$name,$email,$id]);  

      if($sucess === false ) { //error
         http_response_code(500);
         return json_encode(['error'=>'Erreur SQl']);
      } else { //sucess
         http_response_code(200);
         return json_encode(['User modified']);
      }
   }

   //Add user 
   function addUser($pdo, $name, $email) {
      // verification de redondance
      $exist_already_request=$pdo->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
      $exist_already_request->execute([$email]);
      $exit=$exist_already_request->fetchColumn();
      
      //Requete d'ajout
      $add_request=$pdo->prepare('INSERT INTO users (name, email) VALUES (?,?)');
      
      if($exit==0) {
         $sucess=$add_request->execute([$name, $email]);
         if($sucess === false ) {
            http_response_code(500);
            return json_encode(['error'=>'Erreur SQl']);
         } else {
            http_response_code(201);
            return json_encode(['User added']);
         }
         
      }
   }

   if($methode==='GET'){  //Send All Users
      $users=userAll($pdo);
      print_r($users);
      return $users;
   } else if ($methode === 'POST' && strpos($uri, '/IDAW/tp4/exo5/api.php/api/deleteUser') === 0) { //Delete User by ID
      // Extraire l'ID de l'URI
      $id = $_POST['id'];
      $result = deleteUser($pdo, $id);
      echo $result;
   } else if ($methode === 'POST' && strpos($uri, '/IDAW/tp4/exo5/api.php/api/modifyUser') === 0) { //Modify User by ID
      if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) ) {
         $id = $_POST['id'];
         $name = $_POST['name'];
         $email = $_POST['email'];
         $result = modifyUser($pdo,$id,$name,$email);
      } else {
         $result='erreur Formulaire';
      }
      echo $result;
   } else if($methode === 'POST' && strpos($uri, '/IDAW/tp4/exo5/api.php/api/addUser') === 0) { //Add user 
      if(isset($_POST['name']) && isset($_POST['email'])){
         $name = $_POST['name'];
         $email = $_POST['email'];
         $result = addUser($pdo,$name,$email);
      } else {
         $result='erreur Formulaire';
      }
      echo $result;
   } else { //URL Not Found
      // http_response_code(404);
   }