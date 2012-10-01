<?php
include ('_A8s2f9g714ef.php');

//exécution de notre requête SQL:

$sql = "SELECT * FROM SOURCE;";
//exécution de notre requête SQL:
$query = mysql_query($sql) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
//récupération avec mysql_fetch_array() et affichage du résultat :
while ($result = mysql_fetch_assoc($query)) {
	$idsrc=$result['id_source'];
	$sql = "select date from article WHERE id_source='". $idsrc . "' order by date desc limit 1;";
	$query = mysql_query($sql) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
	$derdate=0;
	while ($result2 = mysql_fetch_assoc($query)) {
		$derdate = $result2['date'];
	}
	$rss = lit_rss("http://fulltextrssfeed.com/feeds2.feedburner.com/KorbensBlog-UpgradeYourMind", array("title", "link", "description", "pubDate"));
	foreach ($rss as $tab) {
		if (doubleval(date("YmdHi", strtotime($tab[3]))) >= doubleval($derdate)) {
			$sqlInsert = " INSERT INTO ARTICLE VALUES(null," . $idsrc . ",'" . $tab[0] . "','" . mysql_real_escape_string(utf8_encode(str_replace("é", "&eacute;", $tab[2]))) . "','" . date("YmdHi", strtotime($tab[3])) . "')";
			$queryInsert = mysql_query($sqlInsert) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");

		}
	}
	$fich=fopen("cron.log","a+");
	fwrite($fich, "le cron est passé\n");
}

//$rss = lit_rss("http://rss.lemonde.fr/c/205/f/3058/index.rss", array("title", "link", "description", "pubDate", "content:encoded","dc:creator"));

function lit_rss($fichier, $objets) {

	// on lit tout le fichier
	if ($chaine = @implode("", @file($fichier))) {

		// on découpe la chaine obtenue en items
		$tmp = preg_split("/<\/?" . "item" . ">/", $chaine);

		// pour chaque item
		for ($i = 1; $i < sizeof($tmp) - 1; $i += 2)

		// on lit chaque objet de l'item
			foreach ($objets as $objet) {

				// on découpe la chaine pour obtenir le contenu de l'objet
				$tmp2 = preg_split("/<\/?" . $objet . ">/", $tmp[$i]);

				// on ajoute le contenu de l'objet au tableau resultat
				$resultat[$i - 1][] = @$tmp2[1];
			}

		// on retourne le tableau resultat
		return $resultat;
	}
}
?>