<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('profil');
   ?>
   <main>
      <div class="row text-center pt-0">
         <div class="col-12">
            <div class="row justify-content-center p-2" style="background-color:#00BF63"> 
               <h1 class="text-white"><i class="fas fa-user-circle"></i>
                  Mon Profil</h1>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>