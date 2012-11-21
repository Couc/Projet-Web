<?php
include ('_A8s2f9g714ef.php');
include ('comment.class.php');
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
              <li class="active" ><a href="#about">Catégorie</a></li>
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
    <div class="container" id="container" style="margin-left:5%;">
    	<div class="row-fluid">
        	<div class="span9" id="span-article">
        		<?php
        		$sql_article="SELECT * FROM ARTICLE a,SOURCE s WHERE a.id_source = s.id_source AND a.id_art = ".$_GET['id_art'].";";
				$query_article=mysql_query($sql_article) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
        		 	
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
        			<span id=\"nombre_likes\" ><i style=\"margin-bottom:10px;\" class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>".$result_article['nb_like']." likes</span>
        		</div>
        		
        		<header>
        				<h1>".html_entity_decode($result_article['titre'])."</h1>
        		</header>
        		<div style=\"height:90px;\">
        				<h4>Like etc...</h4>
        		</div>
        		<article id=\"article-cat\">
        			
        				<p>".html_entity_decode($result_article['contenu'])."</p>
        				<a>Source <i class=\"icon-chevron-right\"></i></a>
        			
        			
        		</article>";
						
					}
        		?>
        	</div><!--span10 content -->	
        	<aside class="span3" id="scroll-cat-art" >
        		
        		<hr>
	        	<div id="comment_general">
					<div id="addCommentContainer">
						<?php
						$query_comment = mysql_query("SELECT * FROM commentaires WHERE id_art=".$_GET['id_art'].";") or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br> Dans la requete".$sql."\n");;
			
							while($result_comment = mysql_fetch_assoc($query_comment))				
							{
								$annee = substr($result_comment['date'],0,4);
								$mois = substr($result_comment['date'],4,2);
								$jour = substr($result_comment['date'],6,2);
											
			    				echo '
						<div class="comment">
							<div class="name">'.$result_comment['nom'].'</div>
							<div class="date">'.$jour.' '.date("F",mktime($mois)).' '.$annee.'</div>
							<p>'.$result_comment['body'].'</p>
						</div>';
							}
						?>
					    <p>Add a Comment</p>
					    <form id="addCommentForm" method="post" action="">
					        <div>
					            <label for="name">Your Name</label>
					            <input type="text" name="name" id="name" />
					
					            <label for="email">Your Email</label>
					            <input type="text" name="email" id="email" />
					
					
					            <label for="body">Comment Body</label>
					            <textarea name="body" id="body" cols="20" rows="5"></textarea>
					
					            <input type="reset" id="submit" value="Submit" onclick="Change();"/>
					            <?php
					            echo "<input type=\"hidden\" id=\"id_art\" value=".$_GET['id_art']." />";
								
								?>
					            
					        </div>
	    				</form>
					</div>
				</div>
        	</aside>
        
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


   
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
   
    
   <script type="text/javascript">
   
	window.onscroll = function() {
	    var scroll = (document.documentElement.scrollTop ||
	        document.body.scrollTop);
	        
	    if(scroll>100){
	        document.getElementById('scroll-cat-art').style.top = scroll+'px';
	   	    
	       }
	    if(scroll > document.documentElement.scrollHeight - 730)
	    {	
	    	document.getElementById('scroll-cat-art').style.top= document.documentElement.scrollHeight - 730 +'px';
	    }
	}
</script>

<script type="text/javascript">
	function Change()
			{	
			
			var name = document.getElementById('name').value;
        	var email = document.getElementById('email').value;
        	var body = document.getElementById('body').value;
        	var id_art = document.getElementById('id_art').value;
        	
            xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("comment_general").innerHTML+=xmlhttp.responseText;
                        
                    }
            }
            xmlhttp.open("GET","submit.php?name="+name+"&email="+email+"&body="+body+"&id_art="+id_art,true);
            xmlhttp.send();
		}
</script>

  
	</body>
</html>