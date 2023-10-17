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
            <form action='index.php' method='post' onsubmit='location.reload()'>
               <input type='hidden' name='id' value='$user->id'></input>
               <input type='submit' name='btnName' value='delete'></input>
            </form>
         </td>
      </tr>";
   } ?>
</table>
<h2>Add new user</h2>
<form action="index.php" method="post" onsubmit="location.reload()">
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
<!-- traitement formulaire delete -->
<?php
   if(isset($_POST['id']) && isset($_POST['btnName'])) {
      $id=$_POST['id'];
      $action=$_POST['btnName'];
      if($action=='delete'){
         $delete_request=$pdo->prepare('DELETE FROM users WHERE id=?');
         $delete_request->execute([$id]);
      }
   }
?>
<?php
   /*** close the database connection ***/
   $pdo = null;
?>