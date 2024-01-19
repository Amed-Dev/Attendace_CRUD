<?php
class Departamento
{
  private $conn;

  public function __construct()
  {
    $this->conn = new mysqli("127.0.0.1:3306", "root", "19384652", "attendace");
    if ($this->conn->connect_error) {
      die("Error de conexión" . $this->conn->connect_error);
    }
  }

  public function getDepartamento()
  {
    $sqlDepartamento = "SELECT * FROM cargo A 
    INNER JOIN departamento B ON A.DEPARTAMENTO = B.ID_DEPARTAMENTO";
    $resultadoDepartamento = $this->conn->query($sqlDepartamento);
    return $resultadoDepartamento;
  }
}