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
   </tr>
   <?php foreach($users as $user) {
      echo
      "<tr>
         <td>{$user->id}</td>
         <td>{$user->name}</td>
         <td>{$user->email}</td>
      </tr>";
   } ?>
</table>
<h2>Add new user</h2>
<form id="add_form" action="index.php" method="post">
   <label for="name">Name:</label>
   <input type="text" id="name" name="name">
   <label for="email">Email:</label>
   <input type="text" id="email" name="email">
   <input type="submit" value="add">

</form>

<?php
   if(isset($_POST['name']) && isset($_POST['email'])){
      // ajouter la condition qu'il n'y ait pas deux fois le meme email
      $add_request=$pdo->prepare('INSERT INTO users (name, email) VALUES (?,?)');
      $name=$_POST['name'];
      $email=$_POST['email'];
      $add_request->execute([$name, $email]);
      
   }
?>
<?php
   /*** close the database connection ***/
   $_POST['name']=NULL;
   $_POST['email']=NULL;
   $pdo = null;
?>