<?php
   require_once('init_db.php');
   $sql_read= file_get_contents('sql/read.sql');
   $users=$pdo->query($sql_read)->fetchAll(PDO::FETCH_OBJ);
?>
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

<?php
   $add_request=$pdo->prepare('INSERT INTO users (name, email) VALUES (?,?)');
   $name='antho';
   $email='antho.bg@gmail.net';
   $add_request->execute([$name, $email]);
?>
<?php
   /*** close the database connection ***/
   $pdo = null;
?>