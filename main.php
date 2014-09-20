<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript charset=utf-8">

<title>掲示板</title>
<?php
	require_once "C:/xampp/htdocs/club/bulletin_board/sql.php";
	require_once "C:/xampp/htdocs/club/bulletin_board/data_process.php";
?>
<script type="text/javascript" src="json.js"></script>
</head>
<body>
	<h1>掲示板ʅ（‾◡◝）ʃ</h1>
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
	<form name="mainBBS" method="post" action="" onSubmit="return check()">
		名前 : <input type="text" name="name" value="">&nbsp<br>
		<input type="text" name="comment" size="50" value="ここに書き込んでください"><br>
		<input type="submit" name="submit" value="提出">
	</form>

	<form action="" method="post" name="form">
	<div>
		<table id="text" border="1">
		</table>
	</div>
	<script>
		var promiseobj = loadJSON("http://localhost/club/bulletin_board/json.php");
		promiseobj.then(function(data){
			var text = document.getElementById('text');
			for(var i = 0;i < data.length;i++){
				var dataid = data[i].id;
				text.innerHTML += "<tr><td>名前 : </td><td>"+data[i].userid+"</td></tr>";
				text.innerHTML += "<tr><td>内容 : </td><td>"+data[i].text+"</td></tr>";
				text.innerHTML += "<tr><td>日付 : </td><td>"+data[i].date+"</td></tr>";
				text.innerHTML += "<tr><td><input type='submit' name='delete["+dataid+"]' value='削除'></td></tr>";
			}
		});
	</script>
	</form>
	
</body>
</html>
