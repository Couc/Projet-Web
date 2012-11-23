<?php
include ('./_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
session_start();
if ($_GET['action'] == 1) {
	$requete = 'INSERT INTO SOURCE_FAV VALUES("'.$_SESSION['user'].'",'.$_GET['source'].');';
	$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
}
else if($_GET['action'] == 0) {
	$requete = 'DELETE FROM SOURCE_FAV WHERE login="'.$_SESSION['user'].'" AND id_source='.$_GET['source'].';';
	$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
}
?>
