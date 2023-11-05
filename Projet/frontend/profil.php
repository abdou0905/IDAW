<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('profil');
   ?>

   <?php
      require('../backend/utilisateurs.php');
      $utilisateur=getUtilisateurs($pdo);
      $utilisateur = json_decode($utilisateur,true);
   ?>
   <main>
      <div class="row justify-content-center p-2" style="background-color:#00BF63"> 
         <h1 class="text-white">
            <i class="fas fa-user-circle"></i>
            Mon Profil
         </h1>
      </div>
      <div class="row justify-content-center">
         <form id="formModifier" method="post" action="../backend/utilisateurs.php">
            <div class="card m-4" style="width:500px; height:320px">
               <div class="card-header">
                  <h3>Mes informations</h3>
               </div>
               <div class="card-body row">
                  <div class='col'>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">NOM</span></h5>
                        </div>
                        <div class="col">
                           <p id="nom"></p>
                           <input class="form-control" id="inputNom" type="text">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">PRENOM</span></h5>
                        </div>
                        <div class="col">
                           <p id="prenom"></p>
                           <input class="form-control" id="inputPrenom" type="text">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">EMAIL</span></h5>
                        </div>
                        <div class="col">
                           <p id="email"></p>
                           <input class="form-control" id="inputEmail" type="text">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">GENRE</span></h5>
                        </div>
                        <div class="col">
                           <p id="genre"></p>
                           <input class="form-control" id="inputGenre" type="text">
                        </div>
                     </div>
                  </div>
                  <div class='col'>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">AGE</span></h5>
                        </div>
                        <div class="col">
                           <p id="age"></p>
                           <input class="form-control" id="inputAge" type="text">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">POIDS</span></h5>
                        </div>
                        <div class="col">
                           <p id="poids"></p>
                           <input class="form-control" id="inputPoids" type="text">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">TAILLE</span></h5>
                        </div>
                        <div class="col">
                           <p id="taille"></p>
                           <input class="form-control" id="inputTaille" type="text">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <button class="btn btn-dark" type="button" id="btnModifier" style="display:block">
                     Modifier mes informations
                  </button>
                  <button class="btn btn-dark" id="btnSauvegarder" style="display:none">
                     Sauvergarder
                  </button>   
               </div>
            </div>
         </form>
         <div class="card m-4" style="width:500px; height:320px">
            <div class="card-header">
               <h3>Calculer mon IMC</h3>
            </div>
            <div class="card-body">
               <form action="get">
                  <div class="form-group row">
                     <label for="tailleInput" class="col-sm-2 col-form-label">Taille</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="tailleInput" placeholder="Votre taille en cm">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="poidsInput" class="col-sm-2 col-form-label">Poids</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="poidsInput" placeholder="Votre Poids en kg">
                     </div>
                  </div>
                  <div id="resultIMC" class="row align-items-center m-2" style="display:none">
                     <div id="scoreIMC">
                     </div>
                     <div id="indicationIMC">
                     </div>
                  </div>
               </form>
            </div>
            <div class="card-footer text-right">
               <button id="calculerBtn"type="button" class="btn btn-dark">Calculer</button>
            </div>
         </div>
      </div>   
   </main>

   <?php
      require_once('templates/template_footer.php')
   ?>
   <script>var utilisateur = <?php echo json_encode($utilisateur); ?>;</script>
   <script src="js/profil/imc.js"></script>
   <script src="js/profil/utilisateur.js"></script>
</body>

