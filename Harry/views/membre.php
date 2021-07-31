
<?php
// ############# Code PHP
require_once('../src/controllers/membre.controller.php');
require_once('../src/models/membre.model.php');

// commentaire 
if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty(['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){
    $membre = new MembreController($_POST['pseudo'],$_POST['pass'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['civilite'],$_POST['statut']);
    // 
    $membre->inscription();

 
}


?>

<!-- Code HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Gestion des Membres</title>
</head>
<body>

  <table>
  
    <tr>
    <th>Pseudo</th>
    <th>Pass</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Email</th>
    <th>Civilite</th>
    <th>Statut</th>

    </tr>


    <?php
    // Code PHP 
    // Get users from databases
    $results= new MembreModel;
    $tableau=$results->read();
    foreach ($tableau as $values):
    ?>
  <tr>
  <td><?=$values['pseudo']?></td>
  <td><?=$values['pass']?></td>
  <td><?=$values['nom']?></td>
  <td><?=$values['prenom']?></td>
  <td><?=$values['email']?></td>
  <td><?=$values['civilite']?></td>
  <td><?=$values['statut']?></td>
  </tr>
  
    
  <?php endforeach; ?>
    


</table>



  <form action="membre.php" method="post" enctype="multipart/form-data">

  <h1>Gestion des Membres</h1>

  <label for="pseudo">Pseudo</label>
  <input type="text" id="pseudo" name="pseudo">

  <label for="pass">Pass</label>
  <input type="text" id="pass" name="pass">

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


  
</body>
</html>