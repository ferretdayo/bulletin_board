<?
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>Login</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div style="padding:20px 0;">
		<div class="container">
			<h1>Login Page</h1>
<?php
	require_once "./sql.php";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["login"])){
			$userid = htmlspecialchars($_POST["userid"]);
			$userpass = htmlspecialchars($_POST["userpass"]);
			$conn = new MySQL("localhost","bbs","ferret","ferret");
			$array = array(':userid' => $userid,':userpass' => $userpass);
			$sql = "SELECT userid,userpass FROM registration where userid = :userid AND userpass = :userpass";
			$result = $conn->fetch($sql,$array);
			if(!$result){	//false
				echo "<p style='color:red'>You mistake userid and userpassword</p>";
			}else{			//true
				//web don't have session.
				$_SESSION["login"] = true;
				$_SESSION["userid"] = $result['userid'];
				header("Location: ./main.php");
			}
		}
	}
?>
			<form action="" method="post" class="form-horizontal" style="margin-bottom:15px;">
				<div class="form-group">
						<label class="control-label" for="UserID">UserID</label>
						<input type="text" class="form-control" placeholder="userid" id='userid' name='userid'>
				</div>
				<div class="form-group">
					<label class="control-label" for="password">UserPassword</label>
					<input type="password" class="form-control" placeholder="password" id="userpass" name="userpass"><div id='upass'></div>
				</div>
				<div class="form-inline">
						<input type="submit" name="login" value="Login" class="btn btn-primary">
						<a href="./registration.html" class="btn btn-link">create user account</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
