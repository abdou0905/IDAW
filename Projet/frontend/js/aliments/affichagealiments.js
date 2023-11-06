// console.log('je suis dans affiche aliments')
// console.log(aliments);

let tbodies = document.querySelectorAll("tbody[class='aliments']");
let compteur=0;

aliments.forEach(categorie => {
   categorie.forEach(aliment =>{
      let tr=document.createElement('tr');
      tr.scope='row';

      let tdDesignation=document.createElement('td');
      tdDesignation.textContent=aliment['designation'];
      tdDesignation.classList.add("p-0", "col-3");

      let tdCalorie=document.createElement('td');
      tdCalorie.textContent=aliment['calories'];
      tdCalorie.classList.add("p-0", "col-2");

      let tdProteine=document.createElement('td');
      tdProteine.textContent=aliment['proteine'];
      tdProteine.classList.add("p-0", "col-2");

      let tdGlucide=document.createElement('td');
      tdGlucide.textContent=aliment['glucide'];
      tdGlucide.classList.add("p-0", "col-2");

      let tdLipide=document.createElement('td');
      tdLipide.textContent=aliment['lipide'];
      tdLipide.classList.add("p-0", "col-2");

      let tdSel=document.createElement('td');
      tdSel.textContent=aliment['sel'];
      tdSel.classList.add("p-0", "col-2");

      let tdSucre=document.createElement('td');
      tdSucre.textContent=aliment['sucre'];
      tdSucre.classList.add("p-0", "col-2");

      
      tr.appendChild(tdDesignation);
      tr.appendChild(tdCalorie);
      tr.appendChild(tdProteine);
      tr.appendChild(tdGlucide);
      tr.appendChild(tdLipide);
      tr.appendChild(tdSel);
      tr.appendChild(tdSucre);
      tbodies[compteur].appendChild(tr);
      
      // console.log(tbodies[compteur]);      
      // console.log(aliment['designation']);
   })
   compteur++;
});

