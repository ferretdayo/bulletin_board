<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>BBS</title>
<link rel="stylesheet" type="text/css" href="./registration.css" media="all">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container" style="padding:20px 0;">
		<h1>Update User Details :D</h1>
<?php
	session_start();
	if(isset($_SESSION["login"])){
		if(time() - $_SESSION["last"] >= 1500){
			$_SESSION = array();
			if (isset($_COOKIE["PHPSESSID"])) {
				setcookie("PHPSESSID", '', time() - 3600, '/');
			}
			session_destroy();
			header("Location: ./login.php");
		}
	}
	setcookie( session_name(), session_id(), time() + 1440 );
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
		if(isset($_POST["change"])){
			$conn = new MySQL("localhost","bbs","ferret","ferret");
			$username = htmlspecialchars($_POST['username']);
			$userpass = htmlspecialchars($_POST['userpass']);
			$email = htmlspecialchars($_POST['email']);
echo <<< EOF
				<form class="form-horizotal" style="margin-bottom:15px;"  method="post" name='form' action='./update_process.php'>
					<div class="form-group">
						<label class="control-label" for="UserName">UserName</label>
						<input type="text" class="form-control" placeholder="username" id='username' name='username' value="{$username}" readonly>
					</div>
					<div class="form-group">
						<label class="control-label" for="password">UserPassword</label>
						<input type="password" class="form-control" placeholder="password" id="userpass" name="userpass" value="{$userpass}" readonly>
					</div>
					<div class="form-group">
						<label class="control-label" for="email">Email Address</label>
						<input type="email" class="form-control" placeholder="email" id='email' name='email' value="{$email}" readonly>
					</div>
					<div class="form-group">
						<input type="submit" value="Confirm" name="confirm" class="btn btn-primary">
						<input type='button' name='before' value='Previous Page' class='btn' onclick='javascript:window.history.back(-1);'>
					</div>
				</form>
EOF;
		}
	}
?>
	</div>
</body>
</html>
