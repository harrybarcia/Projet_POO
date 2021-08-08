<?php

require_once('../src/controllers/agence.controller.php');
require_once('../src/models/agence.model.php');

if (!empty($_POST['titre']) && !empty($_POST['adresse']) && !empty(['description']) && !empty($_POST['ville']) && !empty($_POST['cp']) && !empty($_FILES['photo'])) {
  
  if (isset($_FILES['photo'])) {
    // print_r($_FILES);
    $tmpName = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];

    
    $extensions = ['image/jpg', 'image/png', 'image/jpeg'];
    if(in_array($_FILES['photo']['type'], $extensions)){
      move_uploaded_file($tmpName, './upload/'.$name);
      $Agence = new AgenceController($_POST['titre'],$_POST['adresse'],$_POST['ville'],$_POST['cp'],$_POST['description'],'./upload/' . $name);
      
      $Agence->inscription();
      
    }
    else{
      echo "Mauvaise extension";
    }
  }
  
  
  
  // echo '<pre>';
  // print_r($Agence);
  // echo '</pre>';
}


$result= new AgenceModel;
$tableau= $result->read();



?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/styles.css">
  <title>Gestion des Agences</title>
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


          </td>
        </tr>

      <?php endforeach; ?>
    </table>
  </div>

<form action="agence.php" method="post" enctype="multipart/form-data">


<div id="formulaire">

  
    <div class="champ">
      
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre">
      
    </div>
    <div class="champ">
      
      <label for="adresse">Adresse :</label>
      <input type="text" id="adresse" name="adresse">
      
    </div>
    <div class="champ">
      
      <label for="description">Description :</label>
      <input type="text" id="description" name="description">
  
    </div>
  
  
    <div class="champ">
  
      <label for="ville">Ville :</label>
      <input type="text" id="ville" name="ville">
  
    </div>
    <div class="champ">
  
      <label for="cp">Code Postal :</label>
      <input type="text" id="cp" name="cp">
  
    </div>
    <div>
  
      <label for="photo">Photo :</label>
      <input type="file" id="photo" name="photo">
  
    </div>
  
    <button>Enregistrer</button>


</div>

</form>


  
</body>
</html>