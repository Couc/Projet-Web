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
	<body>
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
							<li>
								<a href="categorie.php">Catégorie</a>
							</li>
							 <?php
              if(isset($_SESSION['user'])){
              	echo "<li><a href=\"liste_like.php\">Like</a></li>";
			  }
              ?>
							<li>
								<a href="apropos.php">A propos</a>
							</li>
							<li class="active" >
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
		<div class="container" style='min-height:460px;'>
			<div class="row-fluid">
				<h2>Nous Contacter</h2>
				<h4>E-Mail</h4>
				<a target='blank' href='mailto:couc.boulac@gmail.com?Subject=Contact about Enew'>Clément Boulachin</a><br/>
				<a target='blank' href='mailto:thomaslanternier3@gmail.com?Subject=Contact about Enew'>Thomas Lanternier</a> 
 			<br/><br/>
 			<h4>Formulaire</h4>
 			<div id="addCommentContainer">
 							<form action='submit_contact.php' method='POST'>
 			<?php
 			if (isset($_GET['msgsend'])) {
						echo('	<div class="alert alert-success">
Message Enregistré. Vous recevrez une réponse sous 7 jours ouvrable. 
</div>');
					} 
					?>
 			<label>Votre e-mail</label><br/>
 			<input type='email' required name='mail'/>
 			<label>Message</label><br/>
 			<textarea required name='msg' rows='5' cols='50'></textarea>
 			<button type="submit" id='submit' >
							Envoyer
						</button>
 							</form>
 			</div>
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
