<?php
include ('_A8s2f9g714ef.php');
			$query = mysql_query("SELECT * FROM commentaires WHERE id_art=".$_GET['id_art'].";") or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br> Dans la requete".$sql."\n");;
			
				while($result = mysql_fetch_assoc($query))				
				{
					$annee = substr($result['date'],0,4);
					$mois = substr($result['date'],4,2);
					$jour = substr($result['date'],6,2);
								
    				echo '
			<div class="comment">
				<div class="name">'.$result['login'].'</div>
				<div class="date">'.$jour.' '.date("F",mktime($mois)).' '.$annee.'</div>
				<p>'.$result['body'].'</p>
			</div>';
				}
				
?>