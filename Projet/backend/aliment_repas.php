<?php 
   //Initialisation de la base de données
   require_once('init_pdo.php');

   //On recupere la methode de la requete
   $methode=$_SERVER['REQUEST_METHOD'];

   /*****************************************************FONCTIONS*************************************************/

   function ajouterAlimentRepas($pdo, $id_repas, $id_aliment, $quantite) {

      //Verification de l'existence du lien repas-aliment
      $sql_redondance = $pdo->prepare('SELECT COUNT(*) FROM repas_aliment WHERE id_repas = ? AND id_aliment = ?');
      $sql_redondance->execute([$id_repas, $id_aliment]);
      $exist = $sql_redondance->fetchColumn();
      
      //Requete d'ajout
      $add_request=$pdo->prepare('INSERT INTO repas_aliment (id_repas, id_aliment, quantite) VALUES (?,?,?)');
      
      if($exist==0) { //Cet aliment n'est pas dans le repas
         //Verification existance du repas
         $sql_exist_repas = $pdo->prepare('SELECT COUNT(*) FROM repas WHERE id_repas = ?');
         $sql_exist_repas->execute([$id_repas]);
         $existRepas = $sql_exist_repas->fetchColumn();

         //Verification existance de l'aliment
         $sql_exist_aliment = $pdo->prepare('SELECT COUNT(*) FROM aliments WHERE id_aliment = ?');
         $sql_exist_aliment->execute([$id_aliment]);
         $existAliment = $sql_exist_aliment->fetchColumn();

         if($existRepas == 0 || $existAliment == 0) { //Le repas ou l'aiment n'existe pas dutout
            http_response_code(500);
            echo(json_encode(['Le repas ou laliment nexiste pas']));
            return json_encode(['Le repas ou laliment nexiste pas']);
         } else { //Le repas et l'aliment existe bien
            $sucess=$add_request->execute([$id_repas, $id_aliment,$quantite]);
            if($sucess === false ) {
               http_response_code(500);
               echo(json_encode(['Erreur SQL']));
               return json_encode(['Erreur SQL']);
            } else {
               http_response_code(201);
               echo(json_encode(['Aliment ajoutee au Repas avec succes']));
               return json_encode(['Aliment ajoutee au Repas avec succes']);
            }
         }
      } else { //Cet aliment est deja dans le repas
         echo(json_encode(['Aliment deja existant dans le Repas']));
         return json_encode(['Aliment deja existant dans le Repas']);
      }
   }

   function supprimerAlimentRepas($pdo, $id_repas, $id_aliment) {
      //suppression de l'entite repas_aliment si existe
      $sql_existance = $pdo->prepare('SELECT COUNT(*) FROM repas_aliment WHERE id_repas = ? AND id_aliment = ?');
      $sql_existance->execute([$id_repas, $id_aliment]);
      $exist = $sql_existance->fetchColumn();

      //requete de suppression
      $deleteAlimentRepas=$pdo->prepare('DELETE FROM repas_aliment WHERE id_repas = ? AND id_aliment = ?');

      if($exist == 1) {
         $sucess = $deleteAlimentRepas->execute([$id_repas, $id_aliment]);
         if($sucess === false) {
            http_response_code(500);
            echo (json_encode(['Erreur SQL']));
            return json_encode(['Erreur SQL']);
         } else {
            http_response_code(200);
            echo(json_encode(['Aliment supprime du repas avec succes']));
            return json_encode(['Aliment supprime du repas avec succes']);
         }
      } else {
         echo(json_encode(['Selection Repas-Aliment invalide']));
         return json_encode(['Selection Repas-Aliment invalide']);
      }
   }
   
   function getAlimentsFromRepasByRepasID($pdo, $id_repas) {
      
      $sql_existance = $pdo->prepare('SELECT COUNT(*) FROM repas WHERE id_repas = ?');
      $sql_existance->execute([$id_repas]);
      $exist = $sql_existance->fetchColumn();

      
      if($exist == 0){ //Le repas n'existe pas
         http_response_code(500);
         echo(json_encode(['Le repas nexiste pas']));
         return json_encode(['Le repas nexiste pas']);
      } else {
         $sql = $pdo->prepare('SELECT * FROM repas_aliment WHERE id_repas = ?');
         $sucess = $sql->execute([$id_repas]);      

         if($sucess === false ) { //Erreur
            http_response_code(500);
            return json_encode(['Erreur SQL']);
         } else {
            http_response_code(200);
            $alimentsRepas = $sql->fetchAll(PDO::FETCH_OBJ);
            print_r($alimentsRepas);
            return json_encode($alimentsRepas);
         }
      }
   }
   
   /*****************************************************REQUETES*************************************************/
   if($methode ==="POST") {      
      if(isset($_POST['id_repas']) && isset($_POST['id_aliment']) && isset($_POST['quantite'])) {
         $id_repas = $_POST['id_repas'];
         $id_aliment = $_POST['id_aliment'];
         $quantite = $_POST['quantite'];
         return ajouterAlimentRepas($pdo, $id_repas, $id_aliment, $quantite);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }

   if($methode === "DELETE") {
      //Recuperation des données de la requete
      parse_str(file_get_contents("php://input"), $_DELETE);

      if(isset($_DELETE)){
         $id_repas = $_DELETE['id_repas'];
         $id_aliment = $_DELETE['id_aliment'];
         return supprimerAlimentRepas($pdo, $id_repas, $id_aliment);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }

   if ($methode === "GET") {
      //Recuperation des aliments de 1 repas
      if(isset($_GET['id_repas'])){
         $id_repas = $_GET['id_repas'];
         return getAlimentsFromRepasByRepasID($pdo, $id_repas);
      } else {
         http_response_code(500);
         return json_encode(['Erreur Données']);
      }
   }

