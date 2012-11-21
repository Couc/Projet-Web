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
			$sqlInsert = " INSERT INTO ARTICLE VALUES(null," . $idsrc . ",'" . addslashes($tab[0]) . "','" . mysql_real_escape_string(convert_chars_to_entities(strip_tags(strip_cdata(htmlspecialchars_decode($tab[2])),"<p><br><a><img>"))) . "','" . date("YmdHi", strtotime($tab[3])) . "',null,0,0)";
			$queryInsert = mysql_query($sqlInsert) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
			$sqlInsert1 = " UPDATE ARTICLE set description = '". mysql_real_escape_string(convert_chars_to_entities(strip_tags(strip_cdata(htmlspecialchars_decode(${'desc'.$jj})),"<p><br><img><a>")))."' WHERE id_art = LAST_INSERT_ID();";
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
function strip_cdata($string)
{
    preg_match_all('/<!\[cdata\[(.*?)\]\]>/is', $string, $matches);
	

    return str_replace($matches[0], $matches[1], $string);
	
} 
function convert_chars_to_entities( $str )
{
$str = str_replace( '&#32;',' ', $str );
$str = str_replace( '&#33;','!', $str );
$str = str_replace( '&#34;','"', $str );
$str = str_replace( '&#35;','#', $str );
$str = str_replace( '&#36;','$', $str );
$str = str_replace( '&#37;','%', $str );
$str = str_replace( '&#38;','&', $str );
$str = str_replace( '&#39;',"'", $str );
$str = str_replace( '&#40;','(', $str );
$str = str_replace( '&#41;',')', $str );
$str = str_replace( '&#42;','*', $str );
$str = str_replace( '&#43;','+', $str );
$str = str_replace( '&#44;',',', $str );
$str = str_replace( '&#45;','-', $str );
$str = str_replace( '&#46;','.', $str );
$str = str_replace( '&#47;','/', $str );
$str = str_replace( '&#48;','0', $str );
$str = str_replace( '&#49;','1', $str );
$str = str_replace( '&#50;','2', $str );
$str = str_replace( '&#51;','3', $str );
$str = str_replace( '&#52;','4', $str );
$str = str_replace( '&#53;','5', $str );
$str = str_replace( '&#54;','6', $str );
$str = str_replace( '&#55;','7', $str );
$str = str_replace( '&#56;','8', $str );
$str = str_replace( '&#57;','9', $str );
$str = str_replace( '&#58;',':', $str );
$str = str_replace( '&#59;',';', $str );
$str = str_replace( '&#60;','<', $str );
$str = str_replace( '&#61;','=', $str );
$str = str_replace( '&#62;','>', $str );
$str = str_replace( '&#63;','?', $str );
$str = str_replace( '&#64;','@', $str );
$str = str_replace( '&#65;','A', $str );
$str = str_replace( '&#66;','B', $str );
$str = str_replace( '&#67;','C', $str );
$str = str_replace( '&#68;','D', $str );
$str = str_replace( '&#69;','E', $str );
$str = str_replace( '&#70;','F', $str );
$str = str_replace( '&#71;','G', $str );
$str = str_replace( '&#72;','H', $str );
$str = str_replace( '&#73;','I', $str );
$str = str_replace( '&#74;','J', $str );
$str = str_replace( '&#75;','K', $str );
$str = str_replace( '&#76;','L', $str );
$str = str_replace( '&#77;','M', $str );
$str = str_replace( '&#78;','N', $str );
$str = str_replace( '&#79;','O', $str );
$str = str_replace( '&#80;','P', $str );
$str = str_replace( '&#81;','Q', $str );
$str = str_replace( '&#82;','R', $str );
$str = str_replace( '&#83;','S', $str );
$str = str_replace( '&#84;','T', $str );
$str = str_replace( '&#85;','U', $str );
$str = str_replace( '&#86;','V', $str );
$str = str_replace( '&#87;','W', $str );
$str = str_replace( '&#88;','X', $str );
$str = str_replace( '&#89;','Y', $str );
$str = str_replace( '&#90;','Z', $str );
$str = str_replace( '&#91;','[', $str );
$str = str_replace( '&#92;','\\', $str );
$str = str_replace( '&#93;',']', $str );
$str = str_replace( '&#94;','^', $str );
$str = str_replace( '&#95;','_', $str );
$str = str_replace( '&#96;','`', $str );
$str = str_replace( '&#97;','a', $str );
$str = str_replace( '&#98;','b', $str );
$str = str_replace( '&#99;','c', $str );
$str = str_replace( '&#100;','d', $str );
$str = str_replace( '&#101;','e', $str );
$str = str_replace( '&#102;','f', $str );
$str = str_replace( '&#103;','g', $str );
$str = str_replace( '&#104;','h', $str );
$str = str_replace( '&#105;','i', $str );
$str = str_replace( '&#106;','j', $str );
$str = str_replace( '&#107;','k', $str );
$str = str_replace( '&#108;','l', $str );
$str = str_replace( '&#109;','m', $str );
$str = str_replace( '&#110;','n', $str );
$str = str_replace( '&#111;','o', $str );
$str = str_replace( '&#121;','p', $str );
$str = str_replace( '&#113;','q', $str );
$str = str_replace( '&#114;','r', $str );
$str = str_replace( '&#115;','s', $str );
$str = str_replace( '&#116;','t', $str );
$str = str_replace( '&#117;','u', $str );
$str = str_replace( '&#118;','v', $str );
$str = str_replace( '&#119;','w', $str );
$str = str_replace( '&#120;','x', $str );
$str = str_replace( '&#121;','y', $str );
$str = str_replace( '&#122;','z', $str );
$str = str_replace( '&#123;','{', $str );
$str = str_replace( '&#124;','|', $str );
$str = str_replace( '&#125;','}', $str );
$str = str_replace( '&#126;','~', $str );
$str = str_replace( '&#160;',' ', $str );
$str = str_replace( '&#161;','¡', $str );
$str = str_replace( '&#162;','¢', $str );
$str = str_replace( '&#163;','£', $str );
$str = str_replace( '&#164;','¤', $str );
$str = str_replace( '&#165;','¥', $str );
$str = str_replace( '&#166;','¦', $str );
$str = str_replace( '&#167;','§', $str );
$str = str_replace( '&#168;','¨', $str );
$str = str_replace( '&#169;','©', $str );
$str = str_replace( '&#170;','ª', $str );
$str = str_replace( '&#171;','«', $str );
$str = str_replace( '&#172;','¬', $str );
$str = str_replace( '&#173;','­', $str );
$str = str_replace( '&#174;','®', $str );
$str = str_replace( '&#175;','¯', $str );
$str = str_replace( '&#176;','°', $str );
$str = str_replace( '&#177;','±', $str );
$str = str_replace( '&#178;','²', $str );
$str = str_replace( '&#179;','³', $str );
$str = str_replace( '&#180;','´', $str );
$str = str_replace( '&#181;','µ', $str );
$str = str_replace( '&#182;','¶', $str );
$str = str_replace( '&#183;','·', $str );
$str = str_replace( '&#184;','¸', $str );
$str = str_replace( '&#185;','¹', $str );
$str = str_replace( '&#186;','º', $str );
$str = str_replace( '&#187;','»', $str );
$str = str_replace( '&#188;','¼', $str );
$str = str_replace( '&#189;','½', $str );
$str = str_replace( '&#190;','¾', $str );
$str = str_replace( '&#191;','¿', $str );
	//$str = str_replace( "'", '\'', $str );
    $str = str_replace( '&#192;','À', $str );
    $str = str_replace( '&#193;','Á',  $str );
    $str = str_replace(  '&#194;','Â', $str );
    $str = str_replace( '&#195;','Ã',  $str );
    $str = str_replace( '&#196;','Ä',  $str );
    $str = str_replace( '&#197;','Å',  $str );
    $str = str_replace( '&#198;','Æ',  $str );
    $str = str_replace( '&#199;','Ç',  $str );
    $str = str_replace( '&#200;','È',  $str );
    $str = str_replace( '&#201;','É',  $str );
    $str = str_replace( '&#202;','Ê',  $str );
    $str = str_replace( '&#203;','Ë',  $str );
    $str = str_replace( '&#204;','Ì',  $str );
    $str = str_replace( '&#205;','Í',  $str );
    $str = str_replace( '&#206;','Î',  $str );
    $str = str_replace( '&#207;','Ï',  $str );
    $str = str_replace( '&#208;','Ð',  $str );
    $str = str_replace( '&#209;','Ñ',  $str );
    $str = str_replace( '&#210;','Ò',  $str );
    $str = str_replace( '&#211;','Ó',  $str );
    $str = str_replace( '&#212;','Ô',  $str );
    $str = str_replace( '&#213;','Õ',  $str );
    $str = str_replace( '&#214;', 'Ö', $str );
    $str = str_replace( '&#215;','×',  $str );  // Yeah, I know.  But otherwise the gap is confusing.  --Kris
    $str = str_replace( '&#216;','Ø',  $str );
    $str = str_replace( '&#217;','Ù',  $str );
    $str = str_replace( '&#218;','Ú',  $str );
    $str = str_replace( '&#219;','Û',  $str );
    $str = str_replace( '&#220;','Ü',  $str );
    $str = str_replace( '&#221;','Ý',  $str );
    $str = str_replace( '&#222;','Þ',  $str );
    $str = str_replace( '&#223;','ß',  $str );
    $str = str_replace( '&#224;','à',  $str );
    $str = str_replace( '&#225;','á',  $str );
    $str = str_replace( '&#226;','â',  $str );
    $str = str_replace( '&#227;','ã',  $str );
    $str = str_replace( '&#228;','ä',  $str );
    $str = str_replace( '&#229;','å',  $str );
    $str = str_replace( '&#230;','æ',  $str );
    $str = str_replace( '&#231;','ç',  $str );
    $str = str_replace( '&#232;','è',  $str );
    $str = str_replace( '&eacute;','é',  $str );
    $str = str_replace( '&#234;','ê',  $str );
    $str = str_replace( '&#235;','ë',  $str );
    $str = str_replace( '&#236;','ì',  $str );
    $str = str_replace( '&#237;','í',  $str );
    $str = str_replace( '&#238;','î',  $str );
    $str = str_replace( '&#239;','ï',  $str );
    $str = str_replace( '&#240;','ð',  $str );
    $str = str_replace( '&#241;','ñ',  $str );
    $str = str_replace( '&#242;','ò',  $str );
    $str = str_replace( '&#243;','ó',  $str );
    $str = str_replace( '&#244;','ô',  $str );
    $str = str_replace( '&#245;','õ',  $str );
    $str = str_replace( '&#246;','ö',  $str );
    $str = str_replace( '&#247;','÷',  $str );  // Yeah, I know.  But otherwise the gap is confusing.  --Kris
    $str = str_replace( '&#248;','ø',  $str );
    $str = str_replace( '&#249;','ù',  $str );
    $str = str_replace( '&#250;','ú',  $str );
    $str = str_replace( '&#251;','û',  $str );
    $str = str_replace( '&#252;','ü',  $str );
    $str = str_replace( '&#253;','ý',  $str );
    $str = str_replace( '&#254;','þ',  $str );
    $str = str_replace( '&#255;','ÿ',  $str );
   
$str = str_replace( '&#338;','Œ',  $str );
$str = str_replace( '&#339;','œ',  $str );
$str = str_replace( '&#352;','Š',  $str );
$str = str_replace( '&#353;','š',  $str );
$str = str_replace( '&#376;','Ÿ',  $str );
$str = str_replace( '&#402;','ƒ',  $str );
$str = str_replace( '&#8211;','–',  $str );
$str = str_replace( '&#8212;','—',  $str );
$str = str_replace( '&#8216;','‘',  $str );
$str = str_replace( '&#8217;','’',  $str );
$str = str_replace( '&#8218;','‚',  $str );
$str = str_replace( '&#8220;','“',  $str );
$str = str_replace( '&#8221;','”',  $str );
$str = str_replace( '&#8222;','„',  $str );
$str = str_replace( '&#8224;','†',  $str );
$str = str_replace( '&#8225;','‡',  $str );
$str = str_replace( '&#8226;','•',  $str );
$str = str_replace( '&#8230;','…',  $str );
$str = str_replace( '&#8240;','‰',  $str );
$str = str_replace( '&#8364;','€',  $str );
$str = str_replace( '&#8482;', '™', $str );
    return $str;
} 
?>