<?php
session_start();
require_once('../src/controllers/commande.controller.php');
require_once('../src/models/commande.model.php');
require_once('../src/models/agence.model.php');
require_once('../src/controllers/agence.controller.php');
require_once('../src/models/vehicule.model.php');
require_once('../src/models/membre.model.php');
require_once('../src/controllers/vehicule.controller.php');


if (!empty($_SESSION['sess_user_id']) && !empty($_POST['id_vehicule']) && !empty($_GET['id_agence']) && !empty($_POST['date_d']) && !empty($_POST['date_f']) ) {

  $commande = new CommandeController($_SESSION['sess_user_id'], $_POST['id_vehicule'], $_GET['id_agence'], $_POST['date_d'], $_POST['date_f']);
  //envoi dans la BDD


  $dateOne = new DateTime($_POST['date_d']);
  $dateTwo = new DateTime($_POST['date_f']);
  $interval = $dateOne->diff($dateTwo);
  $prix_total=$interval->days*30;

  echo ("Ta caisse est bien commandée! Cela te coutera:" . $prix_total . "€ <br>");
 


  
  $commande->inscription();


}
  //me donne un tableau de tous les véhicules dans l'agence récupérée dans le get id agence
$result2 = new VehiculeModel;
// var_dump($result);
$results2 = $result2->read_agence($_GET["id_agence"]);
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



  <h1> Choisir son véhicule </h1>
  <form action="commande.php?id_agence=<?= $_GET['id_agence']; ?>" method="post">
    <!-- <label for="id_commande">id_commande</label>
    <input type="text" id="id_commande" name="id_commande">
    -->




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






</body>

</html>