<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>掲示板</title>
<?php
	require_once "C:/xampp/htdocs/club/bulletin_board/sql.php";
?>
</head>
<body>
	<h1>掲示板ʅ（‾◡◝）ʃ</h1>
	<script>
		function check(){
			var error = "入力に不備があります。";
			var flg = 0;
			var name = document.mainBBS.name.value;
			var text = document.mainBBS.comment.value;
			if(name == "" || text == ""){
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

</body>
</html>
