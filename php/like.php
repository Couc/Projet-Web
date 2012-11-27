<?php

include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");

	
	if($_GET['type']=="like"){
		$query_dejalike = mysql_query("SELECT * FROM ARTICLE_FAV WHERE login = '".$_GET['login']."' and id_art = ".$_GET['id_art'].";");
		 
		
		if(mysql_num_rows($query_dejalike)==0){
			
			mysql_query(" UPDATE ARTICLE SET nb_like = nb_like + 1 WHERE id_art = ".$_GET['id_art'].";");
			
			mysql_query("INSERT INTO ARTICLE_FAV(login,id_art) VALUES('".$_GET['login']."',".$_GET['id_art'].");");
		}
		else{
			echo "dejalike";
		}
		
	}
	else if($_GET['type']=="dislike"){
		
		mysql_query(" UPDATE ARTICLE SET nb_like = nb_like - 1 WHERE id_art = ".$_GET['id_art'].";");
		
		$query = mysql_query("SELECT * FROM ARTICLE_FAV where login = '".$_GET['login']."';");
		
		if(mysql_num_rows($query)!=0){
		
			mysql_query("DELETE FROM ARTICLE_FAV WHERE login = '".$_GET['login']."' and id_art = '".$_GET['id_art']."' ;");
			
		}
	
	}
	?>