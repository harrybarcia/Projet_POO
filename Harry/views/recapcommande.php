<?php
require_once('../src/controllers/commande.controller.php');
require_once('../src/models/commande.model.php');
require_once('../src/models/agence.model.php');
require_once('../src/controllers/agence.controller.php');
require_once('../src/models/vehicule.model.php');
require_once('../src/models/membre.model.php');
require_once('../src/controllers/vehicule.controller.php');
session_start();

// print_r("Session <br>");
// print_r($_SESSION);
// print_r("<br>");
// print_r("<br>");
// print_r("_POST <br>");
// print_r($_POST);
// print_r("<br>");
// print_r("<br>");
// print_r("get <br>");
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";




// echo ($recaps[0]['prix_journalier']);
if (!empty($_SESSION['sess_user_id']) && !empty($_POST['id_vehicule']) && !empty($_GET['id_agence']) && !empty($_POST['date_d']) && !empty($_POST['date_f']) ) {


print_r("<h1>results 3: </h1><br> ");
print_r($_POST['id_vehicule']);
echo ("<br>");
$result3 = new VehiculeModel;
print_r(" ------------------------<br>");

$results3=$result3->getPJ($_POST['id_vehicule']);
print_r("results3");
echo ("<pre>");
print_r($results3);
echo ("</pre>");

$pj=$results3[0]['prix_journalier'];
print_r(" --------results4-pj---------------<br>");
print_r($pj);

print_r(" ------------------------<br>");

$dateOne = new DateTime($_POST['date_d']);
$dateTwo = new DateTime($_POST['date_f']);
$interval = $dateOne->diff($dateTwo);
$prix_total=$interval->days*$pj;

$commande = new CommandeController($_SESSION['sess_user_id'], $_POST['id_vehicule'], $_GET['id_agence'], $_POST['date_d'], $_POST['date_f'],$pj);
  //envoi dans la BDD
  // print_r("commande <br>");
  // echo "<pre>";
  // print_r($commande);
  // echo "</pre>";


  echo ("Votre commande a bien été enregistrée pour les dates du " . $_POST['date_d'] ." au " . $_POST['date_f'] . "! Cela vous coutera:" . $prix_total . "€ pour ". $interval->days. " jours de location <br>");
  $commande->inscription();

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">

    <title>Document</title>
</head>
<body>
    
    <a href="accueil.php">Revenir à l'accueil</a>


    </p>
</body>
</html>