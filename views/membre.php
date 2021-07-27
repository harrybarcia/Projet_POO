
<?php

require_once('../src/controllers/membre.controller.php');
// require_once('../src/models/membre.model.php');

echo '<pre>';
print_r($_POST);
echo '</pre>';



    $membre = new membreController($_POST['pseudo'],$_POST['pass'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['civilite'],$_POST['statut']);
/*     $membre->inscription(); */

    echo '<pre>';
    print_r($membre);
    echo '</pre>';





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

  <label for="civilite">civilité</label>
    <select id="monselect" >Civilité
      <option value="Homme">Homme</option>
      <option value="Femme">Femme</option>
    </select>
  <input type="option" id="civilite" name="civilite">

  <label for="statut">statut</label>
  <input type="option" id="statut" name="statut">



  <br>
  <br>
  <br>
  <br>
  <br>

  <button>Enregistrer</button>


  <?php

  // echo '<pre>';
  // print_r($membre);
  // print_r(get_declared_classes());
  // echo '</pre>';

?>



  </form>











  
</body>
</html>