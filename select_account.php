<?php
	session_start();
	if(isset($_SESSION["login"])){
		$userid = $_SESSION["userid"];
	}else{
		echo "Please Login";
		echo <<<EOF
		<input type='button' value='Go back LoginPage' class="btn btn-primary" onclick='location.href="./login.php"'>
EOF;
		exit();
	}
	$conn = new MySQL("localhost","bbs","ferret","ferret");
	$sql = "SELECT * FROM registration WHERE userid = :userid";
	$userarray = array(':userid' => $userid);
	$result = $conn->fetch($sql,$userarray);
	if($result){
		$username = $result[0]['name'];
		$email = $result[0]['email'];
		$userpass = $result[0]['userpass'];
	}
?>
