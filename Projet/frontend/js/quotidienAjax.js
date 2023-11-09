/*****************************************************VARIABLES*************************************************/
let allRepas;
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
               // console.log(allRepas);
               // console.log(allRepas[0]['id_repas']);
               getAllRepasAlimentsByRepasID(allRepas);
            },
            error: function(error) {
               console.error(error);
            }
         },)
      }

      function getAllRepasAlimentsByRepasID(allRepas){
         for(let i=0; i<allRepas.length;i++) {
            console.log(allRepas[i]['id_repas']);
            $.ajax({
               url:'http://localhost/IDAW/projet/backend/aliment_repas.php',
               type: 'GET',
               data: {id_repas:allRepas[i]['id_repas']},
               success: function(response) {         
                  allRepasAliment = JSON.parse(response);
                  console.log(allRepasAliment);
                  //Faire une fonction qui stocke tous ces aliments de repas
                  // getAllRepasAlimentsByRepasID(allRepas);
               },
               error: function(error) {
                  console.error(error);
               }
            },)
         }

      }

      //Je récupère tous les aliments de chaque repas
      // $.ajax({
      //    url:'http://localhost/IDAW/Projet/backend/aliment_repas.php',
      //    type: 'GET',
      //    data: {id:allRepas[0]},
      //    success: function(response) {         
      //       allRepas = JSON.parse(response);
      //       console.log(allRepas);
      //    },
      //   error: function(error) {
      //       console.error(error);
      //   }
      // },)



      //Get toutes mes calories par repas (api repas ou aliment-repas)
      //Calculer toutes mes calories totale (somme repas)

      //Get mon objectif de calorie (api utilisateur)
      //Calculer les objectifs par nutriment 

      //Get tous mes nutriments de la journée

      //faire les variations de style

   })
})
/*****************************************************FONCTIONS*************************************************/
