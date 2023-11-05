<?php
   //initialisation du pdo
   require_once('init_pdo.php');

   //Initialisation de la base de données
   $sql = file_get_contents('../backend/sql/create_db.sql');
   $pdo->exec($sql);

   //Fermeture de la connexion avec le pdo
   // $pdo = null;
?>