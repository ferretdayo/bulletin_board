<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>BBS</title>
<script type="text/javascript" src="./update.js"></script>
<link rel="stylesheet" type="text/css" href="./registration.css" media="all">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/my-bootstrap.css" rel="stylesheet">
<?php
	require_once "./sql.php";
	require_once "./select_account.php";
?>
</head>
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
		<h1>Update User Details :D</h1>
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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
