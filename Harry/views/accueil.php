<?php 

require_once('../src/controllers/agence.controller.php');
require_once('../src/models/agence.model.php');

session_start();
// print_r("page accueil.php");
// echo "<br>";
// print_r("dollar_SESSION[sess_user_id]: ");
// print_r($_SESSION['sess_user_id']);
// echo "<br>";
// print_r("dollar_SESSION: ");
// print_r($_SESSION);

// si mon utilisateur existe alors msg de bienvenue
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1>Tu as bien été identifié '.$_SESSION['sess_name'].'</h1>';
} else { 
  header('location:accueil.php');
}

$result= new AgenceModel;
$tableau= $result->read();
  // echo '<pre>';
  // print_r($tableau);
  // echo '</pre>';
?>
<?php
require_once('../src/controllers/commande.controller.php');
require_once('../src/models/commande.model.php');
require_once('../src/models/agence.model.php');
require_once('../src/controllers/agence.controller.php');
require_once('../src/models/vehicule.model.php');
require_once('../src/controllers/vehicule.controller.php');


?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/styles.css">

  <title>Choix de l'agence</title>
</head>
<body>

<h1>Gestion des Agences</h1>

<div>
  <table>
    <thead>
      <tr>
        <th>Agence</th>
        <th>Titre</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>CP</th>
        <th>Description</th>
        <th>Photo</th>
        <!-- <th>Action</th> -->
      </tr>
    </thead>

    <?php foreach($tableau as $values): ?>

      <tr>
        <td><?= $values['id_agence']?></td>
        <td><?= $values['titre_agence']?></td>
        <td><?= $values['adresse']?></td>
        <td><?= $values['ville']?></td>
        <td><?= $values['cp']?></td>
        <td><?= $values['description']?></td>
        <td><img src="<?= $values['photo']?>" style="width:100px" alt=""></td>
      </tr>

    <?php endforeach; ?>
  </table>
</div>
  <h1> Choisis ton agence </h1>
  <!-- la méthode get va me mener à la nouvelle url, ma value id_agence sera alors déjà fixée. -->
  <form action="commande.php" method="get">


    <select name="id_agence">
      <option>--Selection Agence--</option>
      <?php foreach ($tableau as $values) : ?>
        <!-- quand je choisis titre agence, l'id_agence change -->
        <!-- en get, la valeur passée dans value se retrouve automatiquement dans l'url -->
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