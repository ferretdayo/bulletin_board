<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>Registration</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container" style="padding:20px 0;">
	<h1>Update User Details :D</h1>
<?php
	session_start();
	if(isset($_SESSION["login"])){
		$userid = $_SESSION["userid"];
		$_SESSION["last"] = time();
	}else{
		echo "Please Login";
		echo <<<EOF
		<input type='button' value='Go back LoginPage' class="btn btn-primary" onclick='location.href="./login.php"'>
EOF;
		exit();
	}
	require_once "./sql.php";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['confirm'])){
			$conn = new MySQL("localhost","bbs","ferret","ferret");
			$username = htmlspecialchars($_POST['username'],ENT_QUOTES);
			$userpass = htmlspecialchars($_POST['userpass'],ENT_QUOTES);
			$email = htmlspecialchars($_POST['email'],ENT_QUOTES);
			$sql = "UPDATE registration set name = :name,email = :email,userpass = :userpass WHERE userid = :userid";
			$array = array(':name'=>$username,':email'=>$email,':userpass'=>$userpass,':userid' => $userid);
			$conn->update($sql,$array);
			echo "Update user account!<br>";
		}
	}
?>
	<input type='button' value='Go back Home Page' class="btn btn-primary" onclick='location.href="./main.php"'>
	</div>
</body>
</html>
