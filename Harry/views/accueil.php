
<?php

session_start();
// print_r($_SESSION);
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
	echo '<h1>Bienvenu '.$_SESSION['sess_name'].' !</h1>';
  print_r($_SESSION);
} else { 
	header('location:index.php');
}


require_once('../src/controllers/commande.controller.php');
require_once('../src/models/commande.model.php');
require_once('../src/models/agence.model.php');
require_once('../src/controllers/agence.controller.php');
require_once('../src/models/vehicule.model.php');
require_once('../src/controllers/vehicule.controller.php');

if (!empty($_GET["id_agence"])){

$result = new AgenceModel;
// var_dump($result);
$results = $result->read(($_GET["id_agence"]));


}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choix de l'agence</title>
</head>
<body>
<?php
// j'instancie un nouvel objet agence model pour faire appel à la méthode read
$result = new AgenceModel;
// la méthode read me donne le tableau de toutes les agences
$results = $result->read();

?>
  <h1> Choisis ton agence </h1>
  <form action="commande.php" method="get">


    <select name="id_agence">
      <option>--Selection Agence--</option>
      <?php foreach ($results as $values) : ?>
        <option value="<?= $values['id_agence']; ?>"><?= $values["titre_agence"]; ?></option>
      <?php endforeach; ?>
    </select>
    <button>Valider votre agence</button>

  </form>



  <?php
  
  echo'. <h4><a href="logout.php">Se déconnecter</a></h4>';
  
  ?>



</body>

</html>