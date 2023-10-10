<?php 
   function afficher($nom, $prenom){
      echo("Bienvenue ");
      echo $prenom;
      echo" ";
      echo $nom;
      echo" ";
      echo("<br>");
   }

   $classe=array (
      array(
         "nom"=>"RUIZ",
         "prenom"=>"Anna"
      ),
      array(
         "nom"=>"LEBOSS",
         "prenom"=>"Anthony"
      ),
      array(
         "nom"=>"PATAROT",
         "prenom"=>"Adele"
      ),

   );

   echo date('h:i:s A');
   echo("<br>");

   for($i=0; $i<sizeof($classe);$i++){
      afficher($classe[$i]["prenom"],$classe[$i]["nom"]);
   }
?>