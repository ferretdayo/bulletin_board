<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>Registration</title>
<script type="text/javascript" src="./update.js"></script>
<link rel="stylesheet" type="text/css" href="./registration.css" media="all">
<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	require_once "./sql.php";
	require_once "./select_account.php";
?>
</head>
<body>
	<div class="container" style="padding:20px 0;">
		<h1>User Registration :D</h1>
		<form action="./confirm_account.php" class="form-horizotal" style="margin-bottom:15px;"  method="post" name='form' onSubmit="return datacheck();">
			<div class="form-group">
				<label class="control-label" for="UserName">UserName</label>
				<input type="text" class="form-control" placeholder="username" id='username' name='username' value='<?=$username;?>'><div id='uname'></div>
			</div>
			<div class="form-group">
				<label class="control-label" for="password">UserPassword</label>
				<input type="password" class="form-control" placeholder="password" id="userpass" name="userpass" value='<?=$userpass;?>'><div id='upass'></div>
			</div>
			<div class="form-group">
				<label class="control-label" for="email">Email Address</label>
				<input type="email" class="form-control" placeholder="email" id='email' name='email' value='<?=$email;?>'><div id='uemail'></div>
			</div>
			<div class="form-inline">
				<input type="submit" value="Change" name="change" class="btn btn-primary">
				<input type='button' name='before' value='Go Back Home Page' class='btn' onclick='location.href="./main.php"'>
			</div>
		</form>
	</div>
</body>
</html>
