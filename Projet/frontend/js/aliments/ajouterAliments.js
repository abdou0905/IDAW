console.log("je suis dans js ajout");

let btnAjouter = document.getElementById('btnAjouter');
let cardBody = document.getElementById("cardBodyAjout");

cardBody.style.display="none";

btnAjouter.addEventListener("click", function(){
   if(cardBody.style.display === "none") {
      cardBody.style.display="block";
   } else {
      cardBody.style.display="none";
   }
})

