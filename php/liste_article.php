<?php
session_start();
include ('_A8s2f9g714ef.php');

mysql_query("SET NAMES UTF8");
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>ENEW</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/responsiveslides.css" />
		<link rel="stylesheet" href="../css/style_comment.css" />
		<style type="text/css">
			body {
				padding-top: 60px;
			}
		</style>
		<link href="../css/bootstrap-responsive.css" rel="stylesheet">
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Le fav and touch icons -->
	</head>
	<body onload="filtre_source1();">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<a class="brand" href="#"><img src="../img/logo blanc.png" alt=""/></a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li>
								<a href="../index.php">Accueil</a>
							</li>
							<li class="active">
								<a href="categorie.php">Catégorie</a>
							</li>
							<?php
							if (isset($_SESSION['user'])) {
								echo "<li><a href=\"liste_like.php\">Like</a></li>";
							}
							?>
							<li>
								<a href="apropos.php">A propos</a>
							</li>
							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
						<ul class="nav pull-right">
							<?php
							if (isset($_SESSION['user'])) {echo("
<div class=\"btn-group\">
<a class=\"btn btn-primary\" href=\"profil.php\" >" . $_SESSION['user'] . "</a>
<button class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\">
<span class=\"caret\"></span>
</button>
<ul class=\"dropdown-menu\">
<li>
<a href=\"profil.php\">Profil</a>
</li>
<li class=\"divider\"></li>
<li>
<a href=\"logout.php\">Logout</a>
</li>
</ul>
</div>");
							} else {
								echo("<a href=\"login.php\" class=\"btn btn-primary\"><i class=\"icon-user icon-white\"></i>Se connecter</a>");
							}
							?>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div class="container" id="container" style="margin-left:5%;min-height: 460px;">
			<div class="row-fluid">
				<?php
if (!isset($_POST['searching'])) {
				?>
				<div class="accordion" id="accordion2">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" style="background-color: #333;"> <span style="color: white;text-decoration: none;">Sélectionnez vos sources</span> <i class="icon-arrow-down icon-white pull-right"></i> </a>
						</div>
						<div id="collapseOne" class="accordion-body collapse in">
							<div class="accordion-inner">
								<form>
									<?php

									$requete = 'SELECT * FROM SOURCE WHERE ID_CAT=' . $_GET['id_cat'];
									$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
									while ($result = mysql_fetch_assoc($query)) {

										$requete2 = 'SELECT * FROM SOURCE_FAV WHERE login="' . $_SESSION['user'] . '" AND id_source=' . $result['id_source'] . ';';
										$query2 = mysql_query($requete2) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
										if ($result2 = mysql_fetch_assoc($query2)) {

											echo("<input class=\"check_source\" onclick=\"filtre_source(this);\" type='checkbox' value='" . $result['id_source'] . "' style=\"float:left;margin-right: 5px;\" checked/><p style=\"float:left;margin-right:67px;\">" . $result['libelle'] . "</p>");
										} else {
											echo("<input class=\"check_source\" onclick=\"filtre_source(this);\" type='checkbox' value='" . $result['id_source'] . "' style=\"float:left;margin-right: 5px;\" /><p style=\"float:left;margin-right:67px;\">" . $result['libelle'] . "</p>");
										}
									}
									?>
									<!--<input type="checkbox" style="float:left;margin-right: 5px;" value="Source" checked> <p style="float:left;margin-right:75px;">Source</p>-->
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				?>
				<div id="span-article">
					<div class="slider_control">
						<h3 class="drapeau"><?php
						if (!isset($_POST['searching'])) {
							switch($_GET['id_cat']) {
								case 0 :
									echo "<span>A la une</span>";
									break;
								case 1 :
									echo "<span>Politique</span>";
									break;
								case 2 :
									echo "<span>High-Tech</span>";
									break;
								case 3 :
									echo "<span>Sport</span>";
									break;
								case 4 :
									echo "<span>Economie</span>";
									break;
								case 5 :
									echo "<span>People</span>";
									break;
							}
						} else {
							echo "<span>Recherche</span>";
						}
						?></h3>
					</div>
					<?php
					if (isset($_POST['searching'])) {
						$sql_article = "SELECT * FROM ARTICLE a,SOURCE s WHERE a.id_source = s.id_source AND a.titre LIKE '%" . $_POST['searching'] . "%' AND a.contenu LIKE '%" . $_POST['searching'] . "%' AND a.description LIKE '%" . $_POST['searching'] . "%' ORDER BY id_art DESC;";
					} else {
						$sql_article = "SELECT * FROM ARTICLE a,SOURCE s WHERE a.id_source = s.id_source AND s.id_cat = " . $_GET['id_cat'] . " ORDER BY id_art DESC;";
					}
					$query_article = mysql_query($sql_article) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");

					while ($result_article = mysql_fetch_assoc($query_article)) {
						$annee = substr($result_article['date'], 0, 4);
						$mois = substr($result_article['date'], 4, 2);
						$jour = substr($result_article['date'], 6, 2);
						$heure = substr($result_article['date'], 8, 2);
						$minutes = substr($result_article['date'], 10, 2);

						echo "<article id=\"article-accueil\" class=" . $result_article['id_source'] . ">

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
						echo "<br>
<span id=\"nombre_commentaire\" ><i class=\"icon-comment\" id=\"icone-accueil\" ></i>" . $result_article['nb_comment'] . " comments</span>
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
<a href=\"article.php?id_art=" . $result_article['id_art'] . "\">Read more<i class=\"icon-chevron-right\"></i></a>
</div>

</div>

</article>";

					}
					?>
				</div><!--span10 content -->
				<aside class="span2" id="scroll-cat" >
					<form class="form-search"  action='liste_article.php' method='POST'>
						<div class="input-append" >
							<input type="text" class="span2 search-query" name='searching' style="width:150px;margin-bottom:20px;">
							<button type="submit" class="btn">
								Search
							</button>
						</div>
					</form>
					<div style="width:150px;text-align:center;">
						<h4>Catégorie</h4>
						<br>
						<a href="liste_article.php?id_cat=0">A la une</a>
						<hr style="margin-bottom:4px;">
						<a href="liste_article.php?id_cat=2">High-Tech</a>
						<hr style="margin-bottom:4px;">
						<a href="liste_article.php?id_cat=3">Sport</a>
						<hr style="margin-bottom:4px;">
						<a href="liste_article.php?id_cat=1">Politique</a>
						<hr style="margin-bottom:4px;">
						<a href="liste_article.php?id_cat=4">Economie</a>
						<hr style="margin-bottom:4px;">
						<a href="liste_article.php?id_cat=5">People</a>
					</div>
				</aside>
			</div>
		</div>
		<!-- /container -->
		<div id="extra" style="background-color:#222;border-top:1px solid;color:white;padding:20px;margin-top:20px;">
			<div class="inner">
				<div class="container">
					<div class="row-fluid">
						<div class="span3">
							<h3><span class="slash">>></span></span> About Us</h3>
							<p>
								ENEW est un site créé par 2 étudiants en licence informatique a l'IUT de Belfort.
								<br>
								Ce site a pour but de centraliser toutes vos news.
							</p>
						</div>
						<!-- /span4 -->
						<div class="span3 offset1">
							<h3><span class="slash">>></span> Explore</h3>
							<ul class="footer-links clearfix">
								<li>
									<a href="../index.php" style="text-decoration: none;color:#777;list-style:none;">Accueil</a>
								</li>
								<li>
									<a href="categorie.php" style="text-decoration: none;color:#777;list-style:none;">Catégories</a>
								</li>
								<li>
									<a href="apropos.php" style="text-decoration: none;color:#777;list-style:none;">A propos</a>
								</li>
								<li>
									<a href="contact.php" style="text-decoration: none;color:#777;list-style:none;">Contact</a>
								</li>
							</ul>
						</div>
						<!-- /span3 -->
						<div class="span3"></div>
						<!-- /span3 -->
						<div class="span2">
							<h3><span class="slash">>></span> Social</h3>
							<ul class="footer-links clearfix">
								<a href="http://facebook.com/" style="float:left;margin-right:10px;" ><img onmouseover="this.src='../img/facebook-c.png'; " onmouseout="this.src='../img/facebook.png'; " src="../img/facebook.png"/></a>
								<a href="http://twitter.com/" style="float:left;margin-right:10px;"><img onmouseover="this.src='../img/twitter-c.png'; " onmouseout="this.src='../img/twitter.png'; " src="../img/twitter.png"/></a>
								<a href="http://google.com/" style="float:left;"><img onmouseover="this.src='../img/google-c.png'; " onmouseout="this.src='../img/google.png'; " src="../img/google.png"/></a>
							</ul>
						</div>
						<!-- /span3 -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /inner -->
		</div>
		<!-- /#extra -->
		<div id="footer" style="background-color: black;color: #333;padding: 20px 0px;">
			<div class="inner">
				<div class="container">
					<div class="row">
						<div id="footer-copyright" class="span4">
							&copy; 2012 ENEW, all rights reserved.
						</div>
						<!-- /span4 -->
						<div id="footer-terms" class="span8">
							<p class="pull-right">
								Built by<a href=""  style="text-decoration: none;color:white;"> LANTERNIER Thomas & BOULACHIN Clément.</a>
							</p>
						</div>
						<!-- /span8 -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /inner -->
		</div>
		<!-- /#footer -->
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script type="text/javascript">
			window.onscroll = function() {
				var scroll = (document.documentElement.scrollTop || document.body.scrollTop);

				if(scroll > 100) {
					document.getElementById('scroll-cat').style.top = scroll + 'px';

				}
				if(scroll > document.documentElement.scrollHeight - 730) {
					document.getElementById('scroll-cat').style.top = document.documentElement.scrollHeight - 730 + 'px';
				}
			}
		</script>
		<script type="text/javascript">
			function filtre_source(id) {

				var value = id.value;
				var elements = document.getElementsByClassName(value);
				if(id.checked) {
					for(var i = 0, length = elements.length; i < length; i++) {

						elements[i].style.display = 'block';
					}
				} else {
					for(var i = 0, length = elements.length; i < length; i++) {

						elements[i].style.display = 'none';
					}

				}

			}

			function filtre_source1() {

				var elements = document.getElementsByClassName('check_source');

				for(var i = 0, length = elements.length; i < length; i++) {

					//elements[i].style.display = 'none';
					filtre_source(elements[i]);
				}

			}
		</script>
	</body>
</html>