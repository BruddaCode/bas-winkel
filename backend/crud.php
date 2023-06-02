<?php

// Include the config file
include_once("config.php");



class crud extends config
{

	private $conn = '';

	public function __construct()
	{
		try {
			$this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "connectie mislukt: " . $e->getMessage();
		}
	}


	public function insert($table, $para)
	{

		$table_columns = implode(',', array_keys($para));
		$table_value = implode("','", $para);

		$sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";
		$result = $this->conn->prepare($sql);
		$result = $result->execute();

		return $result;
	}



	public function update($table, $para, $id)
	{

		$args = array();

		foreach ($para as $key => $value) {
			$args[] = "$key = '$value'";
		}

		$sql = "UPDATE  $table SET " . implode(',', $args);
		$sql .= " WHERE $id";
		$result = $this->conn->prepare($sql);
		$result = $result->execute();

		return $result;
	}


	public function delete($table, $id)
	{

		$sql = "DELETE FROM $table";
		$sql .= " WHERE $id ";

		$result = $this->conn->prepare($sql);
		$result = $result->execute();

		return $result;
	}




	public function select($table, $rows = "*", $where = null)
	{

		if ($where != null)
			$sql = "SELECT $rows FROM $table WHERE $where";
		else
			$sql = "SELECT $rows FROM $table";

		$result = $this->conn->prepare($sql);
		$result->execute();


		return $result;
	}


	public function __destruct()
	{
		$this->conn = null;
	}
}
