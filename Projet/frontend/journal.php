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
      <div class="container" id="repas">
         <div class="row justify-content-center">
            <div class="col-9 justify-content-center p-4" id="titreRepas" style="font-size:30px"></div>
         </div>
         <div class="row align-items-center justify-content-center p-3">
            <div class="col-3">
               <h4>Nom repas</h4>
            </div>
            <div class="col-9">
               <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
            </div>
         </div>
         <div class="row align-items-center justify-content-center p-3">
            <div class="col-3">
               <h4>Nom repas</h4>
            </div>
            <div class="col-9">
               <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
            </div>
         </div>
         <div class="row align-items-center justify-content-center p-3">
            <div class="col-3">
               <h4>Nom repas</h4>
            </div>
            <div class="col-9">
               <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
            </div>
         </div>
         <div class="row align-items-center justify-content-center p-3">
            <div class="col-3">
               <h4>Nom repas</h4>
            </div>
            <div class="col-9">
               <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
            </div>
         </div>
         <div class="row align-items-center justify-content-center p-3">
            <div class="col-3">
               <h4>Nom repas</h4>
            </div>
            <div class="col-9">
               <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center p-4" id="quotidien" style="display: none">
         
      </div>
      <div class="row justify-content-center p-4" id="hebdomadaire" style="display: none">
         Stats hebdo
      </div>
      <div class="row justify-content-center p-4" id="mensuel" style="display: none">
         Stats mensuelle
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>
<script src="js/journal.js"></script>
<script src="js/repas.js"></script>
