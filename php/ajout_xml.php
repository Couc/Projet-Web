<?php
include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
session_start();

				
		if(mysql_query("INSERT INTO SOURCE(id_source,id_cat,libelle,lien) VALUES(null,".$_GET['id_cat'].",'".$_GET['libelle']."','".$_GET['source']."')")){
			
			echo "ok";
		}
		
		
								
?>
