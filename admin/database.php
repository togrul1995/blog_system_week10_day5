<?php
	class Database {
		private $host;
		private $username;
		private $pass;
		private $dbname;
		private $conn;
		private $table;

		public function __construct($host, $username, $pass, $dbname) {
			$this->host = $host;
			$this->username = $username;
			$this->pass = $pass;
			$this->dbname = $dbname;
			$this->conn = mysqli_connect($host, $username, $pass, $dbname);
			$this->table = "news";
		}

		public function isConnected() {
			return $this->conn;
		}

		//increase view count of news
		public function setView($id) {
			if($this->isConnected()) {
				$count = $this->getView($id);
				$count++;
				$SQL = "UPDATE $this->table SET view_count='$count' WHERE id=$id";
				mysqli_query($this->conn, $SQL);
			}
		}

		public function getView($id){
			if($this->isConnected()) {
				$SQL = "SELECT view_count FROM $this->table WHERE id=$id";
				$query = mysqli_query($this->conn, $SQL);
				$count = mysqli_fetch_assoc($query);
				return $count['view_count'];
			}
		}

		public function delete($id) {
			if($this->isConnected()) {
				$SQL = "DELETE FROM $this->table WHERE id=$id";
				mysqli_query($this->conn, $SQL);
			}
		}

		public function create($title, $content, $image) {
			if($this->isConnected()) {
				$position = strpos($content, ".");
				$subcontent = substr($content, 0, $position) . "...";
				$SQL = "INSERT INTO $this->table(title, subcontent, content, image_path) VALUES ('$title', '$subcontent', '$content', '$image')";
				mysqli_query($this->conn, $SQL);
			}
		}

		public function getAllNews(){
			if($this->isConnected()) {
				$SQL = "SELECT * FROM $this->table";
				return mysqli_query($this->conn, $SQL);
			}
		}
	}	
?>