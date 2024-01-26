<?php
class Database
{
  private static $instance;
  private $conn;

  private function __construct()
  {
    $this->conn = new mysqli("127.0.0.1:3306", "root", "19384652", "attendance");

    if ($this->conn->connect_error) {
      die("Error de conexión" . $this->conn->connect_error);
    }
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function getConnection()
  {
    return $this->conn;
  }
}
?>