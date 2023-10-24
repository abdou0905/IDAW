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
               <div class="col-2 align-items-center justify-content-center">
                  <select id="dropdown" class="form-control form-control-lg" style="color:#00BF63">
                     <option value="option1">Ajouter un repas</option>
                     <option value="option2">Quotidien</option>
                     <option value="option3">Hebdomadaire</option>
                     <option value="option3">Mensuel</option> 
                     <option value="option4">Documentation</option>
                  </select>
               </div>
            </div>
         </div>
      </div>
      contenue
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>
<script scr="journal.js"></script>