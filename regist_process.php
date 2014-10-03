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
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['confirm'])){
			$conn = new MySQL("localhost","bbs","ferret","ferret");
			$userid = htmlspecialchars($_POST['userid']);
			$username = htmlspecialchars($_POST['username']);
			$userpass = htmlspecialchars($_POST['userpass']);
			$email = htmlspecialchars($_POST['email']);
			$old = htmlspecialchars($_POST['old']);
			$sex = $_POST['sex'];
			$birthday = $_POST['birthday'];
			$sql = "INSERT INTO registration(userid,name,email,sex,old,birth,userpass)";
			$sql .= "VALUES(:userid,:name,:email,:sex,:old,:birth,:userpass)";
			$array = array(':userid'=>$userid,':name'=>$username,':email'=>$email,':sex'=>$sex,':old'=>$old,':birth'=>$birthday,':userpass'=>$userpass);
			$conn->insert($sql,$array);
			echo "Create user!<br>";
		}
	}
?>
	<input type='button' value='Go back LoginPage' class="btn btn-primary" onclick='location.href="./login.php"'>
	</div>
</body>
</html>
