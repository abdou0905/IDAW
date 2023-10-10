<?php 
  function renderMenuToHTML($id){
    $monMenu=array(
        'accueil'=>"Accueil",
        'cv'=>"CV",
        'projets'=>"Projets",
        'centresInterets'=>"Centres d'Intérets",
        'infos-techniques'=>"Infos Techniques",
        'contact'=>"Contact"
    );
    $url="http://localhost/IDAW/SitePro/v3/index.php?page=";
    $suiteURL="&lang=fr";

    echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="'.$url.'accueil'.$suiteURL.'">Mon Site Pro</a>
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
    echo '</ul></div><a href="'.$url.$id.'&lang=en'.'">ENGLISH</a>';
    echo '</nav>';
  }
?>