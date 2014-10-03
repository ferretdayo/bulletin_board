<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>Registration</title>
<script type="text/javascript" src="./registration.js"></script>
<link rel="stylesheet" type="text/css" href="./registration.css" media="all">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container" style="padding:20px 0;">
		<h1>User Registration :D</h1>
<?php
	require_once "./sql.php";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["create"])){
			$conn = new MySQL("localhost","bbs","ferret","ferret");
			$userid = htmlspecialchars($_POST['userid']);
			$username = htmlspecialchars($_POST['username']);
			$userpass = htmlspecialchars($_POST['userpass']);
			$email = htmlspecialchars($_POST['email']);
			$old = htmlspecialchars($_POST['old']);
			$sex = $_POST['sex'];
			$birthday = $_POST['birthday'];
			$query = "SELECT userid FROM registration WHERE userid = :userid";
			$uarray = array(':userid'=>$userid);
			$result = $conn->fetch($query,$uarray);
			if(!$result){	//don't exist userid
echo <<< EOF
				<form class="form-horizotal" style="margin-bottom:15px;"  method="post" name='form' action='./regist_process.php'>
					<div class="form-group">
						<label class="control-label" for="UserID">UserID</label>
						<input type="text" class="form-control" placeholder="userid" id='userid' name='userid' value="{$userid}" readonly>
					</div>
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
						<label class="control-label" for="old">Old</label>
						<input type="number" class="form-control" placeholder="old" id='old' name='old' value="{$old}" readonly>
					</div>
					<div class="form-group">
						<label class="control-label" for="sex">Sex</label>
						<input type="text" class="form-control" placeholder="sex" id="sex" name="sex" value="{$sex}" readonly>
					</div>
					<div class="form-group">
						<label class="control-label" for="birthday">Birthday</label>
						<input type="date" class="form-control" placeholder="birthday" id='birthday' name='birthday' value="{$birthday}" readonly>
					</div>
					<div class="form-group">
						<input type="submit" value="Confirm" name="confirm" class="btn btn-primary">
						<input type='button' name='before' value='Previous Page' class='btn' onclick='javascript:window.history.back(-1);'>
					</div>
				</form>
EOF;
			}else{		//exist userid
				echo "<p style='color:red'>This userid is already used</p>";
				echo "<input type='button' name='before' value='Previous Page' class='btn' onclick='javascript:window.history.back(-1);'>";
			}
		}
	}
?>
	</div>
</body>
</html>
