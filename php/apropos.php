<?php
include ('./_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
session_start();
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
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<a class="brand" href="#"><img src="../img/logo blanc.png" alt=""/></a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active">
								<a href="../index.php">Accueil</a>
							</li>
							<li>
								<a href="./liste_article.php">Catégorie</a>
							</li>
							<li>
								<a href="#contact">A propos</a>
							</li>
							<li>
								<a href="#contact">Contact</a>
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
		<div class="container" style='min-height:460px;'>
			<div class="row-fluid">
				<h2>Présentation</h2><br/>
				Enew est un site réalisé par 2 étudiants de la Licence Professionelle SIL à l'Iut de Belfort-Montbéliard. 
				Il a pour but de centraliser les informations emergeants de vos sites d'actualité préférés, et de vous porposer le contenue sous forme d'articles afin d'en simplifier la lecture. 
				Vous pouvez vous y inscrire, choisir les sources que vous souhaitez centraliser, mettre des articles en favoris, en encore les commenter avec toute la communauté.
				<br/><br/>
				<h2>Amélioration à venir</h2><br/>
				- Ajoutez vos propres flux rss à notre base de données.<br/>
				- Créer vos catégories personelles et les administrer à votre manière.<br/><br/>
				<h2>Contribution</h2><br/>
				<a href='http://www.lanternier.info' target='blank'>Lanternier Thomas</a><br/>
				<a href='http://www.powerwave-clan.org' target='blank'>Boulachin Clément</a>
			</div>
		</div>
		<!--Footer-->
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
								<li>
									<a href="http://facebook.com/" style="text-decoration: none;color:#777;list-style:none;">Facebook</a>
								</li>
								<li>
									<a href="http://twitter.com/" style="text-decoration: none;color:#777;list-style:none;">Twitter</a>
								</li>
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
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script type="text/javascript">
			window.onscroll = function() {
				var scroll = (document.documentElement.scrollTop || document.body.scrollTop);
				if(scroll > 320)
					document.getElementById('scroll').style.top = scroll + 'px';
				if(scroll > document.documentElement.scrollHeight - 730) {
					document.getElementById('scroll').style.top = document.documentElement.scrollHeight - 730 + 'px';
				}
			}
		</script>
		<script type='text/javascript'>
			function loadSources(id) {
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
						//document.getElementById("form_joueur_click").innerHTML=;
						document.getElementById("receive_sources").innerHTML = xmlhttp.responseText;
				}
				xmlhttp.open("GET", "profil_ajax.php?id=" + id, true);
				xmlhttp.send();
			}

			function loadPassword() {
				document.getElementById("chgpwd").style.display = 'block';
			}

			function updateSources(id) {
				var valu = id.value;
				if(id.checked) {
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						}
						//document.getElementById("form_joueur_click").innerHTML=;
						//document.getElementById("receive_sources").innerHTML = xmlhttp.responseText;
					}
					xmlhttp.open("GET", "sources_ajax.php?source=" + valu + "&action=1", true);
					xmlhttp.send();
				} else {
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						}
						//document.getElementById("form_joueur_click").innerHTML=;
						//document.getElementById("receive_sources").innerHTML = xmlhttp.responseText;
					}
					xmlhttp.open("GET", "sources_ajax.php?source=" + valu + "&action=0", true);
					xmlhttp.send();
				}
			}
		</script>
		<script src="../js/responsiveslides.js"></script>
		<script>
			$('#tabBar a').click(function(e) {
				e.preventDefault();
				$(this).tab('show');
			})
			$(function() {

				// Slideshow 2
				$("#slider2").responsiveSlides({
					auto : false,
					pager : true,
					speed : 300,
					maxwidth : 1000
				});

			});

		</script>
	</body>
</html>
