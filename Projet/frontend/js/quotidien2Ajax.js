/*****************************************************VARIABLES*************************************************/
let repas1Jour = [
   'petitDejeuner',
   'dejeuner',
   'gouter',
   'diner',
]

let divCaloriesRepas = {
   'petitDejeuner': document.getElementById('nbCalPetitDej'),
   'dejeuner': document.getElementById('nbCalDej'),
   'gouter': document.getElementById('nbCalGouter'),
   'diner': document.getElementById('nbCalDiner'),
}

let nutriJournee = {
   glucides: 0,
   proteines: 0,
   lipides: 0,
   sucres: 0,
   sel:0  
}

let ratiosNutri = {};

let compteurfunction =0;

// let finGetData =false;

/*****************************************************REQUETES AJAX*************************************************/
$(document).ready(function(){
   console.log('ajax 2 est ready');
   document.getElementById("caloriesTotScore").textContent="";
   
   // document.getElementById('btnConsulter').addEventListener("click", function(){ 
   //    console.log('btn consulter est clické')
   //    initVar();
   //    afficherCaloriesTotales();
   //    calculFinalNutriment();
   //    afficherNutrimentScore();
   // })  
console.log(divCaloriesRepas['dejeuner'].textContent == "");

      
   //Quand form Repas a consulter envoyé
   $('#formConsultationRepas').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();
      document.getElementById('messageErreur').style.display="none";
      

   
      for(let i=0;i<repas1Jour.length;i++){
         //Recuperation du repas
         getRepasByDateType(repas1Jour[i]);
      }
      // initVar();
      // afficherCaloriesTotales();
      // calculFinalNutriment();
      // afficherNutrimentScore();
   })

   //DIRE UNE FOIS QUE LES 4 CHAMPS DES CALORIES DES 4 REPAS SONT REMPLIS

   //NOUVELLE IDEE FAIRE UNE REQUETE QUI DONNE LES CALORIES ET LES  NUTRIMENTS
   // $.ajax({
   //    url:'https://localhost/IDAW/Projet/backend/statistiques.php',
   //    type:'POST',
   //    data:{nutriments:nutriments, calories:calories},

   //    success: function(response) {

   //    },
   //    error:function(error) {
   //       console.error(error);
   //    }
   // })

   function getRepasByDateType(type){
      //Données du repas à consulter
      let date = $('#dateAConsulter').val();
   
      //Recuperation du repas consulté
      $.ajax({
         url:'http://localhost/IDAW/Projet/backend/repas.php',
         type: 'GET',
         data: {date:date, type:type},
         
         success: function(response) {         
            let repas = JSON.parse(response);
            let id_repas =repas['id_repas'];
            
            //Recuperation du repas-aliment
            getRepasAlimentByIDRepas(id_repas,type);

         },
         error: function(error) {
            document.getElementById('nbCalPetitDej').textContent=" ";
            document.getElementById('nbCalDej').textContent=" ";
            document.getElementById('nbCalGouter').textContent=" ";
            document.getElementById('nbCalDiner').textContent=" ";
            document.getElementById('caloriesTotScore').textContent="";
            document.getElementById('messageErreur').style.display="block";
            console.error(error);

            //Mettre les barres de nutri out
         }
      })
   }

   function getRepasAlimentByIDRepas(id_repas,type){
      console.log('idrepas='+id_repas);
      $.ajax({
         url:'http://localhost/IDAW/projet/backend/aliment_repas.php',
         type: 'GET',
         data: {id_repas:id_repas},
         success: function(response) {         
            let repasAliments  = JSON.parse(response);

            //Array contenant les ID des aliments du repas
            let id_alimentsRepas = [];
            let compteur=0;

            repasAliments.forEach(alimentRepas =>{
               id_alimentsRepas[compteur]=alimentRepas.id_aliment;
               compteur++;
            })

            id_alimentsRepas = JSON.stringify(id_alimentsRepas);
            getAliments(repasAliments,id_alimentsRepas,type);
         },
         error: function(error) {
            console.error(error);
         }
      },)
   }

   function getAliments(repasAliments, id_alimentsRepas,type){
      if(id_alimentsRepas!=='[]'){
         // faire une requete pour prendre les infos des aliments de ce repas
         $.ajax({
            url:'http://localhost/IDAW/projet/backend/aliments.php',
            type: 'GET',
            data: {id_aliments:id_alimentsRepas},
            success:function(response){
               let infoAliments = JSON.parse(response);
               infoAliments = JSON.parse(infoAliments);  
               constructionData(repasAliments, infoAliments,type);
            },
            error: function(error) {
               console.error(error);
            }
         })
      } else { //Pas d'aliments dans ce repas
         cleanBodyRepas(0);
      }
   }

   function constructionData(repasAliments,infoAliments,type){
      //construction du tableau

      let dataTab = infoAliments.map(function(infoAliment){
         // Recherchez l'élément correspondant dans alimentsRepas en fonction de id_aliment
         let matchingAliment = repasAliments.find(function(aliment) {
            return aliment.id_aliment === infoAliment.id_aliment;
         });
         
         // Créez un nouvel objet avec les propriétés souhaitées
         return {
            id_aliment: infoAliment.id_aliment,
            quantite: matchingAliment.quantite,
            calories: infoAliment.calories,
            glucides: infoAliment.glucide,
            lipides: infoAliment.lipide,
            proteines: infoAliment.proteine,
            sucres: infoAliment.sucre,
            sel: infoAliment.sel,
         };
      });

      calculCaloriesRepas(dataTab,type);
   }
   
   function calculCaloriesRepas(dataTab,type){
      let calorieRepas = 0;
      dataTab.forEach(data => {
         calorieRepas += data.calories*data.quantite/100;
      })
      afficherCalorieRepas(calorieRepas,type);
      calculNutrimentRepas(dataTab,type);
      // console.log('maide maide: je suis dans')
   }

   function calculNutrimentRepas(dataTab){
      let calorieGlucideRepas = 0;
      let calorieLipidesRepas = 0;
      let calorieProteineRepas =0;
      let calorieSucreRepas = 0;
      let selRepas =0 ;

      dataTab.forEach(data =>{
         calorieGlucideRepas += ((data.glucides*data.quantite)/100)*4;
         calorieLipidesRepas += ((data.lipides*data.quantite)/100)*9;
         calorieProteineRepas += ((data.proteines*data.quantite)/100)*4;
         calorieSucreRepas += ((data.sucres*data.quantite)/100)*4;
         selRepas += (data.sel*data.quantite)/100;
      })

      nutriJournee.glucides+=calorieGlucideRepas;
      nutriJournee.lipides+=calorieLipidesRepas;
      nutriJournee.proteines+=calorieProteineRepas;
      nutriJournee.sucres+=calorieSucreRepas;
      nutriJournee.sel+=selRepas;
   }

   function calculFinalNutriment(){
      console.log('fin de journé: calcul nutri final');
      let somme = nutriJournee.glucides + nutriJournee.lipides + nutriJournee.proteines + nutriJournee.sucres;
      
      let ratioGlucide = (nutriJournee.glucides/somme)*100;
      let ratioLipide = (nutriJournee.lipides/somme)*100;
      let ratioProteine = (nutriJournee.proteines/somme)*100;
      let ratioSucre = (nutriJournee.sucres/somme)*100;

      ratiosNutri = {
         glucides: ratioGlucide,
         lipides: ratioLipide,
         proteines: ratioProteine,
         sucres: ratioSucre,
      }
   }

   function afficherCalorieRepas(calorieRepas, type){
      divCaloriesRepas[type].textContent = calorieRepas;
      compteurfunction ++;
      console.log(compteurfunction);
      if(compteurfunction==4){
         console.log('youhu');
         afficherCaloriesTotales();
         calculFinalNutriment();
         afficherNutrimentScore();
         initVar();
      }
   }
   
   function afficherCaloriesTotales(){
      console.log('fin de journée, calories totales');
      let calorieTotScore = 0;
      for(let i=0;i<4;i++){
         type=repas1Jour[i];
         calorieTotScore += parseFloat(divCaloriesRepas[type].textContent);
      }
      document.getElementById('caloriesTotScore').textContent = calorieTotScore;
   }
   
   function afficherNutrimentScore(){
      console.log('FIN DE JOURNEE AFFICHE NUTRI');
      // console.log(ratiosNutri);
      document.getElementById('gluJournee').style.width=(ratiosNutri.glucides).toFixed(0)+'%';
      document.getElementById('gluJournee').textContent=ratiosNutri.glucides.toFixed(2)+'%';

      document.getElementById('protJournee').style.width=(ratiosNutri.proteines).toFixed(0)+'%';
      document.getElementById('protJournee').textContent=ratiosNutri.proteines.toFixed(2)+'%';

      document.getElementById('lipJournee').style.width=(ratiosNutri.lipides).toFixed(0)+'%';
      document.getElementById('lipJournee').textContent=ratiosNutri.lipides.toFixed(2)+'%';

      document.getElementById('sucreJournee').style.width=(ratiosNutri.sucres).toFixed(0)+'%';
      document.getElementById('sucreJournee').textContent=ratiosNutri.sucres.toFixed(2)+'%';

      document.getElementById('selJournee').textContent=nutriJournee.sel.toFixed(2);
   }

   function initVar(){
      console.log("FIN DE JOURNEE, INITIALISATION VARIABLES");

      nutriJournee.glucides = 0;
      nutriJournee.lipides = 0;
      nutriJournee.proteines = 0;
      nutriJournee.sucres = 0;
      nutriJournee.sel = 0;

      ratiosNutri.glucides = 0;
      ratiosNutri.lipides = 0;
      ratiosNutri.proteines = 0;
      ratiosNutri.sucres = 0;
      ratiosNutri.sel = 0;

      compteurfunction = 0;
      console.log("verification de l'initialisation");
      console.log('nutrijournee');
      console.log(nutriJournee);
      console.log("ratiosNutri");
      console.log(ratiosNutri);
   }
})
