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
                  <form action="" method="get">
                  <div class="row justify-content-center align-items-center">
                     <p class="mr-2">Mon</p>
                     <div class="form-group mr-2" >
                        <select class="text-center"name="typeRepasAConsulter" style="background-color:#00BF63; color:white">
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
                        <button class="btn" type="submit">Consulter</button>
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
                  <h5>Le repas</h5>
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
                     <tbody class="repas" id="dejeuner"></tbody>
                  </table>
               </div>
               <div class="card-footer">Calories: </div>
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
                     <form action="" method="post" id="formNewAlimentRepas">
                        <div class="card-body" id="cardBodyNewAlimentRepas">
                           <div class="row justify-content-center">
                              <div class="col-5">
                                 <div class="form-group">
                                    <label for="dateAjoutAliment">Date Repas</label>
                                    <input type="date" id="dateAjoutAliment" class="form-control">
                                 </div>
                                 <div class="form-group">
                                    <label for="categorie">Categorie Aliment</label>
                                    <select id="categorie" class="form-control">
                                       <option value="legume">Légume</option>
                                       <option value="fruit">Fruit</option>
                                       <option value="feculent">Féculent</option>
                                       <option value="proteine">Protéine</option>
                                       <option value="produitLaitier">Produit Laitier</option>
                                       <option value="boisson">Boisson</option>
                                       <option value="snackSucre">Snack Sucré</option>
                                       <option value="snackSale">Snack Salé</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-5">
                                 <div class="form-group">
                                    <label for="type">Type de Repas</label>
                                    <select id="type" class="form-control">
                                       <option value="petitDejeuner">Petit Déjeuner</option>
                                       <option value="dejeuner">Déjeuner</option>
                                       <option value="gouter">Gouter</option>
                                       <option value="diner">Diner</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="categorie">Aliment</label>
                                    <select id="categorie" class="form-control">
                                       <option value="legume">aliment1</option>
                                       <option value="fruit">aliment1</option>
                                       <option value="feculent">aliment1</option>
                                       <option value="proteine">aliment1</option>
                                       <option value="produitLaitier">aliment1 Laitier</option>
                                       <option value="boisson">aliment1</option>
                                       <option value="snackSucre">aliment1 Sucré</option>
                                       <option value="snackSale">aliment1 Salé</option>
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
                           <button type ="button" id="btnAjouterAliments" class="btn btn-dark">AJOUTER</button>         
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
                           <h5>Modifier Repas</h5>
                        </div>          
                     </div>
                     <div class="card-body" id="cardBodyModifier">
                        <p>Form modifier repas</p>
                     </div>
                     <div class="card-footer" id="footerModifier">
                        <button type ="button" id="btnSauvegarder" class="btn btn-dark">SAUVEGARDER</button>         
                     </div>               
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
                     <form action="" method="post" id="formNewRepas">
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


