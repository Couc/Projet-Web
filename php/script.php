<?php
include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
function getSources() {
	$sql = "";
	if (isset($_SESSION['user'])) {
		$sql = "SELECT * FROM SOURCE_FAV WHERE login='" . $_SESSION['user'] . "' ORDER BY id_source;";
	} else {
		$sql = "SELECT id_source FROM SOURCE ORDER BY id_source;";
	}
	//exécution de notre requête SQL:
	$query = mysql_query($sql) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
	//récupération avec mysql_fetch_array() et affichage du résultat :
	$id_src = "";
	$sepa = ", ";
	$i = 0;
	while ($result = mysql_fetch_assoc($query)) {
		if ($i == 0) {
			$id_src = $result['id_source'];
		} else {
			$id_src = $id_src . "" . $sepa . "" . $result['id_source'];
		}
		$i++;
	}
	return $id_src;

}
?>