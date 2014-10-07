<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$conn = new MySQL("","","","");
		//INSERT
		if(isset($_POST["submit"])){
			if(isset($_SESSION["login"])){
				if($_SESSION["login"] == true){
					$userid = $_SESSION["userid"];
				}
			}else{
				exit();
			}
			$text = htmlspecialchars($_POST["text_comment"]);
			$date = date('Y/m/d');
			$sql = "INSERT INTO bbs(userid,text,date) VALUES(:userid,:text,:date)";
			$array = array(':userid' => $userid,':text' => $text,':date' => $date);
			$conn->insert($sql,$array);
		}
		if(isset($_POST["delete"])){
			$no = key($_POST["delete"]);
			$sql = "DELETE FROM bbs WHERE id = {$no}";
			$conn->delete($sql);
		}
		if(isset($_POST["comment"])){
			$bbsid = key($_POST["comment"]);
			$sql = "SELECT id FROM bbs WHERE id = :bbsid";
			$data = array(':bbsid'=>$bbsid);
			$result = $conn->fetch($sql,$data);
			if($result){
				$bbs_id = $result[0]['id'];	//get bbs id
				$_SESSION["bbs_id"] = $bbs_id;
			}
			header("Location: ./comment.php");
		}
	}
?>
