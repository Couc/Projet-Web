<?php
include ('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");
$id_src = $_GET['idsrc'];
$i = $_GET['increment'];
$sql=mysql_query("SELECT * FROM ARTICLE WHERE date<'".$_GET['last']."' AND id_source IN (".$id_src.") ORDER BY DATE DESC LIMIT 20;") or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
while($result=mysql_fetch_assoc($sql))
{
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
		
?>