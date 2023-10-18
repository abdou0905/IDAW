let colorPlayer='red';
let player=document.getElementById('player');
player.textContent='RED';
player.style.color=colorPlayer;

let boxs=[];
for(let i=1;i<=9;i++) {
   let box=document.getElementById('box'+i);
   boxs.push(box);
}

boxs.forEach(function(box) {
   box.addEventListener("click", function() {
      box.style.backgroundColor = colorPlayer;

   });
   
   box.addEventListener("click", function(){
      if(colorPlayer==='green') {
         colorPlayer='red';
         player.textContent='RED';
      } else {
         colorPlayer='green';
         player.textContent='GREEN';
         
      }
      player.style.color=colorPlayer;
   });

});

