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
         <div class="card m-4" style="width:500px; height:320px">
            <div class="card-header">
               <h3>Mes informations</h3>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-3 text-right">
                     <h5><span class="badge badge-secondary p-2">NOM</span></h5>
                  </div>
                  <div class="col-4">
                     <p>Nom en base</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-3 text-right">
                     <h5><span class="badge badge-secondary p-2">PRENOM</span></h5>
                  </div>
                  <div class="col-4">
                     <p>Prenom en base</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-3 text-right">
                     <h5><span class="badge badge-secondary p-2">EMAIL</span></h5>
                  </div>
                  <div class="col-4">
                     <p>Email en base</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-3 text-right">
                     <h5><span class="badge badge-secondary p-2">GENRE</span></h5>
                  </div>
                  <div class="col-4">
                     <p>Nom en base</p>
                  </div>
               </div>
            </div>
         </div>
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
                  <div class="form-group row align-items-center text-right">
                     <!-- <label class="col-2" for="genreInput">Genre</label>
                     <select id="genreInput" class="form-control col-3 ml-3">
                        <option selected></option>
                        <option>Homme</option>
                        <option>Femme</option>
                     </select> -->
                     <div class="col">
                        <button id="calculerBtn"type="button" class="btn btn-success">Calculer</button>
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
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
   <script src="js/profil.js"></script>
</body>