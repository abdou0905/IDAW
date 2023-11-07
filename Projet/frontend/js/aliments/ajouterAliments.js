let btnAjouter = document.getElementById('btnAjouter');
let cardBody = document.getElementById("cardBodyAjout");
let footer = document.getElementById("footer");
// let btnSubmit = document.getElementById("btnSubmit");

cardBody.style.display="none";
btnSubmit.style.display="none";
footer.style.display="none"

btnAjouter.addEventListener("click", function(){
   if(cardBody.style.display === "none") {
      cardBody.style.display="block";
      btnSubmit.style.display="block";
      footer.style.display="block";

   } else {
      cardBody.style.display="none";
      btnSubmit.style.display="none";
      footer.style.display="none";
   }
})

