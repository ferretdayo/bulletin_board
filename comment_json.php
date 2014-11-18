<?php
	session_start();
	mysql_set_charset('utf-8');
	require_once "./sql.php";
	$userid = $_SESSION["userid"];
	$bbs_id = $_SESSION["bbs_id"];
	$commentarray = array(':bbs_id' => $bbs_id,':bbs_id' => $bbs_id);
	$namearray = array('userid'=>$userid);
	header("Content-Type: application/json; charset=utf-8");
	$conn = new MySQL("localhost","bbs","ferret","ferret");
	$sql = "SELECT bbs.id,bbs.userid,bbs.text,bbs.date,registration.name FROM bbs ";
	$sql .= "INNER JOIN registration ON bbs.userid = registration.userid WHERE bbs.id = :bbs_id ";
	$query = "SELECT bbs_comment.id,bbs_comment.userid,bbs_comment.text,bbs_comment.date,registration.name FROM bbs_comment ";
	$query .= "INNER JOIN registration ON bbs_comment.userid = registration.userid WHERE bbs_comment.bbs_id = :bbs_id ORDER BY bbs_comment.id";
	$result = $conn->fetch($sql,$commentarray);
	$res = $conn->fetch($query,$commentarray);
	array_unshift($res,$result);
	array_unshift($res,$namearray);
	$json_data = json_encode($res);
	echo trim($json_data);
	exit;	
?>