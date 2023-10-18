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
         <div class="col btn btn-light border" id="1"></div>
         <div class="col btn btn-light border" id="2"></div>
         <div class="col btn btn-light border" id="3"></div>
         <div class="col btn btn-light border" id="4"></div>
         <div class="col btn btn-light border" id="5"></div>
         <div class="col btn btn-light border" id="6"></div>
         <div class="col btn btn-light border" id="7"></div>
         <div class="col btn btn-light border" id="8"></div>
         <div class="col btn btn-light border" id="9"></div>
      </div>
   </div>
</body>
<script src="game.js"></script>
</html>