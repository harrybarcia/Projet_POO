<?php
session_start();
require_once('../src/controllers/commande.controller.php');
require_once('../src/models/commande.model.php');
require_once('../src/models/agence.model.php');
require_once('../src/controllers/agence.controller.php');
require_once('../src/models/vehicule.model.php');
require_once('../src/models/membre.model.php');
require_once('../src/controllers/vehicule.controller.php');


  //me donne un tableau de tous les véhicules dans l'agence récupérée dans le get id agence
$result2 = new VehiculeModel;
// var_dump($result);
// print_r("test get id agence <br>");
// print_r($_GET['id_agence']);
// echo "<br>";
print_r("test post <br>");
print_r($_POST);
// echo "<br>";
$results2 = $result2->read_agence($_GET["id_agence"]);
// echo "<pre>";
print_r("results2");
print_r($results2);
// echo "</pre>";
// print_r("pj <br>");
echo "<br>";







?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choix des véhicules</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
  <div>
    <table>
      <thead>
      <tr>
        <th>Titre Véhicule</th>
        <th>Modèle</th>
        <th>Prix Journalier</th>
        <th>Photo</th>
      </tr> 
      </thead>
      <?php foreach ($results2 as $values): ?>
      <tr>
        <td><?=$values['titre_vehicule'];?></td>
        <td><?=$values['modele'];?></td>
        <td><?=$values['prix_journalier'];?></td>
        <td><img src="<?= $values['photo_vehicule']?>" style="width:100px" alt=""></td>
      </tr>  
      <?php endforeach; ?>
      
    </table>

  </div>


  <h1> Choisir son véhicule </h1>
  <!-- ici l'id_agence sera égal à la valeur postée. A l'issue du post, ma commande 
  sera enregistrée et j'aterrirai sur l'url inscrite dans value"  -->
  <!-- le post d'un get le transforme en post comme toutes autre valeur -->
  <!-- on a mis "commande.php?id_agence < ?= $_GET['id_agence']; ?>" pour actualiser la page et lancer l'inscription. -->
  <form action="recapcommande.php?id_agence=<?= $_GET['id_agence']; ?>" method="post">
    <select name="id_vehicule" >
      <option>--Selection vehicule--</option>
      <?php foreach ($results2 as $values) : ?>
        <option value="<?= $values['id_vehicule']; ?>"><?= $values["titre_vehicule"]; ?></option>
      <?php endforeach; ?>
    </select>


    <label for="date_d">date_d</label>
    <input type="date" id="date_d" name="date_d">

    <label for="date_f">date_f</label>
    <input type="date" id="date_f" name="date_f">

    <!-- <label for="prix_total">prix_total</label>
    <input type="text" id="prix_total" name="prix_total"> -->

    </select>

    <button>Enregistrer</button>

    </form>
  <h4><a href="logout.php">Logout</a></h4>;






</body>

</html>