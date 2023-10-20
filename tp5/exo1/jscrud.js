//il y a 3 utilisateurs au départ
let nbUsers=0;

//recuperation du bouton add
let addBtn = document.getElementById('addButton');
let updateBtn = document.getElementById('updateButton');

//recuperation des champs du formulaire d'ajout
let nomInput = document.getElementById('nomInput');
let prenomInput = document.getElementById('prenomInput');
let emailInput = document.getElementById('emailInput');

let body=document.getElementById('data-users');

addUser("durand", "bill12","ozef@zerf.com");
addUser("bob", "bill13","ozef@zerf.com");
addUser("sam", "bill14","ozef@zerf.com");

//bouton ajout
addBtn.addEventListener("click", function(){
   addUser(nomInput.value,prenomInput.value,emailInput.value);
   cleanInput();
});

//recuperation des boutons modify
let titleAction=document.getElementById('titleAction');

function addUser(nom, prenom, email){
   if(nom != "" && prenom != "" && email != ""){
      nbUsers++;

      let tr=document.createElement('tr');
      tr.id='row'+nbUsers;

      let tdNom=document.createElement('td');
      tdNom.textContent=nom;
      tdNom.id="nom"+nbUsers;

      let tdPrenom=document.createElement('td');
      tdPrenom.textContent=prenom;
      tdPrenom.id="prenom"+nbUsers;

      let tdEmail=document.createElement('td');
      tdEmail.textContent=email;
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

      modifyBtn.addEventListener('click', function(){
         addBtn.style.display='none';
         updateBtn.style.display='inline';
         let idToUpdate=modifyBtn.id.match(/\d+/);
         updateFormForModify(idToUpdate);
      })

      deleteBtn.addEventListener('click', function(){
         tr.remove();
      })
      
      cleanInput();
   };
};

function updateFormForModify(idToUpdate) {
   titleAction.textContent='Modify User';
   tdNom=document.getElementById('nom'+idToUpdate);
   tdPrenom=document.getElementById('prenom'+idToUpdate);
   tdEmail=document.getElementById('email'+idToUpdate);

   //on preremplie les champs
   nomInput.value=tdNom.textContent;
   prenomInput.value=tdPrenom.textContent;
   emailInput.value=tdEmail.textContent;
   console.log('avant le clic');
      console.log(tdNom, tdPrenom,tdEmail);

   updateBtn.addEventListener("click", function(){
      newNom=nomInput.value;
      newPrenom=prenomInput.value;
      newEmail=emailInput.value;
      
      //mettre les values des inputs dans le td des values 
      console.log('apres le clic');
      console.log(tdNom, tdPrenom,tdEmail);

      tdNom.textContent=newNom;
      tdPrenom.textContent=newPrenom;
      tdEmail.textContent=newEmail;
      
      //On remodifie l'affichage
      titleAction.textContent='Add User';
      addBtn.style.display='inline';
      updateBtn.style.display='none';
      cleanInput();
   })
}

function cleanInput(){
   nomInput.value="";
   prenomInput.value="";
   emailInput.value="";
}

