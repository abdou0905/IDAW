//le formulaire
let formModifier = document.getElementById('formModifier');
//les boutons
let btnModifier = document.getElementById('btnModifier');
let btnSauvegarder = document.getElementById('btnSauvegarder');

//Les champs texte
let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let email = document.getElementById("email");
let genre = document.getElementById("genre");
let age = document.getElementById("age");
let poids = document.getElementById("poids");
let taille = document.getElementById("taille");

//Les champs du formulaire
let nomInput = document.getElementById('inputNom');
let prenomInput = document.getElementById('inputPrenom');
let emailInput = document.getElementById('inputEmail');
let genreInput = document.getElementById('inputGenre');
let ageInput = document.getElementById('inputAge');
let poidsInput = document.getElementById('inputPoids');
let tailleInput = document.getElementById('inputTaille');


//Affichage des informations de l'utilisateur
nom.textContent = utilisateur[0]['nom'];
prenom.textContent = utilisateur[0]['prenom'];
email.textContent = utilisateur[0]['email'];
genre.textContent = utilisateur[0]['sexe'];
age.textContent = utilisateur[0]['age'] + ' ans';
poids.textContent = utilisateur[0]['poids'] + ' kg';
taille.textContent = utilisateur[0]['taille'] + ' cm';

//Cacher le formulaire
nomInput.style.display="none";
prenomInput.style.display="none";
emailInput.style.display="none";
genreInput.style.display="none";
ageInput.style.display="none";
poidsInput.style.display="none";
tailleInput.style.display="none";


btnModifier.addEventListener("click", function(){
   //cacher les champs textes
   btnModifier.style.display="none";
   btnSauvegarder.style.display="block";
   nom.style.display="none";
   prenom.style.display="none";
   email.style.display="none";
   genre.style.display="none";
   age.style.display="none";
   poids.style.display="none";
   taille.style.display="none";

   //afficher formulaire
   nomInput.style.display="block";
   nomInput.value=utilisateur[0]['nom'];

   prenomInput.style.display="block";
   prenomInput.value=utilisateur[0]['prenom'];

   emailInput.style.display="block";
   emailInput.value=utilisateur[0]['email'];

   genreInput.style.display="block";
   genreInput.value=utilisateur[0]['sexe'];

   ageInput.style.display="block";
   ageInput.value=utilisateur[0]['age'];

   poidsInput.style.display="block";
   poidsInput.value=utilisateur[0]['poids'];

   tailleInput.style.display="block";
   tailleInput.value=utilisateur[0]['taille'];


})


btnSauvegarder.addEventListener("click", function(){
   
})