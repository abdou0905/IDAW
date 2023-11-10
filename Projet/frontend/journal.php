<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('journal');
   ?>
   <main>
      <div class="row text-right pt-0 justify-content-center pb-3">
         <div class="col-12">
            <div class="row align-items-center justify-content-center p-2" style="background-color:#00BF63"> 
               <h1 class="col-12 text-white text-center">
                  <form action="" method="GET" id="formConsultationRepas">
                  <div class="row justify-content-center align-items-center">
                     <p class="mr-2"><i class="fas fa-sliders-h"></i></p>
                     <p class="mr-2">Mon journal du</p>
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
                  <p class="ft-red">Veuillez choisir une journée contenant les 4 repas de la journée</p>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-3">
            <h4>Mes Calories - Repas</h4>
            <table id="tableCalorie" class="table">
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
            <div class="row mb-3 ml-1">
               <h4>Mes Nutriments - Recap</h4>
            </div>
            <div class="row align-items-center mb-3 ml-1">
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
                  <p class="m-0 badge badge-dark">Sel</p>
               </div>
            </div>
            <div class="row align-items-center mb-4 ml-1">
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
                  <p class="m-0 badge" id="selJournee"></p>
               </div>
            </div>
            <div class="row align-items-center mb-4 ml-1">
               <div class="col-3">
                  <p class="m-0">Mes Objectifs</p>
               </div>
               <div class="col-8">
                  <div class="progress" style="height: 20px;">
                     <div id="gluObj"class="progress-bar bg-danger" role="progressbar"></div>
                     <div id="protObj"class="progress-bar bg-warning" role="progressbar"></div>
                     <div id="lipObj"class="progress-bar bg-success" role="progressbar"></div>
                     <div id="sucreObj"class="progress-bar bg-info" role="progressbar"></div>
                  </div>
               </div>
               <div class="col-1">
                  <p class="m-0 badge badge-dark" id="selObj"></p>
               </div>
            </div>
            <div class="card bg-light mb-4" style="width:950px">
               <div class="card-body p-2">
                  <div class="row mb-2">
                     <div class="col-3">
                        <h4>Calories Totales</h4>
                     </div>
                     <div class="col-9">
                        <h4>
                           <span class="badge" id="caloriesTotScore"></span>
                        </h4>
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-3">
                        <h4>Mon Objectif</h4>
                     </div>
                     <div class="col-9">
                        <h4>
                           <span class="badge badge-dark" id="caloriesObj"></span>
                        </h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>
<script src="js/journal.js"></script>



