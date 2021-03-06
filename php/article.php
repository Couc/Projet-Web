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
    		<div id="like" class="alert alert-success" style="display:none;">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <h4>Cet article est maintenant enregistré dans votre espace personnel sous la section "Like"</h4>
				 
				</div>
				
        	<div id="span-article" style="background-color: white;padding:10px;">
        		
        		<?php
        	if(!empty($_GET['id_art']))
			{
        		$sql_article="SELECT * FROM ARTICLE a,SOURCE s WHERE a.id_source = s.id_source AND a.id_art = ".$_GET['id_art'].";";
				$query_article=mysql_query($sql_article) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
        		 
        		 if(mysql_num_rows($query_article)!=0){
        		 	
					while($result_article=mysql_fetch_assoc($query_article)){
						$annee = substr($result_article['date'],0,4);
						$mois = substr($result_article['date'],4,2);
						$jour = substr($result_article['date'],6,2);
						$heure = substr($result_article['date'],8,2);
						$minutes = substr($result_article['date'],10,2);
						
						echo"
        		
        		<div id=\"info-post-accueil\" style=\"margin-right:5%;font-size:17px;border-right:1px solid #333;border-bottom:1px solid #333;padding:30px;\">
        			<i class=\"icon-calendar\" id=\"icone-accueil\" style=\"margin-bottom:10px;\"></i><date>".date("D d M Y",mktime(0,0,0,$mois,$jour,$annee))."</date>
        			<br>
        			<span id=\"author\" ><i style=\"margin-bottom:10px;\" class=\"icon-user\" id=\"icone-accueil\" ></i>".$result_article['libelle']."</span>
        			<br>";
        			switch($result_article['id_cat']){
									case 1:
										echo"<span id=\"categorie\" ><i style=\"margin-bottom:10px;\" class=\"icon-tasks\" id=\"icone-accueil\"></i>Politique</span>";
										break;
									case 2:
										echo"<span id=\"categorie\" ><i style=\"margin-bottom:10px;\" class=\"icon-tasks\" id=\"icone-accueil\"></i>High-Tech</span>";
										break;
									case 3:
										echo"<span id=\"categorie\" ><i style=\"margin-bottom:10px;\" class=\"icon-tasks\" id=\"icone-accueil\"></i>Sport</span>";
										break;
									case 4:
										echo"<span id=\"categorie\" ><i style=\"margin-bottom:10px;\" class=\"icon-tasks\" id=\"icone-accueil\"></i>Economie</span>";
										break;
									case 5:
										echo"<span id=\"categorie\" ><i style=\"margin-bottom:10px;\" class=\"icon-tasks\" id=\"icone-accueil\"></i>People</span>";
										break;
								}
        			echo"<br>
        			<span id=\"nombre_commentaire\" ><i style=\"margin-bottom:10px;\" class=\"icon-comment\" id=\"icone-accueil\" ></i>".$result_article['nb_comment']." comments</span>
        			<br>
        			<span id=\"nombre_likes\"><i style=\"margin-bottom:10px;\" class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>".$result_article['nb_like']." likes</span>
        		</div>
        		
        		
      
        		<header style=\"margin-top:70px;margin-bottom:90px;\">
        				<h1>".html_entity_decode($result_article['titre'])."</h1>
        		</header>
        		<div id=\"info-post-tablet\" style=\"padding:10px;height:120px;border-top:1px solid #C2C2C2;border-bottom:1px solid #C2C2C2;font-size:16px;\">	
        						<i class=\"icon-calendar\" id=\"icone-accueil-tablet-first\" style=\"margin-left:20px;\"></i><date style=\"float:left;\">".date("D d M Y",mktime(0,0,0,$mois,$jour,$annee))."</date>
			        			<br>
			        			<span id=\"author\" id=\"icone-accueil-tablet\" style=\"margin-left:20px;\"><i class=\"icon-user\" style=\"margin-right:4px;\"></i>".$result_article['libelle']."</span>";
			        			
			        			switch($result_article['id_cat']){
											case 1:
												echo "<br><span id=\"categorie\" id=\"icone-accueil-tablet\" style=\"margin-left:20px;\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Politique</span>";
												break;
											case 2:
												echo "<br><span id=\"categorie\" id=\"icone-accueil-tablet\" style=\"margin-left:20px;\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>High-Tech</span>";
												break;
											case 3:
												echo "<br><span id=\"categorie\" id=\"icone-accueil-tablet\" style=\"margin-left:20px;\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Sport</span>";
												break;
											case 4:
												echo "<br><span id=\"categorie\" id=\"icone-accueil-tablet\" style=\"margin-left:20px;\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>Economie</span>";
												break;
											case 5:
												echo "<br><span id=\"categorie\" id=\"icone-accueil-tablet\" style=\"margin-left:20px;\"><i class=\"icon-tasks\" style=\"margin-right:4px;\"></i>People</span>";
												break;
										}
			        			
			        			echo "<br><span id=\"nombre_commentaire\" id=\"icone-accueil-tablet\" style=\"margin-left:20px;\"><i class=\"icon-comment\" style=\"margin-right:4px;\"></i>".$result_article['nb_comment']." comments</span>
			        			
			        			<br><span id=\"nombre_likes\" id=\"icone-accueil-tablet-last\" style=\"margin-left:20px;\"><i class=\"icon-thumbs-up\" style=\"margin-right:4px;\"></i>".$result_article['nb_like']." likes</span>
        				</div>
        		<article id=\"article-cat\">
        			
        				<p>".html_entity_decode($result_article['contenu'])."</p>
        				<a target=\"_blank\" href=".$result_article['link'].">Source <i class=\"icon-chevron-right\"></i></a>
        			
        			
        		</article>";
						
					}

			}
else{
	echo "<div class=\"container\" id=\"container\" style=\"margin-left:5%;min-height: 460px;\">
		    	<div class=\"row-fluid\">
		    		<div class=\"span9\" id=\"span-article\" style=\"padding:10px;\">
		    			
		    			<h1 style=\"margin-top:20%;\">404 ERROR, l'article auquel vous essayez d'accèder n'existe pas !!</h1>
		    			
		    		</div>
		    	</div>
    	
    	 </div>";
}

}
else{
	echo "<div class=\"container\" id=\"container\" style=\"margin-left:5%;min-height: 460px;\">
		    	<div class=\"row-fluid\">
		    		<div class=\"span9\" id=\"span-article\" style=\"padding:10px;\">
		    			
		    			<h1 style=\"margin-top:20%;\">404 ERROR, l'article auquel vous essayez d'accèder n'existe pas !!</h1>
		    			
		    		</div>
		    	</div>
    	
    	 </div>";
}

        		?>
        		
        	</div><!--span10 content -->
        	
        	<aside class="span3" id="scroll-cat-art" style="margin-top:0px;">
	        		<div id="addCommentContainer" style="margin-bottom:50px;width:242px;height:100px;padding:0px;">
	        			<?php
	        		if(!empty($_GET['id_art'])){
	        			
	        			if(isset($_SESSION['user'])){
	        			$query_like = mysql_query("SELECT * FROM ARTICLE_FAV WHERE login = '".$_SESSION['user']."' and id_art = ".$_GET['id_art'].";");
						$query_dislike = mysql_query("SELECT * FROM ARTICLE_DISLIKE WHERE login = '".$_SESSION['user']."' and id_art = ".$_GET['id_art'].";");
						$query_nb_like = mysql_query("SELECT nb_like FROM ARTICLE WHERE id_art = ".$_GET['id_art'].";");
						$result_nb_like = mysql_fetch_assoc($query_nb_like);
						if(mysql_num_rows($query_like)!=0)
						{
			        			echo "<div id=\"like_div\" style=\"margin-bottom:10px;border-bottom:1px solid #C2C2C2;\">
		        					<img onclick =\"like_base(".$result_nb_like['nb_like'].");\" id=\"like_button\" src=\"../img/smile_yellow.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;
		-moz-border-radius-topleft: 10px;
		border-top-left-radius: 10px;\"/>
		        					<img onclick =\"dislike_base(".$result_nb_like['nb_like'].");\" id=\"dislike_button\" src=\"../img/no_smile.png\" style=\"-webkit-border-top-right-radius: 10px;
		-moz-border-radius-topright: 10px;
		border-top-right-radius: 10px;\"/>
		        				</div>";
						}
						else if(mysql_num_rows($query_dislike)!=0){
							
							echo "<div id=\"like_div\" style=\"margin-bottom:10px;border-bottom:1px solid #C2C2C2;\">
		        					<img onclick =\"like_base(".$result_nb_like['nb_like'].");\" id=\"like_button\" src=\"../img/smile.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;
		-moz-border-radius-topleft: 10px;
		border-top-left-radius: 10px;\"/>
		        					<img onclick =\"dislike_base(".$result_nb_like['nb_like'].");\" id=\"dislike_button\" src=\"../img/no_smile_yellow.png\" style=\"-webkit-border-top-right-radius: 10px;
		-moz-border-radius-topright: 10px;
		border-top-right-radius: 10px;\"/>
		        				</div>";
						}else{
							
							echo "<div id=\"like_div\" style=\"margin-bottom:10px;border-bottom:1px solid #C2C2C2;\">
		        					<img onclick =\"like_base(".$result_nb_like['nb_like'].");\" id=\"like_button\" src=\"../img/smile.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;
		-moz-border-radius-topleft: 10px;
		border-top-left-radius: 10px;\"/>
		        					<img onclick =\"dislike_base(".$result_nb_like['nb_like'].");\" id=\"dislike_button\" src=\"../img/no_smile.png\" style=\"-webkit-border-top-right-radius: 10px;
		-moz-border-radius-topright: 10px;
		border-top-right-radius: 10px;\"/>
		        				</div>";
						}
						
						}
else {
	echo "<div id=\"like_div\" style=\"margin-bottom:10px;border-bottom:1px solid #C2C2C2;\">
		        					<a href=\"#myModal\" role=\"button\" data-toggle=\"modal\"><img id=\"like_button\" src=\"../img/smile.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;
		-moz-border-radius-topleft: 10px;
		border-top-left-radius: 10px;\"/></a>
		        					<a href=\"#myModal\" role=\"button\" data-toggle=\"modal\"><img  id=\"dislike_button\" src=\"../img/no_smile.png\" style=\"-webkit-border-top-right-radius: 10px;
		-moz-border-radius-topright: 10px;
		border-top-right-radius: 10px;\"/>
		        				</div></a>";
}


}
else {
	echo "<div id=\"like_div\" style=\"margin-bottom:10px;border-bottom:1px solid #C2C2C2;\">
		        					<img onclick =\"like_base();\" id=\"like_button\" src=\"../img/smile.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;
		-moz-border-radius-topleft: 10px;
		border-top-left-radius: 10px;\"/>
		        					<img onclick =\"dislike_base();\" id=\"dislike_button\" src=\"../img/no_smile.png\" style=\"-webkit-border-top-right-radius: 10px;
		-moz-border-radius-topright: 10px;
		border-top-right-radius: 10px;\"/>
		        				</div>";
}

	
        				?>
        			
        				<div id="partage" style="margin-left:20px;">
			        		<span style="float:left;margin-right:10px;">
			        			<a name="fb_share" type="button_count" expr:share_url='data:post.url' href="http://www.facebook.com/sharer.php">Partager</a>
			        		</span>
			        		<span style="">
			        			<a  href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="TWITTER-USERNAME">Tweet</a>
			        		</span>
			        		
		        		</div>
	        		</div>
        		<div id="comment_general">
        			<div id="addCommentContainer">
					    <p>Add a Comment</p>
					    <form id="addCommentForm" method="post" action="">
					        <div>
					            				
					            <label for="body">Comment Body</label>
					            <textarea name="body" id="body" cols="20" rows="5"></textarea>
					 <?php
					 			if(isset($_SESSION['user'])){
						            echo"<input type=\"reset\" id=\"submit\" value=\"Submit\" onclick=\"Change();\"/>";
						           
						            echo "<input type=\"hidden\" id=\"id_art\" value=".$_GET['id_art']." />";
									echo "<input type=\"hidden\" id=\"login\" value=".$_SESSION['user']." />";
								}
								else {
									
									echo"<a href=\"#myModal\" role=\"button\" data-toggle=\"modal\"><input type=\"reset\" id=\"submit\" value=\"Submit\"/></a>";
										
									}
								
								?>
					            
					        </div>
	    				</form>
	    				
					</div>
					<?php
					if(!empty($_GET['id_art']))
					{
						$query_comment = mysql_query("SELECT * FROM commentaires WHERE id_art=".$_GET['id_art'].";") or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br> Dans la requete".$sql."\n");;
			
							while($result_comment = mysql_fetch_assoc($query_comment))				
							{
								$annee = substr($result_comment['date'],0,4);
								$mois = substr($result_comment['date'],4,2);
								$jour = substr($result_comment['date'],6,2);
											
			    				echo '
						<div class="comment">
							<div class="name">'.$result_comment['login'].'</div>
							<div class="date">'.$jour.' '.date("F",mktime($mois)).' '.$annee.'</div>
							<p>'.$result_comment['body'].'</p>
						</div>';
							}
					}
						?>
				</div>
        	</aside>
        
     </div><!--row-fluid-->
    </div> <!-- /container -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Connectez-Vous !</h3>
		  </div>
		  <div class="modal-body">
		    <form style='text-align:left;' action='connexion.php' method='POST'>
						<label style='float:left;width:45%;margin-right:30px;'>Login</label>
						<input style='float:left;' type='text' name='username' required placeholder='username'/>
						<label style='float:left;width:45%;margin-right:30px;'>Mot de passe</label>
						<input style='float:left;' type='password' name='password' required placeholder='password'/>
						<?php 
						if(!empty($_GET['id_art'])){
						echo "<input type=\"hidden\" name=\"id_art\" value=".$_GET['id_art'].">"; 
						}
						?>
				
		  </div>
		  <div class="modal-footer">
		    <p style="width:300px;float:left;">Pour pouvoir profitez de toutes nos fonctionnalitées, il faut que vous vous connectiez. Si vous n'avez pas de compte c'est <a href="inscription.php">par la <i class="icon-chevron-right"></a></i></p>
		    <input type='submit' class='btn btn-primary' style="float:left;width:30%;margin-top:30px;margin-left:20px;" value="Connexion"/>
		  </div>
		  </form>
	</div>
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
						<li><a href="../index.php" style="text-decoration: none;color:#777;list-style:none;">Accueil</a></li>
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
    <script src= "http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
{lang: 'fr'}
</script>
<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script>
  

<script type="text/javascript" src="../js/article.js">
	
</script>

  
	</body>
</html>