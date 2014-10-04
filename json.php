<?php
	require_once "C:/xampp/htdocs/club/bulletin_board/data_process.php";
	require_once "C:/xampp/htdocs/club/bulletin_board/sql.php";
	session_start();
	$userid = $_SESSION["userid"];
	$namearray = array('userid'=>$userid);
	header("Content-Type: application/json; charset=utf-8");
	
	$conn = new MySQL("localhost","bbs","ferret","ferret");
	$sql = "SELECT bbs.id,bbs.userid,bbs.text,bbs.date,bbs.comment,registration.name FROM bbs INNER JOIN registration ON bbs.userid = registration.userid";
	$result = $conn->fetch($sql);
	array_unshift($result,$namearray);
	$json_data = json_encode($result);
	echo trim($json_data);
	exit;	
?>
