<?php
	require_once "./sql.php";
	$conn = new MySQL("localhost","bbs","ferret","ferret");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["POST_comment"])){
			if(isset($_SESSION["login"])){
				if($_SESSION["login"] == true){
					$userid = $_SESSION["userid"];
					$bbs_id = $_SESSION["bbs_id"];
				}
			}else{
				exit();
			}
			$text = htmlspecialchars($_POST["comment"]);
			$date = date('Y/m/d');
			$sql = "INSERT INTO bbs_comment(userid,text,date,bbs_id) VALUES(:userid,:text,:date,:bbs_id)";
			$array = array(':userid' => $userid,':text' => $text,':date' => $date,':bbs_id' => $bbs_id);
			$conn->insert($sql,$array);
		}
		if(isset($_POST["delete"])){
			$no = key($_POST["delete"]);
			$sql = "DELETE FROM bbs_comment WHERE id = {$no}";
			$conn->delete($sql);
		}
	}
?>
