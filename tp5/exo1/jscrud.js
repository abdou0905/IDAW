let nbUsers=3;
//recuperation des boutons modify
let titleAction=document.getElementById('titleAction');
let modifyBtns = document.querySelectorAll('[id^="modify"]');

//recuperation des boutons delete
let deleteBtns = document.querySelectorAll('[id^="delete"]');

//recuperation du bouton add
let addBtn = document.getElementById('addButton');

//recuperation des champs du formulaire d'ajout
let nomInput = document.getElementById('nomInput');
let prenomInput = document.getElementById('prenomInput');
let emailInput = document.getElementById('emailInput');

let body=document.getElementById('data-users');


addBtn.addEventListener("click", function(){
   if(addBtn.value=="add"){
      addUser();
   }
});


modifyBtns.forEach(function(modifyBtn){
   modifyBtn.addEventListener('click', function(){
      idUser = modifyBtn.id.match(/\d+/);
      //BUG ICI = modifie la mauvaise ligne 
      //modifier le titre de add en modify
      titleAction.textContent="Modify User";

      //modifier le bouton add en modify
      addBtn.textContent="MODIFY";
      //modifier la value du bouton 
      addBtn.value='modify';
      //recup toutes les infos du user
      let userNom=document.getElementById('nom'+idUser);
      let userPrenom=document.getElementById('prenom'+idUser);
      let userEmail=document.getElementById('email'+idUser);

      //recup des inputs
      let nomInput = document.getElementById('nomInput');
      let prenomInput = document.getElementById('prenomInput');
      let emailInput = document.getElementById('emailInput');
      
      //mettre les infos du user dans l'input
      nomInput.value=userNom.textContent;
      prenomInput.value=userPrenom.textContent;
      emailInput.value=userEmail.textContent;

      addBtn.addEventListener('click', function(){
         if(addBtn.value=="modify"){
            modifyUser(nomInput,prenomInput,emailInput,userNom,userPrenom,userEmail);
         }
      })
   });
});  

deleteBtns.forEach(function(deleteBtn){
   deleteBtn.addEventListener("click", function(){
      //supprimer lelement
      idUser=deleteBtn.id.match(/\d+/);
      let tr=document.getElementById('row'+idUser);
      tr.remove();
      cleanInput();
   })
})


function cleanInput(){
   nomInput.value="";
   prenomInput.value="";
   emailInput.value="";
}

function addUser(){
   if(nomInput.value != "" && prenomInput.value != "" && emailInput.value != ""){
      //ajout d'un user
      nbUsers++;

      let tr=document.createElement('tr');
      tr.id='row'+nbUsers;

      let tdNom=document.createElement('td');
      tdNom.textContent=nomInput.value;
      tdNom.id="nom"+nbUsers;
      let tdPrenom=document.createElement('td');
      tdPrenom.textContent=prenomInput.value;
      tdPrenom.id="prenom"+nbUsers;
      let tdEmail=document.createElement('td');
      tdEmail.textContent=emailInput.value;
      tdEmail.id="email"+nbUsers;

      let tdBtn=document.createElement('td');

      let modifyBtn=document.createElement('button');
      modifyBtn.id='modify'+nbUsers;
      modifyBtn.className='btn btn-primary';
      modifyBtn.textContent='MODIFY';

      let deleteBtn=document.createElement('button');
      deleteBtn.id='delete'+nbUsers;
      deleteBtn.className='btn btn-primary';
      deleteBtn.textContent='DELETE';
      deleteBtn.style.marginLeft='4px';

      tdBtn.appendChild(modifyBtn);
      tdBtn.appendChild(deleteBtn);


      tr.appendChild(tdNom);
      tr.appendChild(tdPrenom);
      tr.appendChild(tdEmail);
      tr.appendChild(tdBtn);

      body.appendChild(tr);
      //mise à jour des boutons
      modifyBtns = document.querySelectorAll('[id^="modify"]');
      deleteBtns = document.querySelectorAll('[id^="delete"]');
      modifyBtnClick();
      deleteBtnClick();
      addBtnClick();

      cleanInput();
   };
}

function modifyUser(nomInput,prenomInput,emailInput,userNom,userPrenom,userEmail){  
   //modification du btn et titre
   titleAction.textContent='Add User';
   addBtn.textContent='ADD';
   addBtn.value="add";

   //mettre les values des inputs dans le td des values 
   userNom.textContent=nomInput.value;
   userPrenom.textContent=prenomInput.value;
   userEmail.textContent=emailInput.value;
   
   cleanInput();
}