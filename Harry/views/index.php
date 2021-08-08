<?php 
session_start(); 
include("../src/config/database.php");
?>
<?php
$db=new Database;
$msg = ""; 
$msgok=$_GET['message'];
echo $msgok;
if(isset($_POST['submitBtnLogin'])) {
	$pseudo = trim($_POST['pseudo']);
	$pass = trim($_POST['pass']);
	if($pseudo != "" && $pass != "") {
		try {
			$query = "select * from `membre` where `pseudo`=:pseudo and `pass`=:pass";
			$stmt = $db->getPDO()->prepare($query);
			$stmt->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
			$stmt->bindValue('pass', $pass, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			$row   = $stmt->fetch(PDO::FETCH_ASSOC);
			if($count == 1 && !empty($row)) 
			// si mon pseudo et mon pass marchent alors tu me donne des noms de session
			// avec id_membre, pseudo et nom.

			{
				print_r("page index.php");
				print_r($_SESSION);
				/******************** Your code ***********************/
				$_SESSION['sess_user_id']   = $row['id_membre'];
				$_SESSION['sess_pseudo'] = $row['pseudo'];
				$_SESSION['sess_name'] = $row['nom'];
				header('location:accueil.php');
			} else {
				$msg = "Invalid pseudo and pass!";
			}
		} catch (PDOException $e) {
			echo "Error : ".$e->getMessage();
		}
	} else {
		$msg = "Both fields are required!";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PDO login with PDO connection || Mitrajit's Tech Blog</title>
<link rel="stylesheet" href="./assets/css/styles.css">


</head>

<body>
	
		<form method="post">
		<table class="loginTable">
		  <tr>
			<th>ADMIN PANEL LOGIN</th>
		  </tr>
		  <tr>
			<td>
				<label class="firstLabel">pseudo:</label>
		    	<input type="text" name="pseudo" id="pseudo" value="" autocomplete="off" />
			</td>
		  </tr>
		  <tr>
			<td><label>pass:</label>
		    <input type="pass" name="pass" id="pass" value="" autocomplete="off" /></td>
		  </tr>
		  <tr>
			<td><input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login" /><span class="loginMsg"><?php echo @$msg;?></span></td>
		  </tr>
		  <tr>
		  <td><p>Vous n'avez pas de compte?<a href="membre.php">S'enregistrer</a>.</p></td>
</tr>
		</table>
		</form>
	
</body>
</html>
