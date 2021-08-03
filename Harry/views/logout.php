<?php
session_start();
$_SESSION['sess_user_id'] = "";
$_SESSION['sess_username'] = "";
$_SESSION['sess_name'] = "";
$_SESSION['sess_n'] = "test session";
if(empty($_SESSION['sess_user_id'])) header("location: index.php");
print_r ($_SESSION);
?>