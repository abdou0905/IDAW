<?php
   // on simule une base de données
   $users = array(
      // login => password
      'adele' => 'adele',
      'guigui' => 'guigui' 
   );

   $login = "anonymous";
   $errorText = "";
   $successfullyLogged = false;
   //Methode avec GET   
   // if(isset($_GET['login']) && isset($_GET['password'])) {
   //    $tryLogin=$_GET['login'];
   //    $tryPwd=$_GET['password'];
   //    // si login existe et password correspond
   //    if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
   //       $successfullyLogged = true;
   //       $login = $tryLogin;
   //    } else
   //       $errorText = "Erreur de login/password";
   // } 
   
   //Methode avec POST
   if(isset($_POST['login']) && isset($_POST['password'])) {
      $tryLogin=$_POST['login'];
      $tryPwd=$_POST['password'];
      // si login existe et password correspond
      if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
         $successfullyLogged = true;
         $login = $tryLogin;
      } else
         $errorText = "Erreur de login/password";
   } else 
      $errorText = "Merci d'utiliser le formulaire de login";
      if(!$successfullyLogged) {
         echo $errorText;
      } else {
         echo "<h1>Bienvenu ".$login."</h1>";
      }
   
?>