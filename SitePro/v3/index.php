<?php
   $language='fr';
   if(isset($_GET['lang'])) {
      $language = $_GET['lang'];
   }
   $currentPageId = 'accueil';
   if(isset($_GET['page'])) {
      $currentPageId = $_GET['page'];
   }
   require_once("$language/template_header.php");
   require_once("$language/template_menu.php");
?>
<body>
   <?php
   renderMenuToHTML($currentPageId);
   ?>
   <main>
      <section class="corps">
         <?php
            $pageToInclude = $language.'/'.$currentPageId.".php";   
            if(is_readable($pageToInclude))
               require_once($pageToInclude);
            else
               require_once("$language/error.php");
         ?>
      </section>
   </main>
   <?php
      require_once("$language/template_footer.php");
   ?>
</body>
</html>