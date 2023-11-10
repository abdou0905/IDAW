<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('profil');
   ?>
   <main>
      <div class="row justify-content-center p-2" style="background-color:#00BF63"> 
         <h1 class="text-white">
            <i class="fas fa-user-circle"></i>
            Mon Profil
         </h1>
      </div>
      <div class="row justify-content-center">
         <form id="formModifier" method="post" action="profil.php">
            <div class="card m-4" style="width:500px; height:320px">
               <div class="card-header">
                  <h3>Mes informations</h3>
               </div>
               <div class="card-body row">
                  <div class='col'>
                     <input type="text" style="display:none" id="id_utilisateur" name="id_utilisateur">
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">NOM</span></h5>
                        </div>
                        <div class="col">
                           <p id="nom"></p>
                           <input class="form-control" id="inputNom" type="text" name="nom">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">PRENOM</span></h5>
                        </div>
                        <div class="col">
                           <p id="prenom"></p>
                           <input class="form-control" id="inputPrenom" type="text" name="prenom">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">EMAIL</span></h5>
                        </div>
                        <div class="col">
                           <p id="email"></p>
                           <input class="form-control" id="inputEmail" type="text" name="email">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">GENRE</span></h5>
                        </div>
                        <div class="col">
                           <p id="genre"></p>
                           <select class="form-control" id="selectGenre" type="text" name="sexe">
                              <option id="F">F</option>
                              <option id="H">H</option>
                           </select>   
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
                           <input class="form-control" id="inputAge" type="text" name="age">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">POIDS</span></h5>
                        </div>
                        <div class="col">
                           <p id="poids"></p>
                           <input class="form-control" id="inputPoids" type="text" name="poids">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">TAILLE</span></h5>
                        </div>
                        <div class="col">
                           <p id="taille"></p>
                           <input class="form-control" id="inputTaille" type="text" name="taille">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col text-right">
                           <h5><span class="badge badge-light p-2">ACTIVITE</span></h5>
                        </div>
                        <div class="col">
                           <p id="activite"></p>
                           <select class="form-control" id="selectActivite" type="text" name="activite">
                              <option value="1">1 - Sédentaire</option>
                              <option value="2">2 - Très peu actif</option>
                              <option value="3">3 - Peu actif</option>
                              <option value="4">4 - Actif</option>
                              <option value="5">5 - Très Actif</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <button class="btn btn-dark" type="button" id="btnModifier" style="display:block">
                     Modifier mes informations
                  </button>
                  <button class="btn btn-dark" type="submit" id="btnSauvegarder" style="display:none">
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
                  <div class="form-group row mb-1">
                     <label for="tailleInput" class="col-sm-2 col-form-label">
                        <div class="col text-right p-0">
                           <h5><span class="badge badge-light p-2">TAILLE</span></h5>
                        </div>
                     </label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="tailleInput" placeholder="Votre taille en cm">
                     </div>
                  </div>
                  <div class="form-group row mb-0">
                     <label for="poidsInput" class="col-sm-2 col-form-label">
                        <div class="col text-right p-0">
                           <h5><span class="badge badge-light p-2">POIDS</span></h5>
                        </div>
                     </label>
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
            <div class="card-footer text-left">
               <button id="calculerBtn"type="button" class="btn btn-dark">Calculer</button>
            </div>
         </div>
      </div>   
      <div class="row justify-content-center">
         <div class="card m-4" style="width:1100px; height:150px">
            <div class="card-header">
               <h5>
                  Mes Recommandations & Objectifs
               </h5>
            </div>
            <div class="card-body">
               <div class="row align-items-center">
                  <h3 class="col">
                     <span class="badge badge-primary p-2" id="objCalories"></span>
                  </h3>
                  <h3 class="col">
                     <span class="badge badge-danger p-2" id="objGlu"></span>
                  </h3>
                  <h3 class="col">
                     <span class="badge badge-warning p-2" id="objProt"></span>
                  </h3>
                  <h3 class="col">
                     <span class="badge badge-success p-2" id="objLip"></span>
                  </h3>
                  <h3 class="col">
                     <span class="badge badge-info p-2" id="objSucre"></span>
                  </h3>
                  <h3 class="col">
                     <span class="badge badge-dark p-2">Sel: 2.3g</span>
                  </h3>
               </div>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
   <script src="js/profil.js"></script>
</body>