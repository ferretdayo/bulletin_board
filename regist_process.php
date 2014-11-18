<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>Registration</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container" style="padding:20px 0;">
	<h1>User Registration :D</h1>
<?php
	require_once "./sql.php";
	mysql_set_charset('utf-8');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['confirm'])){
			$conn = new MySQL("localhost","bbs","ferret","ferret");
			$userid = htmlspecialchars($_POST['userid'],ENT_QUOTES);
			$username = htmlspecialchars($_POST['username'],ENT_QUOTES);
			$userpass = htmlspecialchars($_POST['userpass'],ENT_QUOTES);
			$email = htmlspecialchars($_POST['email'],ENT_QUOTES);
			$sex = $_POST['sex'];
			$birthday = $_POST['birthday'];
			$hash = password_hash($userpass,PASSWORD_DEFAULT);
			$sql = "INSERT INTO registration(userid,name,email,sex,birth,userpass)";
			$sql .= "VALUES(:userid,:name,:email,:sex,:birth,:userpass)";
			$array = array(':userid'=>$userid,':name'=>$username,':email'=>$email,':sex'=>$sex,':birth'=>$birthday,':userpass'=>$hash);
			$conn->insert($sql,$array);
			echo "Create user!<br>";
		}
	}
?>
	<input type='button' value='Go back LoginPage' class="btn btn-primary" onclick='location.href="./login.php"'>
	</div>
</body>
</html>