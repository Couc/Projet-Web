<?php
			
			$query = mysql_query("SELECT * FROM commentaires WHERE id_art = ".$_GET['id_art'].";");
			
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