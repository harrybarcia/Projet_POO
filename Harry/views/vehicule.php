
<?php
require_once('../src/models/agence.model.php');
//require_once('../src/controllers/agence.controller.php');
require_once('../src/controllers/vehicule.controller.php');
require_once('../src/models/vehicule.model.php');

//SPL a rentrer.

if (!empty($_POST['titre']) && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['prix']) && !empty($_POST['description']) && !empty($_FILES['photo'])) {
  if (isset($_FILES['photo'])) {
    //RAJOUT DE $_GET !empty($_GET['titre_agence']) &&


    $tmpName = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];

    $extensions = ['image/jpg', 'image/png', 'image/jpeg'];
    if (in_array($_FILES['photo']['type'], $extensions)) {
      move_uploaded_file($tmpName, './upload/' . $name);

      $vehicule = new VehiculeController($_GET['id_agence'], $_POST['titre'], $_POST['marque'], $_POST['modele'], $_POST['description'], './upload/' . $name, $_POST['prix']);
      $vehicule->inscription();
    } else {
      echo "Mauvaise extension";
    }
  }
}

$result = new AgenceModel;
// var_dump($result);
$results = $result->read();
// echo '<pre>';
// var_dump($results);
// echo '</pre>';

$resultOne = new VehiculeModel;
$resultUn = $resultOne->read();
// echo '<pre>';
// var_dump($resultUn);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/styles.css">
  <title>Gestion des véhicules</title>
</head>

<body>
  <h1>Gestion des véhicules</h1>



  <form method="get" action="vehicule.php">
    <select name="id_agence">
      <option>--Selection Agence--</option>
      <?php foreach ($results as $values) : ?>
        <option value="<?= $values['id_agence']; ?>"><?= $values["titre_agence"]; ?></option>
      <?php endforeach; ?>
    </select>
    <button>Rediriger vers l'agence</button>
  </form>




  <form action="vehicule.php?id_agence=<?= $_GET['id_agence'] ?>" method="post" enctype="multipart/form-data">
    <div class="champ"> <label for="titre">Titre</label>
      <input type="text" id="titre" name="titre" placeholder="Titre de l'annonce">
    </div>
    <div class="champ"><label for="marque">Marque</label>
      <input type="text" id="marque" name="marque" placeholder="Marque">
    </div>
    <div class="champ"> <label for="modele">Modele</label>
      <input type="text" id="modele" name="modele" placeholder="Modele">
    </div>

    <div class="champ">
      <label for="description">Description</label>
      <input type="text" id="description" name="description">
    </div>
    <div class="champ"> <label for="photo">Photo</label>
      <input type="file" id="photo" name="photo">
    </div>

    <div class="champ"> <label for="prix">Prix</label>
      <input type="text" id="prix" name="prix" placeholder="Prix journalier">
    </div>
    <button>Enregistrer</button>
  </form>
  <table>
    <thead>
      <tr>
        <th>Agence</th>
        <th>Titre Véhicule</th>
        <th>Marque</th>
        <th>Modele</th>
        <th>Description</th>
        <th>Photo</th>
        <th>Prix / Jour</th>

      </tr>
    </thead>
    <?php foreach ($resultUn as $values) : ?>

      <tr>
        <td><?= $values['id_agence'] ?></td>
        <td><?= $values['titre_vehicule'] ?></td>
        <td><?= $values['marque'] ?></td>
        <td><?= $values['modele'] ?></td>
        <td><?= $values['description_vehicule'] ?></td>
        <td><img height="100px" src="<?= $values['photo_vehicule']?>"></td>
        <td><?= $values['prix_journalier'] ?></td>
      </tr>

    <?php endforeach; ?>
  </table>
  

</body>

</html>