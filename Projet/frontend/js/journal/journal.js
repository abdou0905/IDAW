// Gestion de l'affichage des rubriques
let dropdown = document.getElementById('dropdown');
let repasContent = document.getElementById("repas");
let quotidienContent = document.getElementById("quotidien");
let hebdomadaireContent = document.getElementById("hebdomadaire");
let mensuelContent = document.getElementById("mensuel");

dropdown.addEventListener("change", function(){
    let choice = dropdown.value;

    // Masquer tous les contenus d'abord
    repasContent.style.display = 'none';
    quotidienContent.style.display = 'none';
    hebdomadaireContent.style.display = 'none';
    mensuelContent.style.display = 'none';

    // Afficher le contenu correspondant à la sélection
    if (choice === 'option1') {
        repasContent.style.display = 'block';
    } else if (choice === 'option2') {
        quotidienContent.style.display = 'block';
    } else if (choice === 'option3') {
        hebdomadaireContent.style.display = 'block';
    } else if (choice === 'option4') {
        mensuelContent.style.display = 'block';
    }
});
