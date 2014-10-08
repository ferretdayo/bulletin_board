<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>BBS</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/my-bootstrap.css" rel="stylesheet">
</head>
<?php
	require_once "./sql.php";
	require_once "./show_account_data.php";
?>
<body>
	<div class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="./main.php">
						<i class="glyphicon glyphicon-home"></i>  Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-cog"></i>  SetUp <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="./show_account.php">Show Account Detail</a></li>
							<li><a href="./update_account.php">Change Account</a></li>
						</ul>
					</li>
					<li><a href="./logout.php">
						<i class="glyphicon glyphicon-off"></i>  Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container" style="padding:20px 0;">
		<h1>Show User Details :D</h1>
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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
