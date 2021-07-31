
<?php

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
// me donne un tableau de toutes les agences
$result = new AgenceModel;
// var_dump($result);
$results = $result->read();

?>
  <h1> Choisir son agence </h1>
  <form action="commande.php" method="get">


    <select name="id_agence">
      <option>--Selection Agence--</option>
      <?php foreach ($results as $values) : ?>
        <option value="<?= $values['id_agence']; ?>"><?= $values["titre_agence"]; ?></option>
      <?php endforeach; ?>
    </select>
    <button>Valider votre agence</button>

  </form>




</body>

</html>