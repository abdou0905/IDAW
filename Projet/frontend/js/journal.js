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

let compteurfunction = 0;

let somme = 0; //somme des calorie des nutriments

let nbClickConsuler = 0;

/*****************************************************REQUETES AJAX*************************************************/
$(document).ready(function(){
   afficherNutriObjectif();
      
   //Quand form Repas a consulter envoyé
   $('#formConsultationRepas').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();
      document.getElementById('messageErreur').style.display="none";

      nbClickConsuler++;
      
      for(let i=0;i<repas1Jour.length;i++){
         //Recuperation du repas
         getRepasByDateType(repas1Jour[i]);
      }
   })

   //Recuperation de l'utilisateur pour les Objectifs
   $.ajax({
      url:url+'utilisateurs.php',
      type: 'GET',
      success: function(response) {         
         utilisateur = JSON.parse(response); 
         calculObjectif(utilisateur);
      },
     error: function(error) {
         console.error(error);
     }
   },) 



   function getRepasByDateType(type){
      //Données du repas à consulter
      let date = $('#dateAConsulter').val();
   
      //Recuperation du repas consulté
      $.ajax({
         url:url+'repas.php',
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
            initProgress();
            console.error(error);
         }
      })
   }

   function getRepasAlimentByIDRepas(id_repas,type){
      $.ajax({
         url:url+'aliment_repas.php',
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
            url:url+'aliments.php',
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
      calculNutrimentRepas(dataTab,type);
      afficherCalorieRepas(calorieRepas,type);
   }

   function calculNutrimentRepas(dataTab){
      let calorieGlucideRepas = 0;
      let calorieLipidesRepas = 0;
      let calorieProteineRepas =0;
      let calorieSucreRepas = 0;
      let selRepas = 0 ;

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
      somme = 0
      somme = nutriJournee.glucides + nutriJournee.lipides + nutriJournee.proteines + nutriJournee.sucres;

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

      if(compteurfunction==4){
         afficherCaloriesTotales();
         calculFinalNutriment();
         afficherNutrimentScore();
         alerteCalorie();
         initVar();
      }
   }
   
   function afficherCaloriesTotales(){
      let calorieTotScore = 0;
      for(let i=0;i<4;i++){
         type=repas1Jour[i];
         calorieTotScore += parseFloat(divCaloriesRepas[type].textContent);
      }
      document.getElementById('caloriesTotScore').textContent = calorieTotScore;
   }
   
   function afficherNutrimentScore(){
      document.getElementById('gluJournee').style.width=(ratiosNutri.glucides).toFixed(0)+'%';
      document.getElementById('gluJournee').textContent=ratiosNutri.glucides.toFixed(2)+'%';

      document.getElementById('protJournee').style.width=(ratiosNutri.proteines).toFixed(0)+'%';
      document.getElementById('protJournee').textContent=ratiosNutri.proteines.toFixed(2)+'%';

      document.getElementById('lipJournee').style.width=(ratiosNutri.lipides).toFixed(0)+'%';
      document.getElementById('lipJournee').textContent=ratiosNutri.lipides.toFixed(2)+'%';

      document.getElementById('sucreJournee').style.width=(ratiosNutri.sucres).toFixed(0)+'%';
      document.getElementById('sucreJournee').textContent=ratiosNutri.sucres.toFixed(2)+'%';

      document.getElementById('selJournee').textContent=nutriJournee.sel.toFixed(2)+'g';
   }

   function initProgress(){
      document.getElementById('gluJournee').style.width='0%';
      document.getElementById('protJournee').style.width='0%';
      document.getElementById('lipJournee').style.width='0%';
      document.getElementById('sucreJournee').style.width='0%';
      document.getElementById('selJournee').textContent=""
   }

   function initVar(){
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
   }


   function calculObjectif(utilisateur) {   
      //Calcul métabolisme
      let coefPoids, coefTaille, coefAge, coefSport, bonus, MB;
   
      if(utilisateur[0].sexe == 'H') {
         coefPoids = 13.7516;
         coefTaille = 500.33;
         coefAge = 6.7550;
         bonus = 66.479;
      } else if (utilisateur[0].sexe == 'F') {
         coefPoids = 9.740;
         coefTaille = 184.96;
         coefAge = 4.6756;
         bonus = 655.0955;
      }
   
      switch (parseInt(utilisateur[0].sport)){
         case 1:
            coefSport = 1.2;
            break;
         case 2:
            coefSport = 1.375;
            break;
         case 3:
            coefSport = 1.55;
            break;
         case 4:
            coefSport = 1.725;
            break;
         case 5:
            coefSport = 1.9;
            break;
      }
   
      MB = (coefPoids*utilisateur[0].poids + coefTaille*(utilisateur[0].taille/100) - (coefAge*utilisateur[0].age) + bonus)*coefSport;
      
      MB = MB.toFixed(0);
      document.getElementById('caloriesObj').textContent = MB;
   }

   function alerteCalorie(){
      let MB =  parseInt(document.getElementById('caloriesObj').textContent);
      let calTot = parseInt(document.getElementById('caloriesTotScore').textContent);

      let dif = MB-calTot;

      let table = document.getElementById('tableCalorie');
      let badgeCal = document.getElementById('caloriesTotScore');

      let previousTableStyle=table.classList.value;
      let previousBadgeCalStyle=badgeCal.classList.value;

      previousTableStyle = previousTableStyle.replace("table ", "").trim();
      previousBadgeCalStyle = previousBadgeCalStyle.replace("badge ", "").trim();
      
      if(nbClickConsuler>1){
         table.classList.remove(previousTableStyle);
         badgeCal.classList.remove(previousBadgeCalStyle);
      }      
      
      if(dif<-200) { //danger
         table.classList.add("table-danger");
         badgeCal.classList.add("badge-danger");
      } else if(dif>=-200 && dif<0){ // depasse un peu
         table.classList.add("table-warning");
         badgeCal.classList.add("badge-warning");
      } else { // <0 dans sucess
         table.classList.add("table-success");
         badgeCal.classList.add("badge-success");
      }

      //Affichage du sel
      let selJournee = parseFloat(document.getElementById('selJournee').textContent);
      let selObj = parseFloat(document.getElementById('selObj').textContent);

      let previousSeJournee=document.getElementById('selJournee').classList.value;
      previousSeJournee = previousSeJournee.replace("m-0 badge ", "").trim();

      if(nbClickConsuler>1){
         document.getElementById('selJournee').classList.remove(previousSeJournee);
      }

      let diffSel =selObj-selJournee;
      diffSel = diffSel.toFixed(2);

      if(diffSel<-0.30){//danger
         document.getElementById("selJournee").classList.add("badge-danger");
      } else if(diffSel>=-0.30 && diffSel<0){//warning
         document.getElementById("selJournee").classList.add("badge-warning");
      } else { //success
         document.getElementById("selJournee").classList.add("badge-success");
      }
   }
   
   function afficherNutriObjectif(){
      document.getElementById('gluObj').style.width = '40%';
      document.getElementById('gluObj').textContent = '40%';

      document.getElementById('protObj').style.width = '30%';
      document.getElementById('protObj').textContent = '30%';

      document.getElementById('lipObj').style.width = '20%';
      document.getElementById('lipObj').textContent = '20%';

      document.getElementById('sucreObj').style.width = '10%';
      document.getElementById('sucreObj').textContent = '10%';

      document.getElementById('selObj').textContent="2.3g"
   }
})
