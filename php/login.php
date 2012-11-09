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
					<a class="brand" href="#"><img src="img/logo blanc.png" alt=""/></a>
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
					<div class="span6" style="text-align:center;border-right:1px solid #313030;">
						<p>
							<h3>Se connecter</h3>
						</p>
						<form>
							<div class="span11">
								<div class="span5">
									Login
								</div>
								<div class="span1">
									&nbsp;
								</div>
								<div class="span5">
									<input type='text'/>
								</div>
								<div class="span5">
									Login
								</div>
								<div class="span1">
									&nbsp;
								</div>
								<div class="span5">
									<input type='text'/>
								</div>
								
							</div>
						</form>
					</div>
					<div class="span6" style="text-align:center">
						<p>
							<h3>S'inscrire</h3>
						</p>
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