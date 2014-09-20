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
			$sql = "INSERT INTO bbs(userid,text,date) VALUES(:userid,:text,:date)";
			$array = array(':userid' => $name,':text' => $text,':date' => $date);
			$conn->insert($sql,$array);
		}
		if(isset($_POST["delete"])){
			var_dump($_POST["delete"]);
			$no = key($_POST["delete"]);
			$sql = "DELETE FROM bbs WHERE id = {$no}";
			$conn->delete($sql);
		}
	}
?>
