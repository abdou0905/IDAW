<?php
   require_once('init_db.php');
   $sql_read= file_get_contents('sql/read.sql');
   $users=$pdo->query($sql_read)->fetchAll(PDO::FETCH_OBJ);
?>
<h1>My Data Base</h1>
<table border="1">
   <tr >
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Actions</th>
   </tr>
   <?php foreach($users as $user) {
      echo
      "<tr>
         <td>{$user->id}</td>
         <td>{$user->name}</td>
         <td>{$user->email}</td>
         <td>
            <form action='index.php' method='post'>
               <input type='hidden' name='id' value='$user->id'></input>
               <input type='submit' name='btnName' value='delete'></input>
            </form>
            <form action='index.php' method='post'>
               <input type='hidden' name='id' value='$user->id'></input>
               <input type='submit' name='btnName' value='modify'></input>
            </form>
         </td>
      </tr>";
   } ?>
</table>
<h2>Add new user</h2>
<form action="index.php" method="post">
   <label for="name">Name:</label>
   <input type="text" id="name" name="name">
   <label for="email">Email:</label>
   <input type="text" id="email" name="email">
   <input type="submit" value="add">
</form>

<!-- traitement formulaire add -->
<?php
   if(isset($_POST['name']) && isset($_POST['email'])){
      // ajouter la condition qu'il n'y ait pas deux fois le meme email pour resoudre beug rfresh
      $add_request=$pdo->prepare('INSERT INTO users (name, email) VALUES (?,?)');
      $name=$_POST['name'];
      $email=$_POST['email'];

      // verification de redondance
      $exist_already_request=$pdo->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
      $exist_already_request->execute([$email]);
      $exit=$exist_already_request->fetchColumn();
      if($exit==0) {
         $add_request->execute([$name, $email]);
      }
   }
?>

<!-- traitement formulaire delete-->
<?php
   if(isset($_POST['id']) && isset($_POST['btnName'])) {
      $id=$_POST['id'];
      $action=$_POST['btnName'];
      if($action=='delete') {
         $delete_request=$pdo->prepare('DELETE FROM users WHERE id=?');
         $delete_request->execute([$id]);
      }
   }
?>

<?php
   $userToModify = null;
   if(isset($_POST['id']) && isset($_POST['btnName'])) {
      $id=$_POST['id'];
      $action=$_POST['btnName'];
      
      foreach ($users as $user) {
         if ($user->id == $id) {
            $userToModify = $user;
            break; // Sortir de la boucle une fois que l'utilisateur est trouvé
         }
      }

      if($action=='modify') {
         //on affiche le formulaire de modification
         echo "<h2>Modify User</h2>
         <form action='index.php' method='post' >
            <label for='name_modify'>Name:</label>
            <input type='text' id='name_modify' name='name_modify' value='".($userToModify->name)."'>
            <label for='email_modify'>Email:</label>
            <input type='text' id='email_modify' name='email_modify' value='".($userToModify->email)."'>
            <input type='hidden' id='id_modify' name='id_modify' value='".($userToModify->id)."'>
            <input type='submit' value='modify'>
         </form>";
      }   
   }
   // traitement formulaire delete
   if(isset($_POST['name_modify']) && isset($_POST['email_modify']) && isset($_POST['id_modify'])) {
      $modify_request=$pdo->prepare("UPDATE users SET `name` = ?, `email` = ? WHERE `id`=?");
      $name=$_POST['name_modify'];
      $email=$_POST['email_modify'];
      $id=$_POST['id_modify'];
      $modify_request->execute([$name,$email,$id]);   
   }
   
?>

<?php
   /*** close the database connection ***/
   $pdo = null;
?>

