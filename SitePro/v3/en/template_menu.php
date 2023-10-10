<?php 
      function renderMenuToHTML($id){
        $monMenu=array(
          'accueil'=>"Home",
          'cv'=>"Resume",
          'projets'=>"Projects",
          'centresInterets'=>"Interest",
          'infos-techniques'=>"Technical Infos",
          'contact'=>"Contact"
        );
        $url="http://localhost/IDAW/SitePro/v3/index.php?page=";
        $suiteURL="&lang=en";

         echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="'.$url.'accueil'.$suiteURL.'">My Pro Website</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">';

         foreach($monMenu as $page => $pageName){
            if($page == $id){
                echo '<li class="nav-item active">
                <a id="'.$page.'" class="nav-link" href="'.$url.$page.$suiteURL.'">'.$pageName.'<span class="sr-only">(current)</span></a> </li>';
            } else {
                echo '<li class="nav-item">
                <a id="'.$page.'" class="nav-link" href="'.$url.$page.$suiteURL.'">'.$pageName.'</a> </li>';
            }
        }
        echo '</ul></div><a href="'.$url.$id.'&lang=fr'.'">FRANCAIS</a>';
        echo '</ul> </div> </nav>';
      }
?>