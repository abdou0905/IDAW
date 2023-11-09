/*****************************************************VARIABLES*************************************************/
let repas1Jour = [
   'petitDejeuner',
   'dejeuner',
   'gouter',
   'diner',
]
let nutriJournee = {
   glucides: 0,
   proteines: 0,
   lipides: 0,
   sucres: 0,
   sel:0  
}

/*****************************************************REQUETES AJAX*************************************************/
$(document).ready(function(){
   console.log('ajax 2 est ready');
      
   //Quand form Repas a consulter envoyé
   $('#formConsultationRepas').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();

      for(let i=0;i<repas1Jour.length;i++){
         //Recuperation du repas
         getRepasByDateType(repas1Jour[i]); 
      }
      //Afficher les calories totales
      //afficher les nutriments
   })

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
            console.error(error);
            cleanBodyRepas(0);
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

   function constructionData(repasAliments, infoAliments,type){
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
      // console.log("je suis dans calcul calories");
      let calorieRepas = 0;
      dataTab.forEach(data => {
         calorieRepas += data.calories*data.quantite/100;
      })
      afficherCalorieRepas(calorieRepas);
      calculNutrimentRepas(dataTab,type);
   }

   function calculNutrimentRepas(dataTab,type){
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

      let ratioGlucide = 0;
      let ratioLipide = 0;
      let ratioProteine = 0;
      let ratioSucre = 0;

      let sommeCalNutri = calorieGlucideRepas+calorieLipidesRepas+calorieProteineRepas+calorieSucreRepas;

      ratioGlucide = (calorieGlucideRepas/sommeCalNutri)*100;
      ratioLipide = (calorieLipidesRepas/sommeCalNutri)*100;
      ratioProteine = (calorieProteineRepas/sommeCalNutri)*100;
      ratioSucre = (calorieSucreRepas/sommeCalNutri)*100;

      // console.log('ratio glu repas en cours'+ratioGlucide);
      // console.log('glu journee avant'+nutriJournee.glucides);
      nutriJournee.glucides+=ratioGlucide;
      nutriJournee.lipides+=ratioLipide;
      nutriJournee.proteines+=ratioProteine;
      nutriJournee.sucres+=ratioSucre;
      nutriJournee.sel+=selRepas;


      // console.log('glu journée apres'+nutriJournee.glucides);

      //AFFICHER LES RATIOS

      // console.log("je suis dans"+type);
      // typeEnCours=null;
      // console.log('tous mes ratios !');
      // console.log('glu'+ratioGlucide.toFixed(2)+'%');
      // console.log('lip'+ratioLipide.toFixed(2)+'%');
      // console.log('prot'+ratioProteine.toFixed(2)+'%');
      // console.log('su'+ratioSucre.toFixed(2)+'%');
      // console.log('sel'+selRepas+'g');
   }

   function afficherCalorieRepas(calorieRepas){
      // console.log('jaffiche les calories par repas')
   }
   
   function afficherNutrimentScore(){
      
   }

})
