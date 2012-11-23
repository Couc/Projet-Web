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
<a class=\"btn btn-primary\" href=\"php/profil.php\" >" . $_SESSION['user'] . "</a>
<button class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\">
<span class=\"caret\"></span>
</button>
<ul class=\"dropdown-menu\">
<li>
<a href=\"php/profil.php\">Profil</a>
</li>
<li class=\"divider\"></li>
<li>
<a href=\"php/logout.php\">Logout</a>
</li>
</ul>
</div>");
							} else {
								echo("<a href=\"php/login.php\" class=\"btn btn-primary\"><i class=\"icon-user icon-white\"></i>Se connecter</a>");
							}
							?>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row-fluid">
				<h1>Profil</h1>
				<div class='span1'></div>
				<div class='span3'>
					<form>
					<?php
					$requete = 'SELECT * FROM USER WHERE login="' . $_SESSION['user'] . '"';
					$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
					while ($result = mysql_fetch_assoc($query)) {
						echo("<label>Login</label><input type='text' value='" . $result['login'] . "' required/><br>
<label>E-mail</label><input type='email' value='" . $result['email'] . "' required/><br>");

					}
					
					?>
					<br>
					<label>Ancien mot de passe</label><input type='password' name='lastpw' required/>
					<input type='text' class='btn btn-primary' value='Change password' onclick='loadPassword()'/>
					<div id='chgpwd' style='display:none'>
						
						<label>Nouveau mot de passe</label><input type='password' name='newpw1'/>
						<label>Confirmez le nouveau mot de passe</label><input type='password' name='newpw2'/>
					</div>
					<button type="submit" class="btn">Submit</button>
					</form>
				</div>
				<div class='span7'>
					<ul id='tabBar' class="nav nav-tabs">
						<?php
						$requete = 'SELECT * FROM CATEGORIE ORDER BY ID_CAT';
						$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
						$i = 0;
						while ($result = mysql_fetch_assoc($query)) {
							echo("<li ");
							if ($i == 0) {echo("class=\"active\"");
							}
							echo("><a href=\"#\" onclick='loadSources(".$result['id_cat'].")'>" . $result['libelle'] . "</a></li>");
							$i++;
						}
						?>
					</ul>
					<div id='receive_sources'>
						<table class="table table-striped">
							<tr>
								<td style='text-align:center'><b>Libellé</b></td><td style='text-align:center'><b>Flux rss</b></td><td style='text-align:center'><b>Active</b></td>
							</tr>
							<?php
							$requete = 'SELECT * FROM SOURCE WHERE ID_CAT=1';
							$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
							while ($result = mysql_fetch_assoc($query)) {
								echo("<tr><td>" . $result['libelle'] . "</td><td>" . $result['lien'] . "</td><td style='text-align:center'><input type='checkbox' checked='checked'/></td></tr>");
							}
							?>
						</table>
					</div>
				</div>
				<div class='span1'></div>
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
									<a href="/" style="text-decoration: none;color:#777;list-style:none;">Accueil</a>
								</li>
								<li>
									<a href="/themes" style="text-decoration: none;color:#777;list-style:none;">Catégories</a>
								</li>
								<li>
									<a href="/faq" style="text-decoration: none;color:#777;list-style:none;">A propos</a>
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
		function loadSources(id){
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					//document.getElementById("form_joueur_click").innerHTML=;
					document.getElementById("receive_sources").innerHTML = xmlhttp.responseText;
			}
			xmlhttp.open("GET", "profil_ajax.php?id=" + id, true);
			xmlhttp.send();
		}
		function loadPassword(){
			document.getElementById("chgpwd").style.display = 'block';
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
