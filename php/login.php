<?php
include ('_A8s2f9g714ef.php');
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
								<a href="#about">Catégorie</a>
							</li>
							<li>
								<a href="#contact">A propos</a>
							</li>
							<li>
								<a href="#contact">Contact</a>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row-fluid">
				<div class="span12">
					<div class="span6" id='div-border' >
						<?php
						if (isset($_GET['msgco'])) {
							echo('	<div class="alert alert-error">
Error, please try again ! 
</div>');
						}
						?>
						<p>
							<h3 style='margin-bottom:30px;'>Se connecter</h3>
						</p>
						<form style='text-align:left;' action='connexion.php' method='POST'>
							<label style='float:left;width:45%;margin-right:30px;'>Login</label>
							<input style='float:left;' type='text' name='username' required placeholder='username'/>
							<label style='float:left;width:45%;margin-right:30px;'>Mot de passe</label>
							<input style='float:left;' type='password' name='password' required placeholder='password'/>
							<input type='submit' class='btn btn-primary' style="width:30%;margin-top:30px;margin-left:50%" value="Connexion"/>
						</form>
					</div>
					<div class="span6" style="text-align:center">
						<?php
						if (isset($_GET['msginerr'])) {
							echo('	<div class="alert alert-error">
									Error, please try again !
									</div>');
						}
						else if(isset($_GET['msginsuc'])) {
							echo('	<div class="alert alert-success">
									Succes, You can now login ;-)
									</div>');
						}
						?>
						<p>
							<h3 style='margin-bottom:30px;'>S'inscrire</h3>
						</p>
						<form style='text-align:left;' action='inscription.php' method='POST'>
							<label style='float:left;width:45%;margin-right:30px;'>E-mail</label>
							<input style='float:left;' type='email' name='email' placeholder='email@example.com' required/>
							<label style='float:left;width:45%;margin-right:30px;'>Confirmation E-mail</label>
							<input style='float:left;' type='email' name='email2' placeholder='email@example.com' required/>
							<label style='float:left;width:45%;margin-right:30px;'>Login</label>
							<input style='float:left;' type='text' name='username' required placeholder='username'/>
							<label style='float:left;width:45%;margin-right:30px;'>Mot de passe</label>
							<input style='float:left;' type='password' name='password' required placeholder='password'/>
							<label style='float:left;width:45%;margin-right:30px;'>Confirmation Mot de passe</label>
							<input style='float:left;' type='password' name='password2' required placeholder='password'/>
							<input type='submit' class='btn btn-primary' style="width:30%;margin-top:30px;margin-left:50%" value="Inscription"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/slider.js"></script>
		<script type="text/javascript">
			window.onscroll = function() {
				var scroll = (document.documentElement.scrollTop || document.body.scrollTop);
				if(scroll > 320)
					document.getElementById('scroll').style.top = scroll + 'px';

			}
		</script>
		<script src="../js/responsiveslides.js"></script>
		<script>
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