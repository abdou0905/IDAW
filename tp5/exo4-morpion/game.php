<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Game</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
   <div class="row justify-content-center">
      <h1>Morpion Game</h1>
   </div>
   <div class="row justify-content-center">
      <h2>Player:
         <p id="player"></p>
      </h2>
   </div>
   <div class='container' >
      <div class="row row-cols-3" style="height: 500px">
         <div class="col btn btn-light border" id="box1"></div>
         <div class="col btn btn-light border" id="box2"></div>
         <div class="col btn btn-light border" id="box3"></div>
         <div class="col btn btn-light border" id="box4"></div>
         <div class="col btn btn-light border" id="box5"></div>
         <div class="col btn btn-light border" id="box6"></div>
         <div class="col btn btn-light border" id="box7"></div>
         <div class="col btn btn-light border" id="box8"></div>
         <div class="col btn btn-light border" id="box9"></div>
      </div>
   </div>
</body>
<script src="game.js"></script>
</html>