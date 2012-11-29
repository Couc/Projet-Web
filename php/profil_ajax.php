<?php
include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
session_start();
?>
<table class="table table-striped">
							<tr>
								<td style='text-align:center'><b>Libellé</b></td><td style='text-align:center'><b>Flux rss</b></td><td style='text-align:center'><b>Active</b></td>
							</tr>
							<?php
							$requete = 'SELECT * FROM SOURCE WHERE ID_CAT='.$_GET['id'];
							$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
							while ($result = mysql_fetch_assoc($query)) {
								echo("<tr><td>" . $result['libelle'] . "</td><td>" . $result['lien'] . "</td><td style='text-align:center'>");
								$requete2 = 'SELECT * FROM SOURCE_FAV WHERE login="'.$_SESSION['user'].'" AND id_source='.$result['id_source'].';';
								$query2 = mysql_query($requete2) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
								if($result2 = mysql_fetch_assoc($query2)) {
								
									echo("<input type='checkbox' value='".$result['id_source']."' onClick='updateSources(this)' checked='checked'/>");
									}
								else{
									echo("<input type='checkbox' value='".$result['id_source']."' onClick='updateSources(this)' />");
								}
								
								echo("</td></tr>");							}
							?>
</table>