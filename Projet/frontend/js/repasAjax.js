/*****************************************************VARIABLES*************************************************/
let aliments;
let id_repas_consulte;
let alimentsRepas;

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

   // Récupération des aliments
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
         console.log(aliments);
      },
     error: function(error) {
         console.error(error);
     }
   },)

   //Completion des aliments dispo pour l'ajout d'aliment
   $("#categorie").change(function() {
      remplirSelectAliment(aliments);
   })

   //Quand form Repas a consulter envoyé
   $('#formConsultationRepas').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();
      
      //Données du repas à consulter
      let type = $('#typeRepasAConsulter').val();
      let date = $('#dateAConsulter').val();
   
      //Recuperation du repas consulté
      $.ajax({
         url:'http://localhost/IDAW/Projet/backend/repas.php',
         type: 'GET',
         data: {date:date, type:type},
         
         success: function(response) {         
            let repas = JSON.parse(response);
            id_repas_consulte=repas.id_repas;

            //Récuperation des informations du repas
            $.ajax({
               url:'http://localhost/IDAW/projet/backend/aliment_repas.php',
               type: 'GET',
               data: {id_repas:id_repas_consulte},
               success: function(response) {         
                  console.log("je suis sucess pour get les aliemnts du repas");
                  // console.log(response);
                  alimentsRepas = JSON.parse(response);
                  // console.log(alimentsRepas);

                  //Array contenant les ID des aliments du repas
                  let id_alimentsRepas = [];
                  let compteur=0;
                  alimentsRepas.forEach(alimentRepas =>{
                     id_alimentsRepas[compteur]=alimentRepas.id_aliment;
                     compteur++;
                  })
                  id_alimentsRepas = JSON.stringify(id_alimentsRepas);
                  console.log(id_alimentsRepas);
                  if(id_alimentsRepas!=='[]'){
                     // faire une requete pour prendre les infos des aliments de ce repas
                     $.ajax({
                        url:'http://localhost/IDAW/projet/backend/aliments.php',
                        type: 'GET',
                        data: {id_aliments:id_alimentsRepas},
                        success:function(response){
                           let elements = JSON.parse(response);
                           elements=JSON.parse(elements);
                           // console.log(elements);
                           // console.log(elements[0]);
                           
                           afficherAlimentRepas(elements, alimentsRepas);
                        },
                        error: function(error) {
                           console.error(error);
                        }
                     })
                  } else {
                     cleanBodyRepas();
                     console.log('pas encore daliments dans ce repas');
                  }
                  
               },
               error: function(error) {
                  console.error(error);
               }
            },)  
         },
        error: function(error) {
            console.error(error);
        }
      },)
   })

   //Envoie du formulaire Ajout Repas
   $('#formNewRepas').submit(function(event){
      //bloquer le formulaire
      console.log('je souhaite ajouter un repas');
      event.preventDefault();

      //preparation des données
      let date = $('#date').val();
      let type = $('#type').val();
      // console.log(type);
      // console.log(date);

      // Ajout du Repas
      $.ajax({
         url:'http://localhost/IDAW/projet/backend/repas.php',
         type: 'POST',
         data: {date:date, type:type},
         success: function() {         
            window.location.href = 'repas.php';
            // console.log('prout');
         },
         error: function(error) {
            console.error(error);
         }
      },)
   })

   //Ajouter un aliment au repas 
   $('#formNewAlimentRepas').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();
      console.log('je souhaite ajouter un aliment au repas');

      //preparation des données
      let id_aliment = $('#alimentsAjoutSelect').val();
      let quantite = $('#quantite').val();
      // console.log('aliment'+id_aliment);
      // console.log('repas'+id_repas_consulte);
      // console.log('qte'+quantite);

      // Ajout de l'aliment
      $.ajax({
         url:'http://localhost/IDAW/projet/backend/aliment_repas.php',
         type: 'POST',
         data: {id_aliment:id_aliment, id_repas:id_repas_consulte, quantite:quantite},
         success: function() {         
            cacherFormulaireAjoutAliments();
            //reload la page? 
            // window.location.href = 'repas.php'; //peut etre ici le pb de l'ajout ! 
         },
         error: function(error) {
            console.error(error);
         }
      },)
   }) 

   //Suppression d'un aliment
      $('#formAlimentASupprimer').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();
      console.log('je souhaite supprimer un aliment au repas');

      //preparation des données
      //fonctionnera mais faire la completion des options des aliments d'abord
      // let id_aliment = $('#alimentASupprimer').val();
      // let id_aliment=12; pour exemple

      // Suppression de l'aliment de l'aliment
      $.ajax({
         url:'http://localhost/IDAW/projet/backend/aliment_repas.php',
         type: 'DELETE',
         data: {id_aliment:id_aliment, id_repas:id_repas_consulte},
         success: function() {         
            window.location.href = 'repas.php';
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

function remplirSelectAliment(alimentsParCategorie){
   console.log("je vais remplir les aliments !");
   let categorieSelect = document.getElementById("categorie");
   let alimentsSelect = document.getElementById("alimentsAjoutSelect");
       
   let selectedType = categorieSelect.value;
   let aliments = alimentsParCategorie[selectedType];
   // console.log(selectedType);
   // console.log(alimentsParCategorie);
   // console.log(aliments);
   alimentsSelect.innerHTML = ""; // Efface toutes les options actuelles

   aliments.forEach(function (aliment) {
      let option = document.createElement("option");
      option.value = aliment['id_aliment'];
      option.textContent = aliment['designation'];
      // console.log(alimentsSelect);
      alimentsSelect.appendChild(option);
      // console.log(option);
   });
}

function cleanBodyRepas() {
   let tbody = document.getElementById('repas_body');
   
   // Supprimez tous les éléments enfants du tbody (pour vider le contenu)
   while (tbody.firstChild) {
      tbody.removeChild(tbody.firstChild);
   }
}
function afficherAlimentRepas(elements, alimentsRepas) {
   let compteur = 0;
   let caloriesTotalesRepas = 0;

   let tbody = document.getElementById('repas_body');

   cleanBodyRepas();
   
   console.log('elements:');
   elements.forEach(element=>{
      console.log(element)
   })

   console.log('aliments:');
   alimentsRepas.forEach(aliment=>{
      console.log(aliment)
   })

   //construction du tableau

   let resultArray = elements.map(function(element) {
      // Recherchez l'élément correspondant dans alimentsRepas en fonction de id_aliment
      let matchingAliment = alimentsRepas.find(function(aliment) {
        return aliment.id_aliment === element.id_aliment;
      });

      // Créez un nouvel objet avec les propriétés souhaitées
      return {
         id_aliment: element.id_aliment,
         designation: element.designation,
         calories: element.calories,
         quantite: matchingAliment.quantite
      };
   });

   console.log('jolie tableau');
   console.log(resultArray);
   
   resultArray.forEach(row => {

      let tr=document.createElement('tr');
      tr.scope='row';      
      
      let tdDesignation=document.createElement('td');
      tdDesignation.textContent=row.designation;
      tdDesignation.classList.add("p-0", "col-3");

      let tdQuantite=document.createElement('td');
      tdQuantite.textContent=row.quantite+' g';
      tdQuantite.classList.add("p-0", "col-2");

      let tdCalories=document.createElement('td');
      tdCalories.textContent=(row.quantite*row.calories)/100;
      tdCalories.classList.add("p-0", "col-2");
      
      tr.appendChild(tdDesignation);
      tr.appendChild(tdQuantite);
      tr.appendChild(tdCalories);

      tbody.appendChild(tr);

      compteur++;
      caloriesTotalesRepas+=parseFloat(tdCalories.textContent);
   })

   //Afficher les calories totales
   document.getElementById("caloriesTotRepas").textContent='Total Calories = '+caloriesTotalesRepas+ ' kcal';
}