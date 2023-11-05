let calculerBtn = document.getElementById("calculerBtn");
let resultIMC = document.getElementById("resultIMC");
let scoreIMC = document.getElementById("scoreIMC");
let indicationIMC = document.getElementById("indicationIMC");

document.getElementById('tailleInput').value=utilisateur[0]['taille'];
document.getElementById('poidsInput').value=utilisateur[0]['poids'];

let IMC = [
   "Poids insuffisant",
   "Poids Normal",
   "Surpoids",
   "Obesité"
];

function calculIMC(poids, taille) {
   if(Number.isInteger(poids) && Number.isInteger(taille)){
      // Conversion en centimètres
      taille = taille / 100; 
      
      // Calcul de l'IMC
      var imc = poids / (taille * taille);
   
     return imc.toFixed(1);
   }
}

function quelleIndicationIMC(imc) {
   if(imc<18.5) {
      return IMC[0];
   } else if(imc>=18.5 && imc<24.9) {
      return IMC[1];
   } else if(imc>=24.9 && imc<29.9) {
      return IMC[2];
   } else if(imc>=30){
      return IMC[3];
   }
}
calculerBtn.addEventListener('click', function(){
   // faire le calcul de l'imc
   let poidsText = document.getElementById('poidsInput').value;
   let tailleText = document.getElementById('tailleInput').value;

   let poids = parseInt(poidsText);
   let taille = parseInt(tailleText);

   
   let imc=calculIMC(poids,taille);
   let indication=quelleIndicationIMC(imc);

   if(Number.isInteger(poids) && Number.isInteger(taille)){
      scoreIMC.textContent='Votre IMC: ' + imc;
      indicationIMC.textContent='Indication:    ' + indication;
   } else {
      scoreIMC.textContent='ERREUR: Veuillez entrer des informations valides'
   }

   //apparition des resultats
   resultIMC.style.display="block";
})

