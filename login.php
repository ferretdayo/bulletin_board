<?
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>Login</title>
</head>
<body>
<?php
	require_once "C:/xampp/htdocs/club/bulletin_board/sql.php";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["login"])){
			$userid = htmlspecialchars($_POST["username"]);
			$userpass = htmlspecialchars($_POST["userpass"]);
			$conn = new MySQL("localhost","bbs","ferret","ferret");
			$array = array(':userid' => $userid,':userpass' => $userpass);
			$sql = "SELECT userid,userpass FROM registration where userid = :userid AND userpass = :userpass";
			$result = $conn->fetch($sql,$array);
			if(!$result){	//false
				echo "You mistake userid and userpassword";
			}else{			//true
				//web don't have session.
				if(!isset($_SESSION["login"])){
					$_SESSION["login"] = true;
					$_SESSION["userid"] = $result['userid'];
				}else{	//web has session
					//if user could logined.
					if($_SESSION["login"] == true){
						//redirect
						header("Location: ./main.php");
					}else{
						$_SESSION = array();
						if (isset($_COOKIE["PHPSESSID"])) {
							setcookie("PHPSESSID", '', time() - 1800, '/');
						}
						session_destroy();
					}
				}
			}
		}
	}
?>
	<form action="" method="post">
		<table>
			<tr><td>UserName : </td><td><input type="text" name='username'></td></tr>
			<tr><td>UserPassword : </td><td><input type="password" name="userpass"></td></tr>
			<tr><td>&nbsp;</td><td><input type="submit" name="login"></td></tr>
		</table>
		<a href="./registration.php">create user account</a>
	</form>
</body>
</html>
