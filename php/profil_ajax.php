<?php
include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
session_start();
?>

							<?php
							
							if($_GET['id']==9999)
							{
								$query=mysql_query("SELECT id_cat,libelle FROM CATEGORIE");
								echo"
								<div class=\"alert alert-error\" id=\"no-ok\" style=\"display:none;\">
									Error, please try again ! 
								</div>
								<div class=\"alert alert-success\" id=\"ok\" style=\"display:none;\">
									Votre source à bien été ajoutée 
								</div>
								<p>
										<h3 style='margin-bottom:30px;'>Ajouter votre source d'informations</h3>
									  </p>
									  <p>Cette source doit être de la forme 'www.lemonde.fr/rss/tag/politique.xml' avec un fichier possédant une extention xml</p>
						<form style='text-align:left;' action=''>
							<label for='libelle'></label><input type='text' id='libelle' name='libelle' required placeholder='Libellé source'/>
							<input style='float:left;' type='text' id='source' name='source' required placeholder='Source.xml'/>
							<select id=\"id_cat\">";
									while($result=mysql_fetch_assoc($query)){
										
										echo "<option required value=".$result['id_cat'].">".$result['libelle']."</option>";
									}					
							echo "</select>
							<input type='reset' onclick='ajout_xml();' class='btn btn-primary' style=\"width:30%;margin-top:30px;margin-left:50%\" value=\"Ajouter\"/>
						</form>";
						
							}
							else{
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
								</table><?php
								}
							?>
