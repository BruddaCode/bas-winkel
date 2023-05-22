<?php


class DatabaseConn extends config {
    private $conn;

    public function __construct($db_host, $db_user, $db_pass, $db_name) {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",
                $this->db_user, $this->db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "connectie gelukt <br />";
        } catch(PDOException $e) {
            echo "connectie mislukt: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

$connection = new DatabaseConn($db_host, $db_user, $db_pass, $db_name);
$connection->connect();
$conn = $connection->getConnection();
?>