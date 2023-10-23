<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('profil');
   ?>
   <main>
      <div class="container">
         <div class="row justify-content-center text-center">
            <div class="col-12 text-center p-3">
               <h1>
                  <i class="fas fa-user-circle"></i>
                  Mon Profil
               </h1>
            </div>
         </div>
         <div>

         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>