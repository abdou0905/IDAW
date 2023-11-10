<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('quotidien');
   ?>
   <main>
      <div class="row text-right pt-0 justify-content-center pb-3">
         <div class="col-12">
            <div class="row align-items-center justify-content-center p-2" style="background-color:#00BF63"> 
               <h1 class="col-12 text-white text-center">
                  <form action="" method="GET" id="formConsultationRepas">
                  <div class="row justify-content-center align-items-center">
                     <p class="mr-2"><i class="fas fa-sliders-h"></i></p>
                     <p class="mr-2">Mon Bilan Quotidien du</p>
                     <div class="form-group mr-2">
                        <input type="date" id="dateAConsulter" class="form-control" style="background-color:#00BF63; color:white">
                     </div>
                     <div class="form-group mr-2">
                        <button id="btnConsulter"class="btn btn-success" type="submit" style="background-color:#00BF63">CONSULTER</button>
                     </div>
                  </div>
                  </form>
               </h1>
               <div class="row" id="messageErreur">
                  <p class="ft-red">Veuillez choisir une journée contenant des repas</p>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-3">
            <h4>Mes Calories - Repas</h4>
            <table class="table table-success">
               <thead>
                  <tr>
                     <th class="p-2">Repas</th>
                     <th class="p-2">Calories</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Petit Déjeuner</td>
                     <td id="nbCalPetitDej"></td>
                  </tr>
                  <tr>
                     <td>Déjeuner</td>
                     <td id="nbCalDej"></td>
                  </tr><tr>
                     <td>Goûter</td>
                     <td id="nbCalGouter"></td>
                  </tr><tr>
                     <td>Diner</td>
                     <td id="nbCalDiner"></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-8 ml-4">
            <div class="row mb-5">
               <h4>
                  Mes Calories Totales
                  <span class="badge badge-success" id="caloriesTotScore"></span>
                  <span class="badge badge-success" id="caloriesObjectif"></span>
                  Mon Objectif
               </h4>
            </div>
            <!-- <div class="row justify-content-center card">
               <div class="col">
                  <h4>
                     Mes Calories Totales
                     <span class="badge badge-success" id="caloriesTotScore"></span>
                  </h4>
               </div>
               <div class="col">
                  <h4>
                     Mon Objectif
                     <span class="badge badge-dark">NB</span>
                  </h4>
               </div>
            </div> -->
            <!-- <div class="row"> -->
               <div class="row">
                  <h4>Mes Nutriments - Recap</h4>
               </div>
               <div class="row align-items-center mb-2">
                  <div class="col-3">
                     <p class="m-0">Les Nutriments</p>
                  </div>
                  <div class="col-8">
                     <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%">Glucides</div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%">Protéines</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%">Lipides</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%">Sucres</div>
                     </div>
                  </div>
                  <div class="col-1">
                     <p class="m-0">Sel en g</p>
                  </div>
               </div>
               <div class="row align-items-center mb-2">
                  <div class="col-3">
                     <p class="m-0">Mes Scores</p>
                  </div>
                  <div class="col-8">
                     <div class="progress" style="height: 20px;">
                        <div id="gluJournee" class="progress-bar bg-danger" role="progressbar"></div>
                        <div id="protJournee" class="progress-bar bg-warning" role="progressbar"></div>
                        <div id="lipJournee" class="progress-bar bg-success" role="progressbar"></div>
                        <div id="sucreJournee" class="progress-bar bg-info" role="progressbar"></div>
                     </div>
                  </div>
                  <div class="col-1">
                     <p class="m-0" id="selJournee"></p>
                  </div>
               </div>
               <div class="row align-items-center mb-2">
                  <div class="col-3">
                     <p class="m-0">Mes Objectifs</p>
                  </div>
                  <div class="col-8">
                     <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%">15%</div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 15%">15%</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%">30%</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%">20%</div>
                     </div>
                  </div>
                  <div class="col-1">
                     <p class="m-0">Sel</p>
                  </div>
               </div>
               <!-- <table class="table table-success">
                  <thead>
                     <tr>
                        <th></th>
                        <th class="p-2">Glucides</th>
                        <th class="p-2">Protéines</th>
                        <th class="p-2">Lipides</th>
                        <th class="p-2">Sucres</th>
                        <th class="p-2">Sels</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Mon score</td>
                        <td>NB</td>
                        <td>NB</td>
                        <td>NB</td>
                        <td>NB</td>
                        <td>NB</td>
                     </tr>
                     <tr>
                        <td>Mon objectif</td>
                        <td>NB</td>
                        <td>NB</td>
                        <td>NB</td>
                        <td>NB</td>
                        <td>NB</td>
                     </tr>
                  </tbody>
               </table> -->
            <!-- </div> -->
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>
<!-- <script src="js/quotidienAjax.js"></script> -->
<script src="js/quotidien2Ajax.js"></script>



