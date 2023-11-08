<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('repas');
   ?>
   <main>
      <div class="row text-right pt-0 justify-content-center">
         <div class="col-12">
            <div class="row justify-content-center p-2" style="background-color:#00BF63"> 
               <h1 class="col-12 text-white text-center">
                  <form action="" method="GET" id="formConsultationRepas">
                  <div class="row justify-content-center align-items-center">
                     <p class="mr-2">Mon</p>
                     <div class="form-group mr-2">
                        <select class="text-center" id="typeRepasAConsulter" name="typeRepasAConsulter" style="background-color:#00BF63; color:white">
                           <option> </option>
                           <option value="petitDejeuner">Petit Déjeuner</option>
                           <option value="dejeuner">Déjeuner</option>
                           <option value="gouter">Goûter</option>
                           <option value="diner">Diner</option>
                        </select>
                     </div>
                     <h1 class="mr-2">du</h1>
                     <div class="form-group mr-2">
                        <input type="date" id="dateAConsulter" class="form-control" style="background-color:#00BF63; color:white">
                     </div>
                     <div class="form-group mr-2">
                        <button class="btn btn-success" type="submit" style="background-color:#00BF63">CONSULTER</button>
                     </div>
                  </div>
                  </form>
               </h1>
            </div>
         </div>
      </div>
      <div class="row justify-content-center pt-4 mb-4">
         <div class="col-5">
            <div class="card" style="height:350px">
               <div class="card-header pb-0">
                  <h5>Mon Repas</h5>
                  <table class="table m-0 mb-2">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Aliment</th>
                           <th class="p-0 col-2" scope="col">Quantité</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="repas" id="repas_body"></tbody>
                  </table>
               </div>
               <div class="card-footer" id="caloriesTotRepas"></div>
            </div>
         </div>
         <div class="col-5">
            <div class="row">
               <div class="col-5 p-2">
                  <div class="card" style="width:600px">
                     <div class="card-header text-center" style="background:#343a40">
                        <div class="btn btn-dark p-2 text-center w-100" id="btnAjoutAliments">
                           <h5>Ajouter Aliments-Repas</h5>
                        </div>          
                     </div>
                     <form action="" method="POST" id="formNewAlimentRepas">
                        <div class="card-body" id="cardBodyNewAlimentRepas">
                           <div class="row justify-content-center">
                              <div class="col-5">
                                 <!-- <div class="form-group">
                                    <label for="dateAjoutAliment">Date Repas</label>
                                    <input type="date" id="dateAjoutAliment" class="form-control">
                                 </div> -->
                                 <div class="form-group">
                                    <label for="categorie">Categorie Aliment</label>
                                    <select id="categorie" class="form-control">
                                       <option></option>
                                       <option value="0">Légume</option>
                                       <option value="1">Fruit</option>
                                       <option value="2">Féculent</option>
                                       <option value="3">Protéine</option>
                                       <option value="4">Produit Laitier</option>
                                       <option value="5">Boisson</option>
                                       <option value="6">Snack Sucré</option>
                                       <option value="7">Snack Salé</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-5">
                                 <!-- <div class="form-group">
                                    <label for="type">Type de Repas</label>
                                    <select id="type" class="form-control">
                                       <option value="petitDejeuner">Petit Déjeuner</option>
                                       <option value="dejeuner">Déjeuner</option>
                                       <option value="gouter">Gouter</option>
                                       <option value="diner">Diner</option>
                                    </select>
                                 </div> -->
                                 <div class="form-group">
                                    <label for="alimentsAjoutSelect">Aliment</label>
                                    <select id="alimentsAjoutSelect" class="form-control">
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row justify-content-center">
                              <div class="form-group col-10">
                                 <label for="quantite">Quantité</label>
                                 <input type="text" id="quantite" class="form-control">
                                 <small class="form-text text-muted">en grammes</small>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer" id="footerAjouterAliments">
                           <button type ="submit" id="btnAjouterAliments" class="btn btn-dark">AJOUTER</button>         
                        </div>              
                     </form>              
                  </div> 
               </div>                    
            </div>
            <div class="row">
               <div class="col-5 p-2">
                  <div class="card" style="width:600px">
                     <div class="card-header text-center" style="background:#343a40">
                        <div class="btn btn-dark p-2 text-center w-100" id="btnModification">
                           <h5>Supprimer Aliment Repas</h5>
                        </div>          
                     </div>
                     <form action="" method="DELETE" id="formAlimentASupprimer">
                        <div class="card-body" id="cardBodyModifier">
                           <div class="form-group">
                              <label for="alimentASupprimer">Aliment à Supprimer</label>
                              <select class="form-control" name="alimentASupprimer" id="alimentASupprimer">

                              </select>
                           </div>
                        </div>
                        <div class="card-footer" id="footerModifier">
                           <button type ="submit" id="btnSupprimer" class="btn btn-dark">SUPPRIMER</button>         
                        </div>     
                     </form>          
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-5 p-2">
                  <div class="card" style="width:600px">
                     <div class="card-header text-center" style="background:#343a40">
                        <div class="btn btn-dark p-2 text-center w-100" id="btnNouveauRepas">
                           <h5>Nouveau Repas</h5>
                        </div>          
                     </div>
                     <form action="repas.php" method="post" id="formNewRepas">
                        <div class="card-body" id="cardBodyNouveauRepas">
                           <div class="form-group">
                              <label for="date">Date Repas</label>
                              <input type="date" id="date" class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="type">Type de Repas</label>
                              <select id="type" class="form-control">
                                 <option value="petitDejeuner">Petit Déjeuner</option>
                                 <option value="dejeuner">Déjeuner</option>
                                 <option value="gouter">Gouter</option>
                                 <option value="diner">Diner</option>
                              </select>
                              <!-- <small class="form-text text-muted">kcal pour 100g</small> -->
                           </div>
                        </div>
                        <div class="card-footer" id="footerNouveauRepas">
                           <button type="submit" id="btnAjouter" class="btn btn-dark">AJOUTER</button>         
                        </div>               
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- <div class="row justify-content-center pt-4 m-1 pb-5">
         <div class="col-10 p-2">
            <div class="card">
               <div class="card-header text-center" style="background:#343a40">
                  <div class="btn btn-dark p-2 text-center w-100" id="btnModification">
                     <h5>Modifier Repas</h5>
                  </div>          
               </div>
               <div class="card-body" id="cardBodyModifier">
                  <p>Form modifier repas</p>
               </div>
               <div class="card-footer" id="footerModifier">
                  <button type ="submit" id="btnSauvegarder" class="btn btn-dark">SAUVEGARDER</button>         
               </div>               
            </div>
         </div>
      </div> -->
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
</body>
<script src="js/repasAjax.js"></script>


