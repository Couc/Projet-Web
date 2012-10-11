<?php
include ('_A8s2f9g714ef.php');
			$query = mysql_query("SELECT * FROM commentaires WHERE id_art=".$_GET['id_art'].";") or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br> Dans la requete".$sql."\n");;
			
				while($result = mysql_fetch_assoc($query))				
				{
    				echo '
			<div class="comment">
				<div class="name">'.$result['nom'].'</div>
				<div class="date">'.date("j F Y").'</div>
				<p>'.$result['body'].'</p>
			</div>';
				}
				
?>