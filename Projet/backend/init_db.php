<?php
   //initialisation du pdo
   require_once('init_pdo.php');

   //Initialisation de la base de données
   $create_sql = file_get_contents('../backend/sql/create_db.sql');
   $pdo->exec($create_sql);

   $data_sql = file_get_contents('../backend/sql/data.sql');
   $pdo->exec($data_sql);

   // Fermeture de la connexion avec le pdo
   // $pdo = null;
?>