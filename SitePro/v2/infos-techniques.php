<?php
   require_once('template_header.php');
?>
<body>
   <?php
      require_once('template_menu.php');
      renderMenuToHTML("infos-techniques");
   ?>
   <main>
      <div class="row justify-content-center text-center">
         <div class="col-12 text-center p-3">
            <div class="row justify-content-center">
               <h1>Infos Techniques</h1>
            </div>
            <div class="row justify-content-center">
               <p>Ce site utilise les languages suivants:</p>
            </div>      
            <div class="row justify-content-center mt-3 mb-3">
               <div class="col-2">
                  <img height="100px" width="100px" src="html.png">
               </div>
               <div class="col-2">
                  <img height="100px" width="80px" src="css.png">
               </div>
               <div class="col-2">
                  <img height="100px" width="120px" src="php.png">
               </div>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('template_footer.php');
   ?>
</body>