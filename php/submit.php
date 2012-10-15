<?php

include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");


	
	mysql_query(" INSERT INTO commentaires(nom,date,email,body,id_art)
					VALUES (
						'".$_GET["name"]."',
						'".date("YmdHis")."',
						'".$_GET["email"]."',
						'".$_GET["body"]."',
						".$_GET["id_art"]."
					)");
	
	echo "
			<div class=\"comment\">
				<div class=\"name\">".$_GET["name"]."</div>
				<div class=\"date\">".date("d F Y")."</div>
				<p>".$_GET["body"]."</p>
			</div>
		";
?>