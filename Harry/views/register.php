<?php 
session_start(); 
include("../src/config/database.php");

?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>pseudo</label>
  	  <input type="text" name="pseudo" >
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>pass</label>
  	  <input type="pass" name="pass_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm pass</label>
  	  <input type="pass" name="pass_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>

  </form>
</body>
</html>

