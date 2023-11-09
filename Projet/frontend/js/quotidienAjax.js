/*****************************************************VARIABLES*************************************************/
let allRepas;
let allRepasAliments=[];
let petitDej;
let dejeuner;
let gouter;
let diner;
let allIdAliments=[];
/*****************************************************REQUETES AJAX*************************************************/
$(document).ready(function(){
   $('#formConsultationRepas').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();
      
      //Données du repas à consulter
      let date = $('#dateAConsulter').val();

      // console.log(date);
      getAllRepasByDate(date);

      //Je récupère toutes les repas de cette journée
      function getAllRepasByDate(date){
         $.ajax({
            url:'http://localhost/IDAW/Projet/backend/statistiques.php',
            type: 'GET',
            data: {date:date},
            success: function(response) {         
               allRepas = JSON.parse(response);
               getAllRepasAlimentsByRepasID(allRepas);
            },
            error: function(error) {
               console.error(error);
            }
         },)
      }

      function getAllRepasAlimentsByRepasID(allRepas){
         for(let i=0; i<allRepas.length;i++) {
            // console.log(allRepas[i]['id_repas']);
            $.ajax({
               url:'http://localhost/IDAW/projet/backend/aliment_repas.php',
               type: 'GET',
               data: {id_repas:allRepas[i]['id_repas']},
               success: function(response) {         
                  let resultat = JSON.parse(response);
                  //Stockage de tous les aliments des repas
                  allRepasAliments[i] = resultat;
               },
               error: function(error) {
                  console.error(error);
               }
            },)
         }
         console.log('tous les repas-aliments');
         console.log(allRepasAliments);
         // petitDej=allRepasAliments[0];
         console.log('petit dej:');
         console.log(petitDej);


         // console.log("extraction de tous les ID aliements")
         // let compteur=0;
         // allRepasAliments.forEach(repasAliment=>{
         //    allIdAliments[compteur]=repasAliment['id_aliment'];
         //    compteur++;
         // })
         // console.log(allIdAliments);

         //Recupération d'un tableau avec les id, les nutri, les qté et les calories
         // getAlimentsInfos(allIdAliments);

      }

      function getAlimentsInfos(){
         id_alimentsRepas = JSON.stringify(id_alimentsRepas);
         if(id_alimentsRepas!=='[]'){
            // faire une requete pour prendre les infos des aliments de ce repas
            $.ajax({
               url:'http://localhost/IDAW/projet/backend/aliments.php',
               type: 'GET',
               data: {id_aliments:id_alimentsRepas},
               success:function(response){
                  let elements = JSON.parse(response);
                  elements=JSON.parse(elements);                          
                  
               },
               error: function(error) {
                  console.error(error);
               }
            })
         } 
      }

      //Get toutes mes calories par repas (api repas ou aliment-repas)
      //Calculer toutes mes calories totale (somme repas)

      //Get mon objectif de calorie (api utilisateur)
      //Calculer les objectifs par nutriment 

      //Get tous mes nutriments de la journée

      //faire les variations de style

   })
})
/*****************************************************FONCTIONS*************************************************/
