<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$conn = new MySQL("localhost","bbs","ferret","ferret");
		//INSERT
		if(isset($_POST["submit"])){
			if(isset($_SESSION["login"])){
				if($_SESSION["login"] == true){
					$name = $_SESSION["userid"];
				}
			}else{
				exit();
			}
			$text = htmlspecialchars($_POST["comment"]);
			$date = date('Y/m/d');
			$sql = "SELECT MAX(comment) AS comment_max FROM bbs";
			$result = $conn->fetch($sql);
			if($result){
				$comment_max = $result[0]['comment_max'];
				$comment_max++;
			}
			$sql = "INSERT INTO bbs(userid,text,date,comment) VALUES(:userid,:text,:date,:comment)";
			$array = array(':userid' => $name,':text' => $text,':date' => $date,':comment' => $comment_max);
			$conn->insert($sql,$array);
		}
		if(isset($_POST["delete"])){
			$no = key($_POST["delete"]);
			$sql = "DELETE FROM bbs WHERE id = {$no}";
			$conn->delete($sql);
		}
	}
?>
