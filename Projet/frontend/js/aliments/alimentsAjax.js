/*****************************************************VARIABLES*************************************************/
let aliments;
//Variables affichage aliment
let tbodies = document.querySelectorAll("tbody[class='aliments']");
let compteur=0;

//variables ajout aliment
let btnAjouter = document.getElementById('btnAjouter');
let cardBody = document.getElementById("cardBodyAjout");
let footer = document.getElementById("footer");
let btnSubmit = document.getElementById("btnSubmit");

/*****************************************************REQUETES AJAX*************************************************/

$(document).ready(function(){
   console.log("aliment ajax is ready");

   // Recuperation des aliments
   $.ajax({
      url:'http://localhost/IDAW/Projet/backend/aliments.php',
      type: 'GET',
      success: function(response) {         
         // console.log(response);
         aliments = JSON.parse(response);
         // console.log(aliments);
         aliments = [
            JSON.parse(aliments.legume),
            JSON.parse(aliments.fruit),
            JSON.parse(aliments.feculent),
            JSON.parse(aliments.proteine),
            JSON.parse(aliments.produitLaitier),
            JSON.parse(aliments.boisson),
            JSON.parse(aliments.snackSale),
            JSON.parse(aliments.snackSucre),
         ];
         // console.log(aliments);
         
         // let legumes = JSON.parse(aliments.legume);
         // console.log(legumes);
         afficherAliment(aliments);

      },
     error: function(error) {
         console.error(error);
     }
   },) 

   cacherFormulaireAjoutAliment();

   $('#btnAjouter').click(function(){      
      gestionApparitionFormulaire();
   })


   //Envoie du formulaire Ajout Aliment
   $('#formAjoutAliment').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();
      console.log('je souhaite ajouter un aliment');

      //preparation des données
      let categorie = $('#categorie').val();
      let designation = $('#designation').val();
      let calorie = $('#calories').val();
      let proteine = $('#proteines').val();
      let glucide = $('#glucides').val();
      let lipide = $('#lipides').val();
      let sel = $('#sels').val();
      let sucre = $('#sucres').val();

      // Ajout de l'aliment
      $.ajax({
         url:'http://localhost/IDAW/Projet/backend/aliments.php',
         type: 'POST',
         data: {categorie:categorie, designation:designation, calorie:calorie,proteine:proteine,glucide:glucide,lipide:lipide,sel:sel,sucre:sucre},
         success: function() {         
            window.location.href = 'aliments.php';
         },
         error: function(error) {
            console.error(error);
         }
      },)
   })   
})

/*****************************************************FONCTIONS*************************************************/

//Fonction afficher aliment
function afficherAliment(aliments){
   // console.log(aliments);
   aliments.forEach(categorie => {
      categorie.forEach(aliment =>{
         let tr=document.createElement('tr');
         tr.scope='row';
   
         let tdDesignation=document.createElement('td');
         tdDesignation.textContent=aliment['designation'];
         tdDesignation.classList.add("p-0", "col-3");
   
         let tdCalorie=document.createElement('td');
         tdCalorie.textContent=aliment['calories'];
         tdCalorie.classList.add("p-0", "col-2");
   
         let tdProteine=document.createElement('td');
         tdProteine.textContent=aliment['proteine'];
         tdProteine.classList.add("p-0", "col-2");
   
         let tdGlucide=document.createElement('td');
         tdGlucide.textContent=aliment['glucide'];
         tdGlucide.classList.add("p-0", "col-2");
   
         let tdLipide=document.createElement('td');
         tdLipide.textContent=aliment['lipide'];
         tdLipide.classList.add("p-0", "col-2");
   
         let tdSel=document.createElement('td');
         tdSel.textContent=aliment['sel'];
         tdSel.classList.add("p-0", "col-2");
   
         let tdSucre=document.createElement('td');
         tdSucre.textContent=aliment['sucre'];
         tdSucre.classList.add("p-0", "col-2");
   
         
         tr.appendChild(tdDesignation);
         tr.appendChild(tdCalorie);
         tr.appendChild(tdProteine);
         tr.appendChild(tdGlucide);
         tr.appendChild(tdLipide);
         tr.appendChild(tdSel);
         tr.appendChild(tdSucre);
         tbodies[compteur].appendChild(tr);
         
         // console.log(tbodies[compteur]);      
         // console.log(aliment['designation']);
      })
      compteur++;
   });
}

function cacherFormulaireAjoutAliment(){
   cardBody.style.display="none";
   footer.style.display="none"
}

function afficherFormulaireAjoutAliment(){
   cardBody.style.display="block";
   footer.style.display="block";
}

function gestionApparitionFormulaire(){
   if(cardBody.style.display === "none") {
      afficherFormulaireAjoutAliment();
   } else {
      cacherFormulaireAjoutAliment();
   }
}