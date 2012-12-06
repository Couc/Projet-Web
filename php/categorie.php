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
    <link rel="stylesheet" href="../css/nivo-slider.css" />
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
        	
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          
          <a class="brand" href="#"><img src="../img/logo blanc.png" alt=""/></a>
          
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="../index.php">Accueil</a></li>
              <li class="active" ><a href="categorie.php">Catégorie</a></li>
              <?php
              if(isset($_SESSION['user'])){
              	echo "<li><a href=\"liste_like.php\">Like</a></li>";
			  }
              ?>
              <li><a href="apropos.php">A propos</a></li>
              <li><a href="contact.php">Contact</a></li>
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
    		
        		<div class="span12" id="span-article" style="background-color: white;padding:10px;">
        			
        	 <div class="row-fluid">
            <ul class="thumbnails">
              <li class="span4">
                <div class="thumbnail">
                  <div class="slider-wrapper theme-default">
			            <div id="slider" class="nivoSlider">
			                <img src="../img/politique.jpg" alt="" />
			                <img src="../img/politique1.jpg" alt="" />
			                
			            </div>
			            
			      </div>
                  <div class="caption">
                    <h3>Politique</h3>
                    <p>Retrouvez toutes vos actualités Politique préférés</p>
                    <p><a href="liste_article.php?id_cat=1" class="btn btn-primary">Accéder</a> </p>
                  </div>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <div class="slider-wrapper theme-default">
			            <div id="slider2" class="nivoSlider">
			                <img src="../img/economie.jpg" alt="" />
			                <img src="../img/economie1.jpg" alt="" />
			            </div>
			            
			      </div>
                  <div class="caption">
                    <h3>Economie</h3>
                    <p>Retrouvez toutes vos actualités Economie préférés</p>
                    <p><a href="liste_article.php?id_cat=4" class="btn btn-primary">Accéder</a> </p>
                  </div>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <div class="slider-wrapper theme-default">
			            <div id="slider3" class="nivoSlider">
			                <img src="../img/techno.jpg" alt="" />
			                <img src="../img/techno1.jpg" alt="" />
			                <img src="../img/techno2.jpg" alt="" />
			                <img src="../img/techno3.jpg" alt="" />
			                <img src="../img/science.jpg" alt="" />
			                <img src="../img/science1.jpg" alt="" />
			                <img src="../img/science2.jpg" alt="" />
			            </div>
			            
			      </div>
                  <div class="caption">
                    <h3>Sciences & Tech</h3>
                    <p>Retrouvez toutes vos actualités Sciences et Technologie préférés</p>
                    <p><a href="liste_article.php?id_cat=2" class="btn btn-primary">Accéder</a> </p>
                  </div>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <div class="slider-wrapper theme-default">
			            <div id="slider4" class="nivoSlider">
			                 <img src="../img/sport.jpg" alt="" />
			                <img src="../img/sport1.jpg" alt="" />
			                <img src="../img/sport2.jpg" alt="" />
			                <img src="../img/sport3.jpg" alt="" />
			                <img src="../img/sport4.jpg" alt="" />
			                
			            </div>
			            
			      </div>
                  <div class="caption">
                    <h3>Sport</h3>
                    <p>Retrouvez toutes vos actualités Sport préférés</p>
                    <p><a href="liste_article.php?id_cat=3" class="btn btn-primary">Accéder</a> </p>
                  </div>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <div class="slider-wrapper theme-default">
			            <div id="slider5" class="nivoSlider">
			                 <img src="../img/people.jpg" alt="" />
			                <img src="../img/people1.jpg" alt="" />
			                <img src="../img/people2.jpg" alt="" />
			                <img src="../img/people3.jpg" alt="" />
			            </div>
			            
			      </div>
                  <div class="caption">
                    <h3>People</h3>
                    <p>Retrouvez toutes vos actualités People préférés</p>
                    <p><a href="liste_article.php?id_cat=5" class="btn btn-primary">Accéder</a> </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
				</div>
        	
     </div><!--row-fluid-->
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
						<li><a href="../accueil.php" style="text-decoration: none;color:#777;list-style:none;">Accueil</a></li>
                        <li><a href="categorie.php" style="text-decoration: none;color:#777;list-style:none;">Catégories</a></li>
                        <li><a href="apropos.php" style="text-decoration: none;color:#777;list-style:none;">A propos</a></li>
                        <li><a href="contact.php" style="text-decoration: none;color:#777;list-style:none;">Contact</a></li>
                        
                    </ul>
					
				</div> <!-- /span3 -->
				
				
				<div class="span3">
					
										
				</div> <!-- /span3 -->
				
				
				<div class="span2">
					
					<h3><span class="slash">>></span> Social</h3>				
					
					
                        <a href="http://facebook.com/" style="float:left;margin-right:10px;" ><img onmouseover="this.src='../img/facebook-c.png'; " onmouseout="this.src='../img/facebook.png'; " src="../img/facebook.png"/></a>
                        <a href="http://twitter.com/" style="float:left;margin-right:10px;"><img onmouseover="this.src='../img/twitter-c.png'; " onmouseout="this.src='../img/twitter.png'; " src="../img/twitter.png"/></a>
                    	<a href="http://google.com/" style="float:left;"><img onmouseover="this.src='../img/google-c.png'; " onmouseout="this.src='../img/google.png'; " src="../img/google.png"/></a>
					
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


   
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.nivo.slider.js"></script>
    <script src= "http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
{lang: 'fr'}
</script>
<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script>
  

<script type="text/javascript" src="../js/article.js"></script>
 <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    $(window).load(function() {
        $('#slider2').nivoSlider();
    });
    $(window).load(function() {
        $('#slider3').nivoSlider();
    });
    $(window).load(function() {
        $('#slider4').nivoSlider();
    });
    $(window).load(function() {
        $('#slider5').nivoSlider();
    });
    </script>

  
	</body>
</html>