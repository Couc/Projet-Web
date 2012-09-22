<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>PMA</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Le fav and touch icons -->
		<!-- Script js-->
		<script type="text/javascript"></script>
	</head>
	<body>
		<?php
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

		function lit_rsss($fichier, $objets) {

			// on lit tout le fichier
			if ($chaine = @implode("", @file($fichier))) {

				// on découpe la chaine obtenue en items
				$tmp = preg_split("/<\/?" . "channel" . ">/", $chaine);

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
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container-fluid" style="height:200px;">
          <a class="brand" href="#" style="margin-top:75px;margin-left:75px;" ><img src="img/logo blanc.png" style="margin-left:60px;"/><br>Every News EveryWhere</a>
          
          
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> Utilisateur
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li class="divider"></li>
              <li><a href="#">Sign Out</a></li>
            </ul>
          </div>
          <div class="nav-collapse" style="margin-top:75px;margin-left:600px;">
            <ul class="nav">
              <li class="active" style="margin-left:20px;"><a href="index.php">Acceuil</a></li>
              <li class="" style="margin-left:20px;"><a href="index.php">Catégorie</a></li>
              <li class="" style="margin-left:20px;"><a href="index.php">Catégorie</a></li>
              <li class="" style="margin-left:20px;"><a href="index.php">Catégorie</a></li>
              <li class="" style="margin-left:20px;"><a href="index.php">Catégorie</a></li>
              <li class="" style="margin-left:20px;"><a href="index.php">A propos</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
     <div class="row">
        <div class="hero-unit" style='background-image: url("img/logo_grand.png")'>
  <h1>Heading</h1>
  <p>Tagline</p>
  <p>
    <a class="btn btn-primary btn-large">
      Learn more
    </a>
  </p>
</div>
<div class="row-fluid">
	<div class="span2"></div>
	<div class="span8">
<div class="accordion" id="accordion2">
	

<?php

	$rss = lit_rss("http://fullfeeds.org/fullfeed.php?url=www.leparisien.fr/une/rss.xml", array("title", "link", "description", "pubDate", "content:encoded","dc:creator"));
	//$feed_url='http://feeds2.feedburner.com/KorbensBlog-UpgradeYourMind';
	//$rss = simplexml_load_file($feed_url);
	$i = 0;
	foreach ($rss as $tab) {
		$i++;
		echo '	<div class="accordion-group">
		 			<div class="accordion-heading">
		 			<table width="100%">
		 			<tr>
		 			<td width="90%">
							 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$i.'">
								 '.$tab[0].'&nbsp;&nbsp;-&nbsp;&nbsp;Le&nbsp;'.date("d/m/Y à H:i:s",strtotime($tab[3])).'
			 				 </a>
 					</td>
 					<td width="10%">
	 						<img align="right" width="70px" src="./img/'.$tab[5].'.jpg"/>
					</td>
					</tr>
					</table>
					</div>
	 				<div id="collapse'.$i.'" class="accordion-body collapse">
	 					<div class="span11">	
							 <div class="accordion-inner">'.html_entity_decode($tab[2]).'</div>
		 				</div>
		 				<div class="span1">	
							 <div class="accordion-inner">
		 						<img src="./img/facebook.jpg"/><br/><br/>
		 						<img src="./img/google_plus.png"/><br/><br/>
		 					</div>
		 				</div>
	 				</div>
		 		</div>';
	}
		?>
		</div>
</div>
<div class="span2"></div>

</div>
		</div><!-- row  -->
		</div><!--/.fluid-container-->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src ="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<script src="./js/bootstrap.js"></script>
		<!--<script src="js/bootstrap-alert.js"></script>-->
	</body>
</html>