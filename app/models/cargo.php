<?php
require_once "../config/dataBase.php";
class Cargo
{
  private $conn;
  public function __construct()
  {
    $db = Database::getInstance();
    $this->conn = $db->getConnection();
  }
  public function getCargo()
  {
    $data = json_decode(file_get_contents("php://input"), true);

    $departamento = isset($data['departamento']) ? $data['departamento'] : '';

    $sqlCargo = $this->conn->prepare("SELECT * FROM cargo
    WHERE DEPARTAMENTO = ? ");
    $sqlCargo->bind_param("i", $departamento);
    $sqlCargo->execute();

    $resultadoCargo = $sqlCargo->get_result();

    $cargo = [];

    if ($resultadoCargo->num_rows > 0) {
      while ($fila = $resultadoCargo->fetch_assoc()) {
        $cargo[] = array(
          'id' => $fila['ID_CARGO'],
          'nombre' => $fila['NOMBRE_CARGO'],
        );
      }
    }
    return $cargo;
  }
}