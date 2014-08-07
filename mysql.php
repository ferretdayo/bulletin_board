<?php
	class MySQL{
		private $dsn = '';
		private $host = '';
		private $db = '';
		private $user = '';
		private $password = '';
		
		public function __construct($host,$db,$user,$password){
			$this->host = $host;
			$this->db = $db;
			$this->user = $user;
			$this->password = $password;
			$this->dsn = "mysql:dbname={$this->db};host={$this->host}";		
			try{
				$this->dsn = new PDO($this->dsn,$this->user,$this->password);
			}catch(PDOException $e){
				print('Error : '.$e->getMessage());
				die();
			}
		}
		
		/*
			インスタンス作成関数
		*/
		private function getConnection(){
			$pdo = new PDO($this->dsn,$this->user,$this->password,array(
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf-8'"));
			return $pdo;
		}
		
		private function query($sql,$array = null){
			$pdo = $this->getConnection();
			$stmt = $pdo->prepare($sql);
			$stmt->execute($array);
		}
		
		/*
		:idと書くことで一部だけ変える時に有効(
		$sql = "SELECT from table WHERE id = :id ";
		$stmt->execute(array(':id' => 175));
		*/
		public function fetch($sql){
			try{
				$pdo = $this->getConnection();
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $data;
			}catch(PDOException $e){
				echo 'Connection failed : '.$e->getMessage();
				exit();
			}
		}
		
		/*
			$arrayは、array(':name' => ferret);
		*/
		public function insert($sql,$array){
			try{
				$this->query();
			}catch(PDOException $e){
				echo 'Insert failed : '.$e->getMessage();
				exit();
			}
		}
		
		/*
			delete関数
		*/
		public function delete($sql){
			try{
				$this->query($sql);
			}catch(PDOException $e){
				echo 'Delete failed : '.$e->getMessage();
				exit();
			}
		}
		
		public function updata($sql){
			try{
				$this->query($sql);
			}catch(PDOException $e){
				echo 'Updata failed : '.$e->getMessage();
				exit();
			}
		}
	}
?>
