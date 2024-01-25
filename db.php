<?php
class Database {
    private $host = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "camping_trip";
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->db_username, $this->db_password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}
?>
