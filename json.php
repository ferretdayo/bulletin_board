<?php
	require_once "./data_process.php";
	require_once "./sql.php";
	session_start();
	$userid = $_SESSION["userid"];
	$namearray = array('userid'=>$userid);
	$idarray = array();
	header("Content-Type: application/json; charset=utf-8");
	
	$conn = new MySQL("localhost","bbs","ferret","ferret");
	//Get Time Line
	$sql = "SELECT bbs.id,bbs.userid,bbs.text,bbs.date,registration.name FROM bbs INNER JOIN registration ON bbs.userid = registration.userid";
	$result = $conn->fetch($sql);
	$i = 0;
	foreach($result as $value){
		$query = "SELECT count(bbs_id) FROM bbs_comment WHERE bbs_id = :id";
		$array = array(':id' => $value['id']);
		$ans = $conn->fetch($query,$array);
		foreach($ans as $value){
			array_push($idarray,$value['count(bbs_id)']);
		}
	}
	array_unshift($result,$idarray);
	array_unshift($result,$namearray);
	$json_data = json_encode($result);
	echo trim($json_data);
	exit;	
?>
