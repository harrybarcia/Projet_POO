<?php


require_once('commande.php');


$dateOne = new DateTime($_POST['date_d']);
$dateTwo = new DateTime($_POST['date_f']);



$interval = $dateOne->diff($dateTwo);
$prix_total=$interval->days*20;
?>

