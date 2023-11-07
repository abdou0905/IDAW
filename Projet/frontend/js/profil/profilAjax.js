/*****************************************************VARIABLES*************************************************/
let utilisateur;

//le formulaire
let formModifier = document.getElementById('formModifier');

//les boutons
let btnModifier = document.getElementById('btnModifier');
let btnSauvegarder = document.getElementById('btnSauvegarder');

//les activités
let activites = [
   "1 - Sédentaire",
   "2 - Très peu actif",
   "3 - Peu actif",
   "4 - Actif",
   "5 - Très Actif"
];

//Les champs texte
let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let email = document.getElementById("email");
let genre = document.getElementById("genre");
let age = document.getElementById("age");
let poids = document.getElementById("poids");
let taille = document.getElementById("taille");
let activite = document.getElementById("activite");

//Les champs du formulaire
let id = document.getElementById('id_utilisateur');
let nomInput = document.getElementById('inputNom');
let prenomInput = document.getElementById('inputPrenom');
let emailInput = document.getElementById('inputEmail');
let genreSelect = document.getElementById('selectGenre');
let ageInput = document.getElementById('inputAge');
let poidsInput = document.getElementById('inputPoids');
let tailleInput = document.getElementById('inputTaille');
let activiteSelect = document.getElementById('selectActivite');

//Cacher le formulaire
nomInput.style.display="none";
prenomInput.style.display="none";
emailInput.style.display="none";
genreSelect.style.display="none";
ageInput.style.display="none";
poidsInput.style.display="none";
tailleInput.style.display="none";
activiteSelect.style.display="none";


/*****************************************************REQUETES AJAX*************************************************/

$(document).ready(function(){
   console.log("profil ajax is ready");
   
   // Recuperation des utilisateurs
   $.ajax({
      url:'http://localhost/IDAW/Projet/backend/utilisateurs.php',
      type: 'GET',
      success: function(response) {         
         utilisateur = JSON.parse(response);
         afficherUtilisateur(utilisateur);
      },
     error: function(error) {
         console.error(error);
     }
   },) 

   //Demande de modification du formulaire
   $('#btnModifier').click(function(){
      afficherFormulaire(utilisateur);
   })

   //Envoie du formulaire de modification
   $('#formModifier').submit(function(event){
      //bloquer le formulaire
      event.preventDefault();
      console.log('je souhaite sauvegarder');

      //preparation des données
      let id_utilisateur = id.textContent;
      let nom = nomInput.value;
      let prenom = prenomInput.value;
      let email = emailInput.value;
      let age = ageInput.value;
      let poids = poidsInput.value;
      let taille = tailleInput.value;
      let sexe = genreSelect.value;
      let activite = activiteSelect.value;
      console.log(id_utilisateur);


      // Modification des données de l'utilisateur
      $.ajax({
         url:'http://localhost/IDAW/Projet/backend/utilisateurs.php',
         type: 'PUT',
         data: {id_utilisateur:id_utilisateur, nom:nom, prenom:prenom,email:email,age:age,poids:poids,taille:taille,sexe:sexe,activite:activite},
         success: function() {         
            window.location.href = 'profil.php';
         },
         error: function(error) {
            console.error(error);
         }
      },)
   })
})

/*****************************************************FONCTIONS*************************************************/
function afficherUtilisateur(utilisateur) {

   //Affichage des informations de l'utilisateur
   id.textContent=utilisateur[0]['id_utilisateur'];
   nom.textContent = utilisateur[0]['nom'];
   prenom.textContent = utilisateur[0]['prenom'];
   email.textContent = utilisateur[0]['email'];
   genre.textContent = utilisateur[0]['sexe'];
   age.textContent = utilisateur[0]['age'] + ' ans';
   poids.textContent = utilisateur[0]['poids'] + ' kg';
   taille.textContent = utilisateur[0]['taille'] + ' cm';
   activite.textContent = activites[utilisateur[0]['sport']-1];
}

function afficherFormulaire(utilisateur) {
   //Cacher les champs textes
   btnModifier.style.display="none";
   btnSauvegarder.style.display="block";
   nom.style.display="none";
   prenom.style.display="none";
   email.style.display="none";
   genre.style.display="none";
   age.style.display="none";
   poids.style.display="none";
   taille.style.display="none";
   activite.style.display="none";

   //Afficher formulaire et les informations actuelles
   nomInput.style.display="block";
   nomInput.value=utilisateur[0]['nom'];

   prenomInput.style.display="block";
   prenomInput.value=utilisateur[0]['prenom'];

   emailInput.style.display="block";
   emailInput.value=utilisateur[0]['email'];

   genreSelect.style.display="block";
   genreSelect.value=utilisateur[0]['sexe'];
   // document.getElementById(utilisateur[0]['sexe']).selected=true;

   ageInput.style.display="block";
   ageInput.value=utilisateur[0]['age'];

   poidsInput.style.display="block";
   poidsInput.value=utilisateur[0]['poids'];

   tailleInput.style.display="block";
   tailleInput.value=utilisateur[0]['taille'];

   activiteSelect.style.display="block";
   activiteSelect.value=utilisateur[0]['sport'];
}