<?php
	session_start();
	$_SESSION = array();
	if (isset($_COOKIE["PHPSESSID"])) {
		setcookie("PHPSESSID", '', time() - 3600, '/');
	}
	session_destroy();
	header("Location: ./login.php");
?>
