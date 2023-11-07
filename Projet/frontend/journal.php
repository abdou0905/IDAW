<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('journal');
   ?>
   <main>
      <div class="row text-right pt-0 justify-content-center">
         <div class="col-12">
            <div class="row align-items-center justify-content-center p-2" style="background-color:#00BF63"> 
               <h1 class="col-3 text-white">
                  <i class="fas fa-calendar-day"></i>
                  Mon Journal
               </h1>
            </div>
         </div>
      </div>
      <div class="row p-3 justify-content-center">
         <div class="col-4">
            <a href="quotidien.php">
               <div class="btn btn-light w-100 p-4 border">
                  <!-- <i class="fas fa-user-circle"></i> -->
                  Stat Quotidiennes
               </div>
            </a>
         </div>
         <div class="col-4">
            <a href="hebdomadaire.php">
               <div class="btn btn-light w-100 p-4 border">
                  <!-- <i class="fas fa-user-circle"></i> -->
                  Stat Hebdomadaire
               </div>
            </a>
         </div>
         <div class="col-4">
            <a href="mensuel.php">
               <div class="btn btn-light w-100 p-4 border">
                  <!-- <i class="fas fa-user-circle"></i> -->
                  Stat Mensuelle
               </div>
            </a>
         </div>
      </div>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>
<script src="js/journal/journalAjax.js"></script>

