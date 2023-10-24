// JavaScript pour gérer le dropdown
const dropdown = document.querySelector('.dropdown');
const dropdownMenu = dropdown.querySelector('ul');

dropdown.addEventListener('click', function () {
    dropdownMenu.classList.toggle('open');
});

document.addEventListener('click', function (e) {
    if (!dropdown.contains(e.target)) {
        dropdownMenu.classList.remove('open');
    }
});


//accordion
document.addEventListener("DOMContentLoaded", function () {
   const buttons = document.querySelectorAll(".accordion-button");

   buttons.forEach(function (button) {
       button.addEventListener("click", function () {
           const content = this.nextElementSibling;
           content.style.display = content.style.display === "none" ? "block" : "none";
       });
   });
});
