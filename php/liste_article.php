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
    <link href="../css/style_comment.css" rel="stylesheet">
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
              <li class="active"><a href="../index.php">Home</a></li>
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

<div class="span8" style="margin-left:20px;">
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
echo ('<input type="hidden" class="id_source" value="'.$id_src.'"/>');

	$sql = "SELECT * FROM ARTICLE WHERE id_source IN (".$id_src.") ORDER BY DATE DESC LIMIT 20;";
	//exécution de notre requête SQL:
	$query = mysql_query($sql) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br> Dans la requete".$sql."\n");
	//récupération avec mysql_fetch_array() et affichage du résultat :
	$i=0;
	$j=0;
	while ($result = mysql_fetch_assoc($query)) {
		$i++;
		echo '	<div class="accordion-group" id="'.$result['date'].'">
		 			<div class="accordion-heading">
		 			<table width="100%">
		 			<tr>
		 			<td width="90%">
							 <a onclick="def_art(this);" id="'.$result['id_art'].'" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$i.'">
								 '.$result['titre'].'&nbsp;&nbsp;-&nbsp;&nbsp;Le&nbsp;'.$result['date'].'
			 				 </a>
 					</td>
 					<td width="10%">
	 						<img align="right" width="35px" src="../img/'.$result['id_source'].'.jpg"/>
					</td>
					</tr>
					</table>
					</div>
	 				<div id="collapse'.$i.'" class="accordion-body collapse">
	 					<div class="span11">	
							 <div class="accordion-inner"><div class="span11">'.htmlspecialchars_decode($result['contenu']).'</div>
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
echo'<input type="hidden" class="increment" value="'.$i.'"/>';
		?>
		</div>
</div>
<div class="span3 hidden-phone" style="margin-left:20px;">
	<div id="comment_general">
		
	</div>
	<div id="addCommentContainer" style="display: none;">
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
            <input type="hidden" id="id_art" value="" onchange="id_article();" />
        </div>
    </form>
</div>


</div>
		</div><!-- row  -->
		</div><!--/.fluid-container-->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src ="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script type='text/javascript'>
			    
			
		</script>
		<!--<script src="js/bootstrap-alert.js"></script>-->
		<script type="text/javascript">
		var id_temp=0;
		function id_article(){
		
		var id_art = document.getElementById('id_art').value;
		
		xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("comment_general").innerHTML+=xmlhttp.responseText;
                        
                    }
            }
            xmlhttp.open("GET","liste_comment.php?id_art="+id_art,true);
            xmlhttp.send();
		}
		
		
		function def_art(obj){
			var id;
			id=obj.id;
			document.getElementById('id_art').value = id;
			
			if(id_temp!= id)
			{
				document.getElementById('comment_general').innerHTML="";
				document.getElementById('id_art').onchange();
				document.getElementById('addCommentContainer').style.display="block";
				document.getElementById('comment_general').style.display="block";
				id_temp=id;
			}
			else
			{
				document.getElementById('comment_general').innerHTML="";
				document.getElementById('addCommentContainer').style.display="none";
				document.getElementById('comment_general').style.display="none";
				id_temp=0;
			}
			
		}

			
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
		<script type="text/javascript">
 
$(document).ready(function(){ // Quand le document est complètement chargé
 
	var load = false; // aucun chargement de commentaire n'est en cours
 
	/* la fonction offset permet de récupérer la valeur X et Y d'un élément
	dans une page. Ici on récupère la position du dernier div qui 
	a pour classe : ".commentaire" */
	var offset = $('.accordion-group:last').offset(); 
 
	$(window).scroll(function(){ // On surveille l'évènement scroll
 
		/* Si l'élément offset est en bas de scroll, si aucun chargement 
		n'est en cours, si le nombre de commentaire affiché est supérieur 
		à 5 et si tout les commentaires ne sont pas affichés, alors on 
		lance la fonction. */
		if((offset.top-$(window).height() <= $(window).scrollTop()) 
		&& load==false && ($('.accordion-group').size()>=5) && 
		($('.accordion-group').size()!=$('.nb_com').text())){
 
			// la valeur passe à vrai, on va charger
			load = true;
 
			//On récupère l'id du dernier commentaire affiché
			var last_id = $('.accordion-group:last').attr('id');
			var idsrc = $('.id_source').attr('value');
			var i = $('.increment').attr('value');
 
			//On affiche un loader
			$('.loadmore').show();
 
			//On lance la fonction ajax
			$.ajax({
				url: './article_ajax.php',
				type: 'get',
				data: 'last='+last_id+'&idsrc='+idsrc+'&increment='+i,
 
				//Succès de la requête
				success: function(data) {
 
					//On masque le loader
					$('.loadmore').fadeOut(500);
					/* On affiche le résultat après
					le dernier commentaire */
					$('.accordion-group:last').after(data);
					/* On actualise la valeur offset
					du dernier commentaire */
					$('.increment').val(parseInt(i)+20);
					offset = $('.accordion-group:last').offset();
					//On remet la valeur à faux car c'est fini
					load = false;
				}
			});
		}
 
 
	});
 
});
 
</script>
		
	</body>
</html>