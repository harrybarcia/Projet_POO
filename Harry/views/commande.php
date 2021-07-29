<?php

require_once('../src/controllers/commande.controller.php');
require_once('../src/models/commande.model.php');


if (!empty($_POST['id_commande']) && !empty($_POST['id_membre']) && !empty($_POST['id_vehicule']) && !empty($_POST['id_agence']) && !empty($_POST['date_d']) && !empty($_POST['date_f']) && !empty($_POST['prix_total'])){
   
    echo "test 1";
    
    $commande = new CommandeController($_POST['id_commande'], $_POST['id_membre'], $_POST['id_vehicule'], $_POST['id_agence'], $_POST['date_d'], $_POST['date_f'], $_POST['prix_total']);
    $commande->inscription();

    echo "test 2";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choix des véhicules</title>
</head>

<body>
  <h1>Choix du véhicule</h1>

  <form action="commande.php" method="post">

  <label for="id_commande">id_commande</label>
  <input type="text" id="id_commande" name="id_commande">
  
  <label for="id_membre">id_membre</label>
  <input type="text" id="id_membre" name="id_membre">
  
  <label for="id_vehicule">Vehicule</label>
  <input type="text" id="id_vehicule" name="id_vehicule">
  
  <select name="id_agence">
        <option value="1">Agence 1</option>
        <option value="2">Agence 2</option>

    </select>

  <label for="date_d">date_d</label>
  <input type="date" id="date_d" name="date_d">

  <label for="date_f">date_f</label>
  <input type="date" id="date_f" name="date_f">

  <label for="prix_total">prix_total</label>
  <input type="text" id="prix_total" name="prix_total">

    </select>
    <button>Enregistrer</button>

  </form>
</body>

</html>