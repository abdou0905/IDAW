<?php 
  function renderMenuToHTML($id){
    $monMenu=array(
      'index'=>"Accueil",
      'profil'=>"Profil",
      'aliments'=>"Aliments",
      'journal'=>"Journal",
    );

    echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"> <img src="imgs/iMangerMieux_logorond.png" alt="logo_fondvert"  width="60px" height="60px"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">';

    foreach($monMenu as $page => $pageName){
      if($page == $id){
        echo '<li class="nav-item active" style="font-size:20px">
        <a id="'.$page.'" class="nav-link" href="'.$page.".php".'">'.$pageName.'<span class="sr-only">(current)</span></a> </li>';
      } else {
        echo '<li class="nav-item"  style="font-size:20px">
        <a id="'.$page.'" class="nav-link" href="'.$page.".php".'">'.$pageName.'</a> </li>';
      }
    }
  echo '</ul> </div> </nav>';
  }
?>


