<?php

	require_once "C:/xampp/htdocs/club/bulletin_board/data_process.php";
	require_once "C:/xampp/htdocs/club/bulletin_board/sql.php";

	header("Content-Type: application/json; charset=utf-8");
	
	$conn = new MySQL("","","","");
	$sql = "SELECT name,text,date FROM bbs";
	$result = $conn->fetch($sql);
	$json_data = json_encode($result);
	echo trim($json_data);
	exit;

	
?>
