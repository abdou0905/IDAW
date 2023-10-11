<?php
   $style='style2';

   if(isset($_COOKIE['style'])) {
      $style=$_COOKIE['style'];
   }
   
   if(isset($_GET['style'])) {
      $style=$_GET['style'];
      setcookie("style",$style);
   } 
?>
<head>
   <?php
      echo'<link href="'.$style.'.css" rel="stylesheet" type="text/css"/>';
   ?>
</head>
<body>
   <div class="container">
      <form id="style_form" action="index.php" method="GET">
         <select name="style">
            <option value="style1">style1</option>
            <option value="style2">style2</option>
         </select>
         <input type="submit" value="Appliquer" />
      </form>
   </div>   
</body>

