<?php

include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");


	
	mysql_query(" INSERT INTO commentaires(login,date,body,id_art)
					VALUES (
						'".$_GET["login"]."',
						'".date("YmdHis")."',
						'".$_GET["body"]."',
						".$_GET["id_art"]."
					)");
	
	echo "
			<div class=\"comment\">
				<div class=\"name\">".$_GET["login"]."</div>
				<div class=\"date\">".date("d F Y")."</div>
				<p>".$_GET["body"]."</p>
			</div>
		";
?>