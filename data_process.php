<?php
	require_once "C:/xampp/htdocs/club/bulletin_board/sql.php";
	$conn = new MySQL("","","","");
	$sql = "INSERT INTO bbs VALUES(:id,:name,:text,:date)";
	$array = array(':id' => '1',':name' => 'ferret',':text' => '初投稿でーす♡',':date' => '2014/08/07');
	$result = $conn->insert($sql,$array);
?>
