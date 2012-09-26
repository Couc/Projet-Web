<?php
$host = "localhost";
$user = "root";
$pass="";
$bdd="projet_web";
@mysql_connect($host,$user,$pass) or die("Inpossible de se connecter : ".mysql_error());
@mysql_select_db("$bdd") or die("Inpossible de se connecter : ".mysql_error());
?>
