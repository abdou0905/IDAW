<?php
   require_once('templates/template_header.php');
?>
<body>
   <?php
      require_once('templates/template_menu.php');
      renderMenuToHTML('aliments');
   ?>
   <?php
      require('../backend/aliments.php');
      $legumes = json_decode(getAlimentsByCategorie($pdo,'legume'),true);
      $fruits = json_decode(getAlimentsByCategorie($pdo,'fruit'),true);
      $feculents = json_decode(getAlimentsByCategorie($pdo,'feculent'),true);
      $proteines = json_decode(getAlimentsByCategorie($pdo,'proteine'),true);
      $laitiers = json_decode(getAlimentsByCategorie($pdo,'produit laitier'),true);
      $boissons = json_decode(getAlimentsByCategorie($pdo,'boisson'),true);
      $snackSales = json_decode(getAlimentsByCategorie($pdo,'snack sale'),true);
      $snackSucres = json_decode(getAlimentsByCategorie($pdo,'snack sucre'),true);

      $aliments = [$legumes, $fruits, $feculents, $proteines, $laitiers, $boissons, $snackSucres, $snackSales];

      // print_r($snackSucres);
   ?>
   <main>
      <div class="row text-center pt-0">
         <div class="col-12">
            <div class="row justify-content-center p-2" style="background-color:#00BF63"> 
               <h1 class="text-white">
                  <i class="fas fa-utensils"></i>
                  Aliments
               </h1>
            </div>
         </div>
      </div>
      <!-- <div class="row justify-content-center pt-3">
         <div class="col-8">
            <div class="row justify-content-center text-italic p-3">
               <h3><em>La Rubrique Aliments? C'est par ici !</em></h3>
            </div>   
            <div class="row m-0 text-center" style="font-size: 20px;">
               <p class="fs-14">
                  La Rubrique Aliments présents tous les aliments disponibles sur notre application i Manger Mieux ! <br>
                  Vous retrouverez également tous les apports nutrionnels utilisés <br>
                  par nos experts pour étudier votre profil de consomation alimentaire. <br>
                  Votre aliments preferé ne figure pas dans notre liste? Ajoutez le directement en renseignant ses informations !
               </p>
            </div>
         </div>
      </div> -->
      <div class="row justify-content-center pt-5">
         <div class="col-6">
            <div class="card">
               <div class="card-header text-center" style="background:#343a40">
                  <div class="btn btn-dark p-2 text-center w-100" id="btnAjouter">
                     <h5>Ajouter un Aliment</h5>
                  </div>          
               </div>
               <div class="card-body" id="cardBodyAjout">
                  <form action="post">
                     <div class="row justify-content-center">
                        <div class="col-6">
                           <div class="form-group">
                              <label for="designation">Nom Aliment</label>
                              <input type="text" id="designation" class="form-control" placeholder="Exemple: carotte">
                           </div>
                           <div class="form-group">
                              <label for="calories">Calories</label>
                              <input type="text" id="calories" class="form-control" placeholder="0">
                              <small class="form-text text-muted">kcal pour 100g</small>
                           </div>
                           <div class="form-group">
                              <label for="calories">Protéines</label>
                              <input type="text" id="proteines" class="form-control" placeholder="0">
                              <small class="form-text text-muted">grammes pour 100g</small>
                           </div>
                           <div class="form-group">
                              <label for="calories">Glucides</label>
                              <input type="text" id="glucides" class="form-control" placeholder="0">
                              <small class="form-text text-muted">grammes pour 100g</small>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label for="categorie">Categorie</label>
                              <select id="categorie" class="form-control">
                                 <option>Légume</option>
                                 <option>Fruit</option>
                                 <option>Féculent</option>
                                 <option>Protéine</option>
                                 <option>Produit Laitier</option>
                                 <option>Boisson</option>
                                 <option>Snack Sucré</option>
                                 <option>Snack Salé</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="calories">Lipides</label>
                              <input type="text" id="lipides" class="form-control" placeholder="0">
                              <small class="form-text text-muted">grammes pour 100g</small>
                           </div>
                           <div class="form-group">
                              <label for="calories">Sels</label>
                              <input type="text" id="sels" class="form-control" placeholder="0">
                              <small class="form-text text-muted">grammes pour 100g</small>
                           </div>
                           <div class="form-group">
                              <label for="calories">Sucres</label>
                              <input type="text" id="sucres" class="form-control" placeholder="0">
                              <small class="form-text text-muted">grammes pour 100g</small>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="card-footer" id="footer">
                  <button  id="btnSubmit" class="btn btn-dark">AJOUTER</div>         
               </div>
            </div>
         </div>
      </div>
      <div class="row m-2 mt-5">
         <div class="col ml-3">
            <div class="card" style="width:700px; height:500px">
               <div class="card-header">
                  <h3 style="color:#00BF63">
                     <i class="fas fa-seedling"></i>
                     Légumes
                  </h3>
                  <table class="table m-0">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Nom</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                           <th class="p-0 col-2" scope="col">Protéine</th>
                           <th class="p-0 col-2" scope="col">Guclide</th>
                           <th class="p-0 col-2" scope="col">Lipide</th>
                           <th class="p-0 col-2" scope="col">Sel</th>
                           <th class="p-0 col-2" scope="col">Sucre</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="aliments" id="legume">
                     </tbody>
                  </table>
                  
               </div>
            </div>
         </div>
         <div class="col ml-3">
            <div class="card" style="width:700px; height:500px">
               <div class="card-header">
                  <h3 style="color:#00BF63">
                     <i class="fas fa-apple-alt"></i>
                     Fruits
                  </h3>
                  <table class="table m-0">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Nom</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                           <th class="p-0 col-2" scope="col">Protéine</th>
                           <th class="p-0 col-2" scope="col">Guclide</th>
                           <th class="p-0 col-2" scope="col">Lipide</th>
                           <th class="p-0 col-2" scope="col">Sel</th>
                           <th class="p-0 col-2" scope="col">Sucre</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="aliments" id="fruit">
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="row m-2 mt-5">
         <div class="col ml-3">
            <div class="card" style="width:700px; height:500px">
               <div class="card-header">
                  <h3 style="color:#00BF63">
                     <i class="fas fa-bread-slice"></i>
                     Féculents
                  </h3>
                  <table class="table m-0">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Nom</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                           <th class="p-0 col-2" scope="col">Protéine</th>
                           <th class="p-0 col-2" scope="col">Guclide</th>
                           <th class="p-0 col-2" scope="col">Lipide</th>
                           <th class="p-0 col-2" scope="col">Sel</th>
                           <th class="p-0 col-2" scope="col">Sucre</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="aliments" id="feculent">
                     </tbody>
                  </table>
                  
               </div>
            </div>
         </div>
         <div class="col ml-3">
            <div class="card" style="width:700px; height:500px">
               <div class="card-header">
                  <h3 style="color:#00BF63">
                     <i class="fas fa-drumstick-bite"></i>
                     Protéines
                  </h3>
                  <table class="table m-0">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Nom</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                           <th class="p-0 col-2" scope="col">Protéine</th>
                           <th class="p-0 col-2" scope="col">Guclide</th>
                           <th class="p-0 col-2" scope="col">Lipide</th>
                           <th class="p-0 col-2" scope="col">Sel</th>
                           <th class="p-0 col-2" scope="col">Sucre</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="aliments" id="proteine">
                     </tbody>
                  </table>
                  
               </div>
            </div>
         </div>
      </div>
      <div class="row m-2 mt-5">
         <div class="col ml-3">
            <div class="card" style="width:700px; height:500px">
               <div class="card-header">
                  <h3 style="color:#00BF63">
                     <i class="fas fa-bone"></i>
                     Produits laitiers
                  </h3>
                  <table class="table m-0">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Nom</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                           <th class="p-0 col-2" scope="col">Protéine</th>
                           <th class="p-0 col-2" scope="col">Guclide</th>
                           <th class="p-0 col-2" scope="col">Lipide</th>
                           <th class="p-0 col-2" scope="col">Sel</th>
                           <th class="p-0 col-2" scope="col">Sucre</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="aliments" id="laitier">
                     </tbody>
                  </table>
                  
               </div>
            </div>
         </div>
         <div class="col ml-3">
            <div class="card" style="width:700px; height:500px">
               <div class="card-header">
                  <h3 style="color:#00BF63">
                     <i class="fas fa-glass-whiskey"></i>
                     Boissons
                  </h3>
                  <table class="table m-0">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Nom</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                           <th class="p-0 col-2" scope="col">Protéine</th>
                           <th class="p-0 col-2" scope="col">Guclide</th>
                           <th class="p-0 col-2" scope="col">Lipide</th>
                           <th class="p-0 col-2" scope="col">Sel</th>
                           <th class="p-0 col-2" scope="col">Sucre</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="aliments" id="boisson">
                     </tbody>
                  </table>
                  
               </div>
            </div>
         </div>
      </div>
      <div class="row m-2 mt-5">
         <div class="col ml-3">
            <div class="card" style="width:700px; height:500px">
               <div class="card-header">
                  <h3 style="color:#00BF63">
                     <i class="fas fa-ice-cream"></i>
                     Snacks Sucrés
                  </h3>
                  <table class="table m-0">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Nom</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                           <th class="p-0 col-2" scope="col">Protéine</th>
                           <th class="p-0 col-2" scope="col">Guclide</th>
                           <th class="p-0 col-2" scope="col">Lipide</th>
                           <th class="p-0 col-2" scope="col">Sel</th>
                           <th class="p-0 col-2" scope="col">Sucre</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="aliments" id="sucre">
                     </tbody>
                  </table>
                  
               </div>
            </div>
         </div>
         <div class="col ml-3 mb-5">
            <div class="card" style="width:700px; height:500px">
               <div class="card-header">
                  <h3 style="color:#00BF63">
                     <i class="fas fa-pizza-slice"></i>
                     Snacks Salés
                  </h3>
                  <table class="table m-0">
                     <thead>
                        <tr>
                           <th class="p-0 col-3" scope="col">Nom</th>
                           <th class="p-0 col-2" scope="col">Calories</th>
                           <th class="p-0 col-2" scope="col">Protéine</th>
                           <th class="p-0 col-2" scope="col">Guclide</th>
                           <th class="p-0 col-2" scope="col">Lipide</th>
                           <th class="p-0 col-2" scope="col">Sel</th>
                           <th class="p-0 col-2" scope="col">Sucre</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="card-body pt-2 p-4" style="overflow-y: auto">
                  <table class="table">
                     <tbody class="aliments" id="sale">
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </main>
   <?php
      require_once('templates/template_footer.php')
   ?>
   <script>
      let aliments = <?php echo json_encode($aliments);?> ;
   </script>
   <script src="js/aliments/affichageAliments.js"></script>
   <script src="js/aliments/ajouterAliments.js"></script>
   <script src="js/aliments/alimentsAjax.js"></script>
</body>