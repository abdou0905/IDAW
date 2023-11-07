<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('hebdomadaire');
   ?>
   <main>
      <div class="row text-right pt-0 justify-content-center">
         <div class="col-12">
            <div class="row align-items-center justify-content-center p-2" style="background-color:#00BF63"> 
               <h1 class="col-12 text-white text-center">
                  <!-- <i class="fas fa-calendar-day"></i> -->
                  Mes Statistiques Hebdomadaires 
               </h1>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>

