
<?php

require_once('../src/controllers/membre.controller.php');
require_once('../src/models/membre.model.php');

echo '<pre>';
print_r($_POST);
echo '</pre>';

// commentaire 

if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty(['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){

    $membre = new MembreController($_POST['pseudo'],$_POST['pass'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['civilite'],$_POST['statut']);

    // 
    $membre->inscription();

    echo '<pre>';
    print_r($membre);
    echo '</pre>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Membres</title>
</head>
<body>

  <form action="membre.php" method="post" enctype="multipart/form-data">

  <h1>Gestion des Membres</h1>

  <label for="pseudo">Pseudo</label>
  <input type="text" id="pseudo" name="pseudo">

  <label for="pass">Pass</label>
  <input type="text" id="Pass" name="pass">

  <label for="nom">Nom</label>
  <input type="text" id="Nom" name="nom">

  <label for="prenom">Prenom</label>
  <input type="text" id="prenom" name="prenom">

  <label for="email">Email</label>
  <input type="email" id="email" name="email">


<select name="civilite" id="">
    <option value="">-- Civilité --</option>
		<option value="homme">Homme</option>
		<option value="femme">Femme</option>
	</select>

  
	<select name="statut" id="">
    <option value="">-- Statut --</option>
		<option value="admin">Admin</option>
		<option value="membre">Membre</option>
	</select>
  
  <button>Enregistrer</button>
	</form>




  <br>
  <br>
  <br>
  <br>
  <br>



  
</body>
</html>