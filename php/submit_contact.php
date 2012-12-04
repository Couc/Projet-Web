<?php
include ('./_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
session_start();
$requete = 'INSERT INTO CONTACT VALUES(null,"'.$_POST['mail'].'","'.$_POST['msg'].'");';
$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
header('Location: contact.php?msgsend=ok');
?>