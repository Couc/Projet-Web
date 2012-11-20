<?php
include ('_A8s2f9g714ef.php');

$user=$_POST['username'];
$pw=$_POST['password'];
$requete='SELECT password FROM USER WHERE login="'.$user.'"';
$query = mysql_query($requete) or die("ERREUR MYSQL numéro: " . mysql_errno() . "<br>Type de cette erreur: " . mysql_error() . "<br>\n");
$pwbase="";
while ($result = mysql_fetch_assoc($query)) {
	$pwbase=$result['password'];
}

if($pwbase==md5($pw)){
	
	header('Location: ../index.php');
	
}else{
	header('Location: login.php?msgco=error');
}
	

?>
