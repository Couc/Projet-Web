<?php
include ('_A8s2f9g714ef.php');

$user=$_POST['username'];
$pw=$_POST['password'];
$requete='INSERT INTO USER VALUES("'.$user.'","'.$pw.'","")';
$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
header('Location: ../index.php');
	

?>