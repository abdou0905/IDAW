<?php
   require_once('template_header.php');
?>
<body>
   <?php
      require_once('template_menu.php');
      renderMenuToHTML('index');
   ?>
   <main>
      <div class="row text-center pt-3">
         <div class="col-12">
            <div class="row justify-content-center">
               <h1>Bienvenue sur mon Site Professionel</h1>
            </div>
            <div class="row justify-content-center pt-3">
               <div class="col-2 m-0 p-0">
                  <img src="pdp.png" alt="PhotoCV" width="200px" height="200px">
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
      <div class="container p-4">
         <div class="row">
            <div class="col-4">
               <a href="cv.php">
                  <div class="btn btn-light w-100 p-4 border">
                     <i class="fas fa-graduation-cap fa-lg"></i> Mon CV
                  </div>
               </a>
            </div>
            <div class="col-4">
               <a href="projets.php">
                  <div class="btn btn-light w-100 p-4 border">
                     <i class="fas fa-lightbulb"></i> Mes Projets
                  </div>
               </a>
            </div>
            <div class="col-4">
               <a href="centresInterets.php">
                  <div class="btn btn-light w-100 p-4 border">
                     <i class="fas fa-hand-peace"></i> Mes Centres d'Intérets
                  </div>
               </a>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('template_footer.php');
   ?>
</body>
</html>