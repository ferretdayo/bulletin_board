<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>Registration</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
	require_once "./sql.php";
	require_once "./show_account_data.php";
?>
<body>
	<div class="container" style="padding:20px 0;">
		<h1>User Registration :D</h1>
		<div class="form-group">
			<label class="control-label" for="UserID">UserID</label>
			<input type="text" class="form-control" placeholder="userid" id='userid' value='<?=$userid;?>' name='userid' readonly>
		</div>
		<div class="form-group">
			<label class="control-label" for="UserName">UserName</label>
			<input type="text" class="form-control" placeholder="username" id='username' value='<?=$username;?>' name='username' readonly>
		</div>
		<div class="form-group">
			<label class="control-label" for="password">UserPassword</label>
			<input type="text" class="form-control" placeholder="password" id="userpass" value='<?=$userpass;?>' name="userpass" readonly>
		</div>
		<div class="form-group">
			<label class="control-label" for="email">Email Address</label>
			<input type="email" class="form-control" placeholder="email" id='email' value='<?=$email;?>' name='email' readonly>
		</div>
		<div class="form-group">
			<label class="control-label" for="sex">Sex</label>
			<input type="text" class="form-control" placeholder="sex" id='sex' value='<?=$sex;?>' name='sex' readonly>
		</div>
		<div id='usex'></div>
		<div class="form-group">
			<label class="control-label" for="birthday">Birthday</label>
			<input type="date" class="form-control" placeholder="birthday" id='birthday' value='<?=$birth;?>' name='birthday' readonly>
		</div>
		<div class="form-inline">
			<input type='button' name='before' value='Go Back Home Page' class='btn' onclick='location.href="./main.php"'>
		</div>
	</div>
</body>
</html>
