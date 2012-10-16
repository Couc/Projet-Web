<?php
include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
set_time_limit(0);
$sql = "SELECT * FROM SOURCE;";
//exécution de notre requête SQL:
$query = mysql_query($sql) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
//récupération avec mysql_fetch_array() et affichage du résultat :
$ii=0;
while ($result = mysql_fetch_assoc($query)) {
	echo $result['lien'].'<br>';
	$ii++;
	$idsrc=$result['id_source'];
	$sql2 = "select date from article WHERE id_source='". $idsrc . "' order by date desc limit 1;";
	$query2 = mysql_query($sql2) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
	$derdate=0;
	while ($result2 = mysql_fetch_assoc($query2)) {
		echo('je boucle ici');
		$derdate = $result2['date'];
	}
	$rss = lit_rss("http://fulltextrssfeed.com/".$result['lien'], array("title", "link", "description", "pubDate"));
	$rss1 = lit_rss("http://".$result['lien'],array("description","pubDate"));
	$j=1;
	foreach ($rss1 as $tab1) 
				{
				echo ('je rentre là pour la description');
				${'desc'.$j} = $tab1[0];
				//$sqlInsert1 = " UPDATE ARTICLE set description = '". mysql_real_escape_string(utf8_encode(convert_chars_to_entities($tab1[0])))."' WHERE id_art = LAST_INSERT_ID();";
				//$queryInsert1 = mysql_query($sqlInsert1) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
				$j++;
				}
	$jj=1;
	foreach ($rss as $tab) {
		if (doubleval(date("YmdHi", strtotime($tab[3]))) > doubleval($derdate)) {
			echo ('je rentre là');
			$sqlInsert = " INSERT INTO ARTICLE VALUES(null," . $idsrc . ",'" . addslashes($tab[0]) . "','" . mysql_real_escape_string(utf8_encode(convert_chars_to_entities($tab[2]))) . "','" . date("YmdHi", strtotime($tab[3])) . "',null)";
			$queryInsert = mysql_query($sqlInsert) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
			$sqlInsert1 = " UPDATE ARTICLE set description = '". mysql_real_escape_string(utf8_encode(convert_chars_to_entities(${'desc'.$jj})))."' WHERE id_art = LAST_INSERT_ID();";
			$queryInsert1 = mysql_query($sqlInsert1) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
				
		}
		$jj++;
	}
	
	
	$fich=fopen("../../cron.log","a+");
	fwrite($fich, "le cron est passé à \n");
	fclose($fich);
}
echo $ii;

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
function convert_chars_to_entities( $str )
{
	$str = str_replace( "'", '\'', $str );
    $str = str_replace( 'À', '&#192;', $str );
    $str = str_replace( 'Á', '&#193;', $str );
    $str = str_replace( 'Â', '&#194;', $str );
    $str = str_replace( 'Ã', '&#195;', $str );
    $str = str_replace( 'Ä', '&#196;', $str );
    $str = str_replace( 'Å', '&#197;', $str );
    $str = str_replace( 'Æ', '&#198;', $str );
    $str = str_replace( 'Ç', '&#199;', $str );
    $str = str_replace( 'È', '&#200;', $str );
    $str = str_replace( 'É', '&#201;', $str );
    $str = str_replace( 'Ê', '&#202;', $str );
    $str = str_replace( 'Ë', '&#203;', $str );
    $str = str_replace( 'Ì', '&#204;', $str );
    $str = str_replace( 'Í', '&#205;', $str );
    $str = str_replace( 'Î', '&#206;', $str );
    $str = str_replace( 'Ï', '&#207;', $str );
    $str = str_replace( 'Ð', '&#208;', $str );
    $str = str_replace( 'Ñ', '&#209;', $str );
    $str = str_replace( 'Ò', '&#210;', $str );
    $str = str_replace( 'Ó', '&#211;', $str );
    $str = str_replace( 'Ô', '&#212;', $str );
    $str = str_replace( 'Õ', '&#213;', $str );
    $str = str_replace( 'Ö', '&#214;', $str );
    $str = str_replace( '×', '&#215;', $str );  // Yeah, I know.  But otherwise the gap is confusing.  --Kris
    $str = str_replace( 'Ø', '&#216;', $str );
    $str = str_replace( 'Ù', '&#217;', $str );
    $str = str_replace( 'Ú', '&#218;', $str );
    $str = str_replace( 'Û', '&#219;', $str );
    $str = str_replace( 'Ü', '&#220;', $str );
    $str = str_replace( 'Ý', '&#221;', $str );
    $str = str_replace( 'Þ', '&#222;', $str );
    $str = str_replace( 'ß', '&#223;', $str );
    $str = str_replace( 'à', '&#224;', $str );
    $str = str_replace( 'á', '&#225;', $str );
    $str = str_replace( 'â', '&#226;', $str );
    $str = str_replace( 'ã', '&#227;', $str );
    $str = str_replace( 'ä', '&#228;', $str );
    $str = str_replace( 'å', '&#229;', $str );
    $str = str_replace( 'æ', '&#230;', $str );
    $str = str_replace( 'ç', '&#231;', $str );
    $str = str_replace( 'è', '&#232;', $str );
    $str = str_replace( 'é', '&eacute;', $str );
    $str = str_replace( 'ê', '&#234;', $str );
    $str = str_replace( 'ë', '&#235;', $str );
    $str = str_replace( 'ì', '&#236;', $str );
    $str = str_replace( 'í', '&#237;', $str );
    $str = str_replace( 'î', '&#238;', $str );
    $str = str_replace( 'ï', '&#239;', $str );
    $str = str_replace( 'ð', '&#240;', $str );
    $str = str_replace( 'ñ', '&#241;', $str );
    $str = str_replace( 'ò', '&#242;', $str );
    $str = str_replace( 'ó', '&#243;', $str );
    $str = str_replace( 'ô', '&#244;', $str );
    $str = str_replace( 'õ', '&#245;', $str );
    $str = str_replace( 'ö', '&#246;', $str );
    $str = str_replace( '÷', '&#247;', $str );  // Yeah, I know.  But otherwise the gap is confusing.  --Kris
    $str = str_replace( 'ø', '&#248;', $str );
    $str = str_replace( 'ù', '&#249;', $str );
    $str = str_replace( 'ú', '&#250;', $str );
    $str = str_replace( 'û', '&#251;', $str );
    $str = str_replace( 'ü', '&#252;', $str );
    $str = str_replace( 'ý', '&#253;', $str );
    $str = str_replace( 'þ', '&#254;', $str );
    $str = str_replace( 'ÿ', '&#255;', $str );
   
    return $str;
} 
?>