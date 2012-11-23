<?php
include ('_A8s2f9g714ef.php');

$user = $_POST['username'];
$pw = $_POST['password'];
$pw2 = $_POST['password2'];
$email = $_POST['email'];
$email2 = $_POST['email2'];
if ($email == $email2) {
	if ($pw == $pw2) {
		$requete = 'INSERT INTO USER VALUES("' . $user . '","' . md5($pw) . '","'.$email.'","")';
		$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
		$requete = 'SELECT MAX(ID_SOURCE) FROM SOURCE';
		$id_max=0;
		$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
		while ($result = mysql_fetch_assoc($query)) {
			$id_max=$result['MAX(ID_SOURCE)'];
		}
		for($i=0;$i<=$id_max;$i++){
			$requete = 'INSERT INTO SOURCE_FAV VALUES("' . $user . '",' . $i . ')';
			$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
		}
		header('Location: login.php?msginsuc=suc');
	} else {
		header('Location: login.php?msginerr=error');
	}

} else {
	header('Location: login.php?msginerr=error');
}
?>