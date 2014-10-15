<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$conn = new MySQL("localhost","bbs","ferret","ferret");
		//INSERT
		if(isset($_POST["submit"])){
			if(isset($_SESSION["login"])){
				if($_SESSION["login"] == true){
					$userid = $_SESSION["userid"];
					$_SESSION["last"] = time();
				}
			}else{
				echo "Please Login";
				echo <<<EOF
				<input type='button' value='Go back LoginPage' class="btn btn-primary" onclick='location.href="./login.php"'>
EOF;
				exit();
			}
			$text = htmlspecialchars($_POST["text_comment"],ENT_QUOTES);
			$date = date('Y/m/d');
			$sql = "INSERT INTO bbs(userid,text,date) VALUES(:userid,:text,:date)";
			$array = array(':userid' => $userid,':text' => $text,':date' => $date);
			$conn->insert($sql,$array);
		}
		if(isset($_POST["delete"])){
			if(isset($_SESSION["login"])){
				$_SESSION["last"] = time();
			}else{
				echo "Please Login";
				echo <<<EOF
				<input type='button' value='Go back LoginPage' class="btn btn-primary" onclick='location.href="./login.php"'>
EOF;
				exit();
			}
			$no = key($_POST["delete"]);
			$sql = "DELETE FROM bbs WHERE id = {$no}";
			$conn->delete($sql);
		}
		if(isset($_POST["comment"])){
			if(isset($_SESSION["login"])){
				$_SESSION["last"] = time();
			}else{
				echo "Please Login";
				echo <<<EOF
				<input type='button' value='Go back LoginPage' class="btn btn-primary" onclick='location.href="./login.php"'>
EOF;
				exit();
			}
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