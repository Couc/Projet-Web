<?php
include ('./_A8s2f9g714ef.php');
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
								echo("<tr><td>" . $result['libelle'] . "</td><td>" . $result['lien'] . "</td><td style='text-align:center'><input type='checkbox' checked='checked'/></td></tr>");
							}
							?>
</table>