<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript charset=utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/my-bootstrap.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<title>掲示板</title>
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
	if(isset($_SESSION["login"])){
		$name = $_SESSION["userid"];
		$_SESSION["last"] = time();
	}else{
		echo "Please Login";
		echo <<<EOF
		<input type='button' value='Go back LoginPage' class="btn btn-primary" onclick='location.href="./login.php"'>
EOF;
		exit();
	}

	require_once "./sql.php";
	require_once "./data_process.php";
	$conn = new MySQL("localhost","bbs","ferret","ferret");
?>
<script type="text/javascript" src="./json.js"></script>
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
		<div id="header" class="container"><h1>掲示板ʅ（‾◡◝）ʃ</h1></div>
	<script>
		function check(){
			var error = "入力に不備があります。";
			var flg = 0;
			var text = document.mainBBS.text_comment.value;
			if(text == ""){
				flg = 1;
			}
			if(flg){
				alert(error);
				return false;
			}
			if(confirm('送信してよろしいですか？')){
				return true;
			}else{
				alert('キャンセルされました。');
				return false;
			}
		}
	</script>
<?php
	if(!isset($_SESSION["login"])){
		echo "Please login";
	}else{
		$userid = $_SESSION["userid"];
		$sql = "SELECT name FROM registration WHERE userid = :userid";
		$array = array(':userid'=>$userid);
		$result = $conn->fetch($sql,$array);
		if($result){
			$username = $result[0]['name'];
		}
?>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
					<form name="mainBBS" method="post" class="form-horizontal" style="margin-bottom:15px;" action="" onSubmit="return check()">
						<div class="form-group">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h4><? echo $username."<small>@".$userid."</small>"; ?></h4>
								</div>
								<div class="panel-body">
									<textarea class="form-control" name="text_comment" size="50" placeholder="Please write here"></textarea>
								</div>
								<div class="panel-footer">
									<input type="submit" class="btn btn-info" name="submit" value="Posting">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-8 col-xs-8 col-md-8 col-lg-8">
					<form action="" class="form-horizontal" style="margin-bottom:15px;" method="post" name="HomeLine">
						<div id="text" name="text">
						</div>
			<script>
				var promiseobj = loadJSON("./json.php");
				promiseobj.then(function(data){
					var parent_obj = document.getElementById('text');
					var login_user = data[0].userid;
					var comment_cnt = data[1];
					for(var i = 2;i < data.length;i++){
						var div_element = document.createElement("div");
						div_element.setAttribute("class", "panel panel-primary");
						div_element.setAttribute("name", "content");
						var dataid = data[i].id;
						div_element.innerHTML += "<div class='panel-heading'><h4 class='panel-title'>"+data[i].name+"<small style='color:white'>@"+data[i].userid+"</small></h4></div>";
						div_element.innerHTML += "<div class='panel-body'><p>"+data[i].text+"</p></div>";
						div_element.innerHTML += "<p class='text-right'>"+data[i].date+"</p>";
						div_element.innerHTML += "<INPUT TYPE='HIDDEN' NAME='val_button' value=''>";
						if(login_user == data[i].userid){
							div_element.innerHTML += "<div class='panel-footer' name='button'><button type='submit' class='btn btn-primary' name='comment["+dataid+"]' id='comment' value='Comment'> Comment <span class='badge'>"+comment_cnt[i-2]+"</span></button>&nbsp;<input type='submit' class='btn btn-primary' name='delete["+dataid+"]' id='remove' value='Remove'></div>";
						}else{
							div_element.innerHTML += "<div class='panel-footer'><button type='submit' class='btn btn-primary' name='comment["+dataid+"]' id='comment2' value='Comment'> Comment <span class='badge'>"+comment_cnt[i-2]+"</span></button></div>";
						}
						parent_obj.appendChild(div_element);
					}
				});
			</script>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
	}
?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
