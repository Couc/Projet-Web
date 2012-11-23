<?php
include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
$sql_article = "SELECT * FROM ARTICLE a, SOURCE s WHERE a.id_source = s.id_source ORDER BY a.id_art LIMIT 10;";
$query_article = mysql_query($sql_article) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");

while ($result_article = mysql_fetch_assoc($query_article)) {

	$annee = substr($result_article['date'], 0, 4);
	$mois = substr($result_article['date'], 4, 2);
	$jour = substr($result_article['date'], 6, 2);
	$heure = substr($result_article['date'], 8, 2);
	$minutes = substr($result_article['date'], 10, 2);

	echo "<article id=\"article-accueil\">

<div id=\"info-post-accueil\" >
<i class=\"icon-calendar\" id=\"icone-accueil\" ></i><date>" . date("D d M Y", mktime(0, 0, 0, $mois, $jour, $annee)) . "</date>
<br>
<span id=\"author\" ><i class=\"icon-user\" id=\"icone-accueil\" ></i>" . $result_article['libelle'] . "</span>
<br>";

	switch($result_article['id_cat']) {
		case 1 :
			echo "<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Politique</span>";
			break;
		case 2 :
			echo "<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>High-Tech</span>";
			break;
		case 3 :
			echo "<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Sport</span>";
			break;
		case 4 :
			echo "<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Economie</span>";
			break;
		case 5 :
			echo "<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>People</span>";
			break;
	}
	echo "<br><span id=\"nombre_commentaire\" ><i class=\"icon-comment\" id=\"icone-accueil\" ></i>" . $result_article['nb_comment'] . " comments</span>
<br>
<span id=\"nombre_likes\" ><i class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>" . $result_article['nb_like'] . " likes</span>
</div>
<div id=\"post-accueil\">
<header>
<h4>" . html_entity_decode($result_article['titre']) . "</h4>
</header>

<div id=\"article\">
<p>" . html_entity_decode($result_article['description']) . "</p>
<div id=\"info-post-tablet\">
<i class=\"icon-calendar\" id=\"icone-accueil-tablet-first\"></i><date style=\"float:left;\">" . date("D d M Y", mktime(0, 0, 0, $mois, $jour, $annee)) . "</date>

<span id=\"author\" id=\"icone-accueil-tablet\" ><i class=\"icon-user\" style=\"margin-right:4px;\"></i>" . $result_article['libelle'] . "</span>";

	switch($result_article['id_cat']) {
		case 1 :
			echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Politique</span>";
			break;
		case 2 :
			echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>High-Tech</span>";
			break;
		case 3 :
			echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Sport</span>";
			break;
		case 4 :
			echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Economie</span>";
			break;
		case 5 :
			echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>People</span>";
			break;
	}
	echo "<span id=\"nombre_commentaire\" id=\"icone-accueil-tablet\"><i class=\"icon-comment\" style=\"margin-right:4px;\"></i>" . $result_article['nb_comment'] . " comments</span>

<span id=\"nombre_likes\" id=\"icone-accueil-tablet-last\"><i class=\"icon-thumbs-up\" style=\"margin-right:4px;\"></i>" . $result_article['nb_like'] . " likes</span>
</div>
<a href=\"php/article.php?id_art=" . $result_article['id_art'] . "\">Read more<i class=\"icon-chevron-right\"></i></a>
</div>

</div>

</article>";

}
?>