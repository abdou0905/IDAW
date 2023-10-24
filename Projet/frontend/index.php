<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('index');
   ?>
   <main>
      <div class="row text-center pt-0">
         <div class="col-12">
            <div class="row justify-content-center align-items-center p-2" style="background-color:#00BF63"> 
               <img src="imgs/logo_fondvert.png" alt="logo_fondvert"  width="80px" height="80px">
               <h1 class="text-white ml-3">Bienvenue sur iMangerMieux</h1>
            </div>
            <div class="row justify-content-center pt-5">
               <div class="col-3 m-0 p-4 mr-4">
                  <img src="imgs/iMangerMieux_logorond.png" alt="logo_fondvert" width="350px" height="350px">
               </div>
               <div class="col-6">
                  <div class="row justify-content-center text-italic p-3">
                     <h3><em>Prenez le Contrôle de Votre Santé et de Votre Alimentation</em></h3>
                  </div>   
                  <div class="row m-0 p- text-left" style="font-size: 20px;">
                     <p class="fs-14">Vous avez toujours voulu avoir une meilleure compréhension de ce que vous mangez et de l'impact que cela a sur votre bien-être ? <br><br>
                        Notre application est conçue pour vous aider à
                        suivre de près vos habitudes alimentaires, à maintenir un journal détaillé de vos repas et à
                        optimiser votre  <br> apport énergétique quotidien. <br> <br>
                        Alors n'hésitez plus, adoptez iMangerMieux pour une meilleure alimentation et une vie plus sereine. <br>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center p-4">
         <h3>
            <i class="far fa-hand-point-down"></i>
            Découvrez tous les services de iMM !
            <i class="far fa-hand-point-down"></i>
         </h3>
      </div>
      <div class="container p-4 ">
         <div class="row p-3 justify-content-center">
            <div class="col-4">
               <a href="profil.php">
                  <div class="btn btn-light w-100 p-4 border">
                     <i class="fas fa-user-circle"></i>
                     Mon Profil
                  </div>
               </a>
            </div>
            <div class="col-6" style="font-size: 18px">
               <p>
                  <i class="far fa-hand-point-right"></i>
                  Retrouvez toutes vos informations personnelles<br>
                  <em>Nouveauté</em>: Calcul de votre <strong style="color:#00BF63">IMC </strong> - Indice de Masse Corporelle !
               </p>
            </div>
         </div> 
         <div class="row p-3 justify-content-center">
            <div class="col-4">
               <a href="aliments.php">
                  <div class="btn btn-light w-100 p-4 border">
                  <i class="fas fa-utensils"></i> 
                  Aliments
                  </div>
               </a>
            </div>
            <div class="col-6" style="font-size: 18px;">
               <p>
                  <i class="far fa-hand-point-right"></i>
                  Retrouvez tous nos <strong style="color:#00BF63">Aliments </strong>, leurs valeurs nutrionnelles  <br> Découvrez également nos différentes catégories<br>
                  <em>Nouveauté</em>: Ajout presonalisé de vos propres aliments !
               </p>
            </div>
         </div> 
         <div class="row p-3 justify-content-center">
            <div class="col-4">
               <a href="journal.php">
                  <div class="btn btn-light w-100 p-4 border">
                  <i class="fas fa-calendar-day"></i> 
                 Journal
                  </div>
               </a>
            </div>
            <div class="col-6" style="font-size: 18px;">
               <p>
                  <i class="far fa-hand-point-right"></i>
                  Retrouvez tous vos <strong style="color:#00BF63">résultats nutritionnel </strong> calculés par nos experts<br>
                  <em>Nouveauté</em>: Analyse par période: Jour - Semaine - Mois !
               </p>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>