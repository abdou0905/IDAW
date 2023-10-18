// let win=document.getElementById('winner');
let colorPlayer='red';
let player=document.getElementById('player');
player.textContent='RED';
player.style.color=colorPlayer;

let boxs=[];

let clicks=[null, null, null,
            null, null, null,
            null, null, null];

for(let i=1;i<=9;i++) {
   let box=document.getElementById(i);
   boxs.push(box);
}

boxs.forEach(function(box) {
   box.addEventListener("click", function() {
      box.style.backgroundColor = colorPlayer;
      clicks[box.id]=colorPlayer;
      if(colorPlayer==='green') {
         colorPlayer='red';
         player.textContent='RED';
      } else {
         colorPlayer='green';
         player.textContent='GREEN';
      }
      player.style.color=colorPlayer;
      isWinner(player, clicks);
   });
});


function isWinner(player, clicks){
   //les 3 colonnes 
   if (clicks[1]==clicks[4] && clicks[4]==clicks[7] && clicks[1]==clicks[7]&& clicks[1]!=null) {
      player.textContent='Winner is player '+ clicks[1];
      player.style.color='black';      
   } 
   if (clicks[2]==clicks[5] && clicks[5]==clicks[8] && clicks[8]==clicks[2] && clicks[2]!=null) {
      player.textContent='Winner is player '+ clicks[2];
      player.style.color='black';      
   } 
   if (clicks[3]==clicks[6] && clicks[6]==clicks[9] && clicks[3]==clicks[9] && clicks[3]!=null) {
      player.textContent='Winner is player '+ clicks[3];
      player.style.color='black';      
   } 

   //les 3 lignes
   if (clicks[1]==clicks[2] && clicks[2]==clicks[3] && clicks[1]==clicks[3] && clicks[2]!=null) {
      player.textContent='Winner is player '+ clicks[1];
      player.style.color='black';      
   } 
   if (clicks[4]==clicks[5] && clicks[5]==clicks[6] && clicks[4]==clicks[6] && clicks[4]!=null) {
      player.textContent='Winner is player '+ clicks[4];
      player.style.color='black';      
   } 
   if (clicks[7]==clicks[8] && clicks[8]==clicks[9] && clicks[9]==clicks[7] && clicks[7]!=null) {
      player.textContent='Winner is player '+ clicks[7];
      player.style.color='black';      
   } 

   //les 2 diagonales
   //1,5,9
   //3,5,7
   if (clicks[1]==clicks[5] && clicks[5]==clicks[9] && clicks[1]==clicks[9] && clicks[1]!=null) {
      player.textContent='Winner is player '+ clicks[1];
      player.style.color='black';      
   } 
   if (clicks[3]==clicks[5] && clicks[5]==clicks[7] && clicks[3]==clicks[7] && clicks[3]!=null) {
      player.textContent='Winner is player '+ clicks[7];
      player.style.color='black';      
   } 
};

