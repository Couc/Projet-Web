<?php
include ('_A8s2f9g714ef.php');
session_start();

if (isset($_SESSION['login_uti'])) {

	header('Refresh: 0;URL=' . $_GET['page']);
} else {
	header('Refresh: 0;URL=login.php');
}
?>