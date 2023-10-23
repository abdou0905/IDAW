<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('index');
   ?>
   <main>
      <div class="row text-center pt-3">
         <div class="col-12">
            <div class="row justify-content-center">
               <h1>Bienvenue sur iMangerMieux</h1>
            </div>
            <div class="row justify-content-center pt-3">
               <div class="col-2 m-0 p-0">
                  <!-- <img src="img/pdp.png" alt="PhotoCV" width="200px" height="200px"> -->
               </div>
               <div class="col-6 m-0 p-2 text-left">
                  <p>Je m'apelle Adèle Patarot, étudiante à IMT Nord Europe, école d'ingénieur généraliste <br><br>
                     Ici, je souhaite vous partager mon parcours scolaire et mes expériences professionelles. <br><br>
                     Vous pourrez en apprendre d'avantage sur moi. <br><br>
                     N'hésitez pas à me contacter si vous souhaitez collaborer avec moi pour un projet.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <h3>
            <i class="far fa-hand-point-down"></i>
            Découvrez tous les services de iMM !
            <i class="far fa-hand-point-down"></i>
         </h3>
      </div>
      <div class="container p-4">
         <div class="row p-3">
            <div class="col-4">
               <a href="profil.php">
                  <div class="btn btn-info w-100 p-4 border">
                  <i class="fas fa-user-circle"></i> Mon Profil
                  </div>
               </a>
            </div>
         </div> 
         <div class="row p-3">
            <div class="col-4">
               <a href="aliments.php">
                  <div class="btn btn-success w-100 p-4 border">
                  <i class="fas fa-utensils"></i> Aliments
                  </div>
               </a>
            </div>
         </div> 
         <div class="row p-3">
            <div class="col-4">
               <a href="journal.php">
                  <div class="btn btn-warning w-100 p-4 border">
                  <i class="fas fa-calendar-day"></i> Journal
                  </div>
               </a>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>