<?php
include ('./_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
session_start();

$requete = 'SELECT password FROM USER WHERE login="' . $_SESSION['user'] . '";';
$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
if ($result = mysql_fetch_assoc($query)) {
	if ($result['password'] == md5($_GET['lastpw'])) {

		$requete = 'UPDATE USER SET email="' . $_GET['emailuser'] . '" WHERE login="' . $_SESSION['user'] . '";';
		$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");

		if ($_GET['newpw1'] != "" && $_GET['newpw2'] != "" && md5($_GET['newpw2']) == md5($_GET['newpw1'])) {
			$requete = 'UPDATE USER SET password="' . md5($_GET['newpw1']) . '" WHERE login="' . $_SESSION['user'] . '";';
			$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
		} else {
			header('Location: profil.php?msgfaia=error');
			exit();
		}
		header('Location: profil.php?msgsuca=success');
	}
	else{
		header('Location: profil.php?msgfaic=error');
	}
	
} else {
	header('Location: profil.php?msgfaid=error');
}

?>