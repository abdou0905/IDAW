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
      // print_r($utilisateur);
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
            <div class="card-body row">
               <div class='col'>
                  <div class="row">
                     <div class="col text-right">
                        <h5><span class="badge badge-secondary p-2">NOM</span></h5>
                     </div>
                     <div class="col">
                        <p><?php echo($utilisateur[0]['nom'])?></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col text-right">
                        <h5><span class="badge badge-secondary p-2">PRENOM</span></h5>
                     </div>
                     <div class="col">
                        <p><?php echo($utilisateur[0]['prenom'])?></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col text-right">
                        <h5><span class="badge badge-secondary p-2">EMAIL</span></h5>
                     </div>
                     <div class="col">
                        <p><?php echo($utilisateur[0]['email'])?></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col text-right">
                        <h5><span class="badge badge-secondary p-2">GENRE</span></h5>
                     </div>
                     <div class="col">
                        <p><?php echo($utilisateur[0]['sexe'])?></p>
                     </div>
                  </div>
               </div>
               <div class='col'>
                  <div class="row">
                     <div class="col text-right">
                        <h5><span class="badge badge-secondary p-2">AGE</span></h5>
                     </div>
                     <div class="col">
                        <p><?php echo($utilisateur[0]['age'])?> ans</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col text-right">
                        <h5><span class="badge badge-secondary p-2">POIDS</span></h5>
                     </div>
                     <div class="col">
                        <p><?php echo($utilisateur[0]['poids'])?> kg</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col text-right">
                        <h5><span class="badge badge-secondary p-2">TAILLE</span></h5>
                     </div>
                     <div class="col">
                        <p><?php echo($utilisateur[0]['taille'])?> cm</p>
                     </div>
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
   <script>var utilisateur = <?php echo json_encode($utilisateur); ?>;</script>
   <script src="js/profil/imc.js"></script>
   <script src="js/profil/utilisateur.js"></script>
</body>