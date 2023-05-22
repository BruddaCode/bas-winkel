<?php 

	// Include the config file
	include_once("./backend/config.php");
	


	class database extends config{

		private $mysqli='';


		public function __construct(){
			$this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		}


		public function insert($table, $para){

			$table_columns = implode(',', array_keys($para));
			$table_value = implode("','", $para);

			$sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

			return $this->mysqli->query($sql);
		}


		public function update($table, $para, $id){

			$args = array();

			foreach ($para as $key => $value) {
				$args[] = "$key = '$value'"; 
			}

			$sql="UPDATE  $table SET " . implode(',', $args);
			$sql .=" WHERE $id";

			return $this->mysqli->query($sql);
		}


		public function delete($table,$id){

			$sql="DELETE FROM $table";
			$sql .=" WHERE $id ";


			return $this->mysqli->query($sql);
		}



		
		public function select($table, $rows="*", $where = null){
		
			if ($where != null) 
				$sql="SELECT $rows FROM $table WHERE $where";
			else
				$sql="SELECT $rows FROM $table";
				
			$result = $this->mysqli->query($sql);

			$sql_object = array();
			$sql_object["num_rows"] = $result->num_rows;
			$sql_object["rows"] = $result->fetch_array(MYSQLI_ASSOC);

			return $sql_object;
			
		}


		public function __destruct(){
			$this->mysqli->close();
		}

	}

?>
