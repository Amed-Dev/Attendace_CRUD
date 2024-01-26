<?php
require_once "../config/dataBase.php";
class Departamento
{
  private $conn;

  public function __construct()
  {
    $db = Database::getInstance();
    $this->conn = $db->getConnection();
  }

  public function getDepartamento()
  {
    $sqlDepartamento = "SELECT * FROM departamento";
    $resultadoDepartamento = $this->conn->query($sqlDepartamento);
    $departamento = [];

    if ($resultadoDepartamento->num_rows > 0) {
      while ($fila = $resultadoDepartamento->fetch_assoc()) {
        $departamento[] = array(
          'id' => $fila['ID_DEPARTAMENTO'],
          'nombre' => $fila['NOMBRE_DEPARTAMENTO'],
        );
      }
    }
    return $departamento;
  }
}