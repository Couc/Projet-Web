<?php
include ('php/_A8s2f9g714ef.php');
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/responsiveslides.css" />
    <style type="text/css">
      body {
        padding-top: 60px;
        
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
      <div class="navbar navbar-inverse navbar-fixed-top">
    	
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
              <li class="active"><a href="index.php">Accueil</a></li>
              <li><a href="php/liste_article.php">Catégorie</a></li>
              <li><a href="#contact">A propos</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav pull-right">
              <a href="php/login.php" class="btn btn-primary"><i class="icon-user icon-white"></i>  Se connecter</a>
              
            </ul>
           </div><!--/.nav-collapse -->
           
        </div>
      </div>
    </div>

	  <!--<div class="hero-unit hidden-phone">
	  	<div class="container">
	  		
		  		<div class="texte" style="float:left;">
		        <h1>Incroyablement simple<br> et intuitif,<br>toutes vos news<br> à portée de clic</h1>
		       
		        <p><a class="btn btn-primary btn-large">S'inscrire &raquo;</a></p>
		        </div>
		        <div class="image-hero hidden-phone hidden-tablet">
		        	<img src="img/visual1.png" alt="image" style="opacity: 0.7;"/>
		        </div>
	       
       </div>
   </div>-->
    <div class="container">
    	
      <div class="row-fluid">
      	
      	<div class="span12" id="div-slider">
      		
        	<div class="slider_control" style="width:100%;">
        		<h3 class="drapeau">
        			<span>Les articles les plus aimés</span>
        		</h3>
        		
        	</div>
        	
        	<div class="slider_content" style="width:100%;">
        		 <ul class="rslides" id="slider2" style="width:100%;">
        		 	<?php
        		 	$sql_article="SELECT * FROM ARTICLE a, SOURCE s WHERE a.id_source = s.id_source ORDER BY a.id_art LIMIT 5;";
					$query_article = mysql_query($sql_article) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
					
					
					while($result_article=mysql_fetch_assoc($query_article)){
						$annee = substr($result_article['date'],0,4);
						$mois = substr($result_article['date'],4,2);
						$jour = substr($result_article['date'],6,2);
						$heure = substr($result_article['date'],8,2);
						$minutes = substr($result_article['date'],10,2);
						echo"<li class=\"article-accueil-slide\" style=\"float:left;position:relative;list-style-type:none;\">
        				        		
			        		<div id=\"info-post-accueil\">
			        			<i class=\"icon-calendar\" id=\"icone-accueil\"></i><date>".date("D d M Y",mktime(0,0,0,$mois,$jour,$annee))."</date>
			        			<br>
			        			<span id=\"author\" ><i class=\"icon-user\" id=\"icone-accueil\"></i>".$result_article['libelle']."</span>
			        			<br>";
								
								switch($result_article['id_cat']){
									case 1:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Politique</span>";
										break;
									case 2:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>High-Tech</span>";
										break;
									case 3:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Sport</span>";
										break;
									case 4:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Economie</span>";
										break;
									case 5:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>People</span>";
										break;
								}
			        			
			        			echo"<br>
			        			<span id=\"nombre_commentaire\" ><i class=\"icon-comment\" id=\"icone-accueil\"></i>".$result_article['nb_comment']." comments</span>
			        			<br>
        						<span id=\"nombre_likes\" ><i class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>".$result_article['nb_like']." likes</span>
			        		</div>
			        		<div id=\"post-accueil\">
			        			<header>
			        				<h4>".html_entity_decode($result_article['titre'])."</h4>
			        			</header>
			        			
			        			<div id=\"article\">
			        				<p>".html_entity_decode($result_article['description'])."</p>
			        				<a href=\"php/article.php?id_art=".$result_article['id_art']."\">Read more<i class=\"icon-chevron-right\"></i></a>
			        				
			        				<div id=\"info-post-tablet\">	
		        						<i class=\"icon-calendar\" id=\"icone-accueil-tablet-first\"></i><date style=\"float:left;\">".date("D d M Y",mktime(0,0,0,$mois,$jour,$annee))."</date>
					        			
					        			<span id=\"author\" id=\"icone-accueil-tablet\"><i class=\"icon-user\" style=\"margin-right:4px;\"></i>".$result_article['libelle']."</span>";
					        			
					        			switch($result_article['id_cat']){
											case 1:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Politique</span>";
												break;
											case 2:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>High-Tech</span>";
												break;
											case 3:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Sport</span>";
												break;
											case 4:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Economie</span>";
												break;
											case 5:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>People</span>";
												break;
										}
					        			echo "<span id=\"nombre_commentaire\" id=\"icone-accueil-tablet\"><i class=\"icon-comment\" style=\"margin-right:4px;\"></i>".$result_article['nb_comment']." comments</span>
					        			
					        			<span id=\"nombre_likes\" id=\"icone-accueil-tablet-last\"><i class=\"icon-thumbs-up\" style=\"margin-right:4px;\"></i>".$result_article['nb_like']." likes</span>
        							</div>
        							
			        			</div>
			        			
			        		</div>
			        
        			</li>";
					}
        		 	?>
    					
        		</ul>
        	</div>
        </div>
       
        <div class="span10">
        	<div class="span10" id="span-article">
        		<div class="slider_control">
	        		<h3 class="drapeau">
	        			<span>A la une</span>
	        		</h3>
	        		
        		</div>
        		
        		<?php
        		$sql_article="SELECT * FROM ARTICLE a, SOURCE s WHERE a.id_source = s.id_source ORDER BY a.id_art LIMIT 30;";
				$query_article=mysql_query($sql_article) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
        		 	
					while($result_article=mysql_fetch_assoc($query_article)){
						
						$annee = substr($result_article['date'],0,4);
						$mois = substr($result_article['date'],4,2);
						$jour = substr($result_article['date'],6,2);
						$heure = substr($result_article['date'],8,2);
						$minutes = substr($result_article['date'],10,2);
						
						echo"<article id=\"article-accueil\">
        		
        		<div id=\"info-post-accueil\" >
        			<i class=\"icon-calendar\" id=\"icone-accueil\" ></i><date>".date("D d M Y",mktime(0,0,0,$mois,$jour,$annee))."</date>
        			<br>
        			<span id=\"author\" ><i class=\"icon-user\" id=\"icone-accueil\" ></i>".$result_article['libelle']."</span>
        			<br>";
					
        			switch($result_article['id_cat']){
									case 1:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Politique</span>";
										break;
									case 2:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>High-Tech</span>";
										break;
									case 3:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Sport</span>";
										break;
									case 4:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>Economie</span>";
										break;
									case 5:
										echo"<span id=\"categorie\" ><i class=\"icon-tasks\" id=\"icone-accueil\"></i>People</span>";
										break;
								}
        			echo"<br><span id=\"nombre_commentaire\" ><i class=\"icon-comment\" id=\"icone-accueil\" ></i>".$result_article['nb_comment']." comments</span>
        			<br>
        			<span id=\"nombre_likes\" ><i class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>".$result_article['nb_like']." likes</span>
        		</div>
        		<div id=\"post-accueil\">
        			<header>
        				<h4>".html_entity_decode($result_article['titre'])."</h4>
        			</header>
        			
        			<div id=\"article\">
        				<p>".html_entity_decode($result_article['description'])."</p>
        				<div id=\"info-post-tablet\">	
        						<i class=\"icon-calendar\" id=\"icone-accueil-tablet-first\"></i><date style=\"float:left;\">".date("D d M Y",mktime(0,0,0,$mois,$jour,$annee))."</date>
			        			
			        			<span id=\"author\" id=\"icone-accueil-tablet\" ><i class=\"icon-user\" style=\"margin-right:4px;\"></i>".$result_article['libelle']."</span>";
					        			
					        			switch($result_article['id_cat']){
											case 1:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Politique</span>";
												break;
											case 2:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>High-Tech</span>";
												break;
											case 3:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Sport</span>";
												break;
											case 4:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Economie</span>";
												break;
											case 5:
												echo "<span id=\"categorie\" id=\"icone-accueil-tablet\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>People</span>";
												break;
										}
					        			echo "<span id=\"nombre_commentaire\" id=\"icone-accueil-tablet\"><i class=\"icon-comment\" style=\"margin-right:4px;\"></i>".$result_article['nb_comment']." comments</span>
			        			
			        			<span id=\"nombre_likes\" id=\"icone-accueil-tablet-last\"><i class=\"icon-thumbs-up\" style=\"margin-right:4px;\"></i>".$result_article['nb_like']." likes</span>
        				</div>
        				<a href=\"php/article.php?id_art=".$result_article['id_art']."\">Read more<i class=\"icon-chevron-right\"></i></a>
        			</div>
        			
        		</div>
        		
        	</article>";
						
					}
        		?>
        	        	
        	        	
        	</div><!--span10 des articles-->
        	<aside class="span2" id="scroll" >
        		<form class="form-search" >
				  <div class="input-append" >
				    <input type="text" class="span2 search-query" style="width:150px;margin-bottom:20px;">
				    <button type="submit" class="btn">Search</button>
				  </div>
				 </form>
				 <div style="width:150px;text-align:center;">
	        		<h4>Catégorie</h4>
	        		<br>
	        		<a href="php/liste_article.php?id_cat=0">A la une</a>
	        		<hr style="margin-bottom:4px;">
	        		<a href="php/liste_article.php?id_cat=2">High-Tech</a>
	        		<hr style="margin-bottom:4px;">
	        		<a href="php/liste_article.php?id_cat=3">Sport</a>
	        		<hr style="margin-bottom:4px;">
	        		<a href="php/liste_article.php?id_cat=1">Politique</a>
	        		<hr style="margin-bottom:4px;">
	        		<a href="php/liste_article.php?id_cat=4">Economie</a>
	        		<hr style="margin-bottom:4px;">
	        		<a href="php/liste_article.php?id_cat=0">People</a>
	        	</div>
        	</aside>
        </div><!--span10 content -->
        
      </div>

      

    </div> <!-- /container -->
    
	<div id="extra" style="background-color:#222;border-top:1px solid;color:white;padding:20px;margin-top:20px;">
	
	<div class="inner">
		
		<div class="container">
			
			<div class="row-fluid">
				
				<div class="span3">
					
					<h3><span class="slash">>></span></span> About Us</h3>
					
					<p>ENEW est un site créé par 2 étudiants en licence informatique a l'IUT de Belfort.<br>Ce site a pour but de centraliser toutes vos news.</p>
					
				</div> <!-- /span4 -->
				
				
				<div class="span3 offset1">
					
					<h3><span class="slash">>></span> Explore</h3>				
					
					<ul class="footer-links clearfix">
						<li><a href="/" style="text-decoration: none;color:#777;list-style:none;">Accueil</a></li>
                        <li><a href="/themes" style="text-decoration: none;color:#777;list-style:none;">Catégories</a></li>
                        <li><a href="/faq" style="text-decoration: none;color:#777;list-style:none;">A propos</a></li>
                        
                    </ul>
					
				</div> <!-- /span3 -->
				
				
				<div class="span3">
					
										
				</div> <!-- /span3 -->
				
				
				<div class="span2">
					
					<h3><span class="slash">>></span> Social</h3>				
					
					<ul class="footer-links clearfix">
                        <li><a href="http://facebook.com/" style="text-decoration: none;color:#777;list-style:none;">Facebook</a></li>
                        <li><a href="http://twitter.com/" style="text-decoration: none;color:#777;list-style:none;">Twitter</a></li>
                    </ul>
					
				</div> <!-- /span3 -->
				
				
				
			</div> <!-- /row -->
			
		</div> <!-- /container -->
		
	</div> <!-- /inner -->
	
</div> <!-- /#extra -->



<div id="footer" style="background-color: black;color: #333;padding: 20px 0px;">
					
	<div class="inner">
	
		<div class="container">
		
			<div class="row">
				<div id="footer-copyright" class="span4">
					&copy; 2012 ENEW, all rights reserved.
				</div> <!-- /span4 -->
				
				<div id="footer-terms" class="span8">
					<p class="pull-right">Built by<a href=""  style="text-decoration: none;color:white;"> LANTERNIER Thomas & BOULACHIN Clément.</a></p>
				</div> <!-- /span8 -->
			</div> <!-- /row -->
			
		</div> <!-- /container -->
		
	</div> <!-- /inner -->
	
</div> <!-- /#footer -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    
   <script type="text/javascript">
	window.onscroll = function() {
	    var scroll = (document.documentElement.scrollTop ||
	        document.body.scrollTop);
	    if(scroll>320)
	        document.getElementById('scroll').style.top = scroll+'px';
	    if(scroll > document.documentElement.scrollHeight - 730)
	    {	
	    	document.getElementById('scroll').style.top= document.documentElement.scrollHeight - 730 +'px';
	    }
	}
</script>
<script src="js/responsiveslides.js"></script>
  <script>
    $(function () {

        // Slideshow 2
      $("#slider2").responsiveSlides({
        auto: false,
        pager: true,
        speed: 300,
        maxwidth: 1000
      });

     
    });
  </script>
  </body>
</html>
