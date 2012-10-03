<?php
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
    
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
   <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
   
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><img src="img/logo blanc.png" alt=""/></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="row-fluid">
<div class="span2"></div>
<div class="span8">
<div class="accordion" id="accordion2">
    <?php
//Connexion à la base


//recuperation des paramêtres :
		//Categorie
		//login (si existant)

		
//Lecture de la table categorie
	//Si la derniere maj est plus vieille que 10min,
		//apelle maj_rss($categorie);
//lecture de la table article avec cette catégorie (jointure categorie -> source)
		//Si login existant, prendre les liens choisit par l'utilisateur (tous par défault)

	//Construction de la liste
	
	//fin de script;



//Fonction maj_rss($categorie)
	//Select de chaque source de la categorie à mettre à jour
	//pour chaque source :
		//Recuperer le fichier flux.xml
		//le parser
		//ajouter chaque news dans la table
		
	//mettre à jour la date_maj dans categorie
	//sa irais mieux en JAVA !!!
//fin de fonction



//Comment gerer les 'articles favoris' : fonction php ? ( comment l'apellé?) autre page ne generant aucun affichage ? + javascript ( etoile qui devient jaune ou autre....)

$sql = "SELECT * FROM SOURCE WHERE id_cat=".$_GET['id'].";";
//exécution de notre requête SQL:
$query = mysql_query($sql) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
//récupération avec mysql_fetch_array() et affichage du résultat :
$id_src="";
$sepa=", ";
$i=0;
while ($result = mysql_fetch_assoc($query)) {
	if($i==0){
		$id_src=$result['id_source'];
	}
	else{
		$id_src=$id_src."".$sepa."".$result['id_source'];
	}
	$i++;
}
if(strlen($id_src)>2){
	$id_src=substr($id_src, 0,strlen($id_src)-2);
}
	$sql = "SELECT * FROM ARTICLE WHERE id_source IN (".$id_src.") ORDER BY DATE DESC;";
	//exécution de notre requête SQL:
	$query = mysql_query($sql) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br> Dans la requete".$sql."\n");
	//récupération avec mysql_fetch_array() et affichage du résultat :
	while ($result = mysql_fetch_assoc($query)) {
		$i++;
		echo '	<div class="accordion-group">
		 			<div class="accordion-heading">
		 			<table width="100%">
		 			<tr>
		 			<td width="90%">
							 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$i.'">
								 '.$result['titre'].'&nbsp;&nbsp;-&nbsp;&nbsp;Le&nbsp;'.$result['date'].'
			 				 </a>
 					</td>
 					<td width="10%">
	 						<img align="right" width="70px" src="../img/'.$result['id_source'].'.jpg"/>
					</td>
					</tr>
					</table>
					</div>
	 				<div id="collapse'.$i.'" class="accordion-body collapse">
	 					<div class="span11">	
							 <div class="accordion-inner"><div class="span11">'.html_entity_decode($result['contenu']).'</div>
		 					</div>
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
		<script src="../js/bootstrap.js"></script>
		<!--<script src="js/bootstrap-alert.js"></script>-->
	</body>
</html>