<?php
	session_start();
	if(isset($_SESSION["login"])){
		$name = $_SESSION["userid"];
	}
?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript charset=utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/my-bootstrap.css" rel="stylesheet">

<title>掲示板</title>
<?php
	require_once "./sql.php";
	require_once "./data_process.php";
	$conn = new MySQL("localhost","bbs","ferret","ferret");
?>
<script type="text/javascript" src="json.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
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
					<li><a href="#">
						<i class="glyphicon glyphicon-home"></i>  Home</a></li>
					<li><a href="#SetUp">
						<i class="glyphicon glyphicon-cog"></i>  SetUp</a></li>
					<li><a href="./logout.php">
						<i class="glyphicon glyphicon-off"></i>  Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="padding:20px 0;">
		<div id="header" class="container"><h1>掲示板ʅ（‾◡◝）ʃ</h1></div>
	<script>
		function check(){
			var error = "入力に不備があります。";
			var flg = 0;
			var name = document.mainBBS.name.value;
			var text = document.mainBBS.comment.value;
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
									<h4><? echo $username; ?></h4>
								</div>
								<div class="panel-body">
									<textarea class="form-control" name="comment" size="50" placeholder="Please write here"></textarea>
								</div>
								<div class="panel-footer">
									<input type="submit" class="btn btn-info" name="submit" value="Posting">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-8 col-xs-8 col-md-8 col-lg-8">
					<form action="" class="form-horizontal" style="margin-bottom:15px;" method="post" name="form">
						<div id="text">
						</div>
			<script>
				var promiseobj = loadJSON("./json.php");
				promiseobj.then(function(data){
					var parent_obj = document.getElementById('text');
					var login_user = data[0].userid;
					for(var i = 1;i < data.length;i++){
						var div_element = document.createElement("div");
						div_element.setAttribute("class", "panel panel-primary");
						var dataid = data[i].id;
						div_element.innerHTML += "<div class='panel-heading'><h4>"+data[i].name+"</h4></div>";
						div_element.innerHTML += "<div class='panel-body'><p>"+data[i].text+"</p></div>";
						div_element.innerHTML += "<p class='text-right'>"+data[i].date+"</p>";
						if(login_user == data[i].userid){
							div_element.innerHTML += "<div class='panel-footer'><input type='submit' class='btn btn-primary' name='delete["+dataid+"]' value='Remove'>&nbsp;<input type='submit' class='btn btn-primary' name='comment["+dataid+"]' value='Comment'></div>";
						}else{
							div_element.innerHTML += "<div class='panel-footer'><input type='submit' class='btn btn-primary' name='comment["+dataid+"]' value='Comment'></div>";
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
</body>
</html>
