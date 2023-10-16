<!-- exécute le code SQL contenu dans ce fichier dans la base en utilisant PDO -->
<!-- utiliser file_get_contents -->

<?php
   //Import du fichier de configuration
   require_once('config.php');

   //Connction à MySQL
   $connectionString = "mysql:host=". _MYSQL_HOST;
   if(defined('_MYSQL_PORT'))
      $connectionString .= ";port=". _MYSQL_PORT;
   $connectionString .= ";dbname=" . _MYSQL_DBNAME;
   $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
   $pdo = NULL;
   try {
      $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $erreur) {
      echo 'Erreur : '.$erreur->getMessage();
   }

   //declaration et execution du code SQL
   $sql = file_get_contents('sql/create_db.sql');
   $pdo->exec($sql);

   //declaration et execution de la requete SQL
   $request = $pdo->prepare("select * from users");
   $request->execute();
   //récupération des données
   $users = $request->fetchAll(PDO::FETCH_OBJ);

   //Affichage des données dans un tableau
   echo "<table>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
      </tr>";
   foreach($users as $user) {
      echo
      "<tr>
         <td>{$user->id}</td>
         <td>{$user->name}</td>
         <td>{$user->email}</td>
      </tr>";
   }
   echo"</table>";

   /*** close the database connection ***/
   $pdo = null;

?>