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
         <div class="card m-4" style="width:500px; height:500px">
            <div class="card-header">
               <h3>Mes informations</h3>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col text-right">
                     <h5><span class="badge badge-secondary p-2">NOM</span></h5>
                     <h5><span class="badge badge-secondary p-2">PRENOM</span></h5>
                     <h5><span class="badge badge-secondary p-2">EMAIL</span></h5>
                     <h5><span class="badge badge-secondary p-2">GENRE</span></h5>
                     <h5><span class="badge badge-secondary p-2">POIDS</span></h5>
                  </div>
                  <div class="col text-left">
                     <h5>Patarot</h5>
                     <h5>Adèle</h5>
                     <h5>adeleaddele@gmail.com</h5>
                     <h5>Femme</h5>
                     <h5>60</h5>
                  </div>
               </div>
            </div>
         </div>
         <div class="card m-4" style="width:500px; height:500px">
            <div class="row">
                  
               </div>
               <div class="col-3"></div>
            </div>
         </div>
      </div>
         <!-- <div class="card card-light" style="width: 500px">
            
            <div class="card-body">
               <div class="card-title">
                  Mes informations
               </div>
               <div class="row justfiy-content-center">
                  <div class="col-3 text-right">
                     <h4>
                        <span class="badge badge-secondary">NOM</span>
                     </h4>
                     <h4>
                        <span class="badge badge-secondary">PRENOM</span>
                     </h4>
                     <h4>
                        <span class="badge badge-secondary">EMAIL</span>
                     </h4>
                     <h4>
                        <span class="badge badge-secondary">GENRE</span>
                     </h4>
                     <h4>
                        <span class="badge badge-secondary">POIDS</span>
                     </h4>
                  </div>
                  <div class="col-6 text-left">
                     <h4>PATAROT</h4>
                     <h4>Adèle</h4>
                     <h4>adele.patarot@gmail.com</h4>
                     <h4>Femme</h4>
                     <h4>60kg</h4>
                  </div>
               </div>
            </div>
         </div> -->
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>