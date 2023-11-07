/*****************************************************VARIABLES*************************************************/
//Formulaire d'ajout Repas
let btnNouveauRepas = document.getElementById('btnNouveauRepas');
let cardBodyNouveauRepas = document.getElementById("cardBodyNouveauRepas");
let footerNouveauRepas = document.getElementById("footerNouveauRepas");

//Formulaire d'ajout Aliments
let btnAjoutAliments = document.getElementById('btnAjoutAliments');
let cardBodyAjoutAliments = document.getElementById("cardBodyNewAlimentRepas");
let footerAjouterAliments = document.getElementById("footerAjouterAliments");

//Formulaire de Modification
let btnModification = document.getElementById('btnModification');
let cardBodyModifier = document.getElementById("cardBodyModifier");
let footerModifier = document.getElementById("footerModifier");

/*****************************************************REQUETES AJAX*************************************************/
$(document).ready(function(){
   console.log("repas ajax is ready");
   cacherFormulaireAjoutRepas();
   cacherFormulaireAjoutAliments();
   cacherFormulaireModifierRepas();
   
   $('#btnNouveauRepas').click(function(){      
      gestionApparitionFormulaireAjoutRepas();
   })

   $('#btnAjoutAliments').click(function(){      
      gestionApparitionFormulaireAjoutAliments();
   })

   $('#btnModification').click(function(){      
      gestionApparitionFormulaireModification();
   })

   //Envoie du formulaire Ajout Repas
   $('#formNewRepas').submit(function(event){
      //bloquer le formulaire
      console.log('je souhaite ajouter un repas');
      event.preventDefault();

      //preparation des données
      let date = $('#date').val();
      let type = $('#type').val();
      console.log(type);
      console.log(date);

      // Ajout du Repas
      $.ajax({
         url:'http://localhost/IDAW/projet/backend/repas.php',
         type: 'POST',
         data: {date:date, type:type},
         success: function() {         
            // window.location.href = 'repas.php';
            console.log('prout');
         },
         error: function(error) {
            console.error(error);
         }
      },)
   })




})

/*****************************************************FONCTIONS*************************************************/
//Formulaire ajout repas
function cacherFormulaireAjoutRepas(){
   cardBodyNouveauRepas.style.display="none";
   footerNouveauRepas.style.display="none"
}

function afficherFormulaireAjoutRepas(){
   cardBodyNouveauRepas.style.display="block";
   footerNouveauRepas.style.display="block";
}

function gestionApparitionFormulaireAjoutRepas(){
   if(cardBodyNouveauRepas.style.display === "none") {
      afficherFormulaireAjoutRepas();
   } else {
      cacherFormulaireAjoutRepas();
   }
}

//Formulaire ajout aliments
function cacherFormulaireAjoutAliments(){
   cardBodyAjoutAliments.style.display="none";
   footerAjouterAliments.style.display="none"
}

function afficherFormulaireAjoutAliments(){
   cardBodyAjoutAliments.style.display="block";
   footerAjouterAliments.style.display="block";
}

function gestionApparitionFormulaireAjoutAliments(){
   if(cardBodyNewAlimentRepas.style.display === "none") {
      afficherFormulaireAjoutAliments();
   } else {
      cacherFormulaireAjoutAliments();
   }
}

//Formulaire modifier
function cacherFormulaireModifierRepas(){
   cardBodyModifier.style.display="none";
   footerModifier.style.display="none"
}

function afficherFormulaireModifierRepas(){
   cardBodyModifier.style.display="block";
   footerModifier.style.display="block";
}

function gestionApparitionFormulaireModification(){
   if(cardBodyModifier.style.display === "none") {
      afficherFormulaireModifierRepas();
   } else {
      cacherFormulaireModifierRepas();
   }
}