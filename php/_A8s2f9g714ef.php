<?php
$host = "localhost";
$user = "root";
$pass="";
$bdd="projet_web";
@mysql_connect($host,$user,$pass) or die("Impossible de se connecter : ".mysql_error());
@mysql_select_db("$bdd") or die("Impossible de se connecter : ".mysql_error());
?>
