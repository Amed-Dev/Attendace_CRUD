<?php
class Empleado
{
  private $conn;
  public function __contruct()
  {
    $this->conn = new mysqli("127.0.0.1:3306", "root", "19384652", "attendace");
    if ($this->conn->connect_error) {
      die("Error de conexión" . $this->conn->connect_error);
    }
  }
  public function getEmpleado()
  {
    $sql = "SELECT * FROM empleado A 
            INNER JOIN cargo B ON A.CARGO = B.ID_CARGO
            INNER JOIN departamento C ON A.DEPARTAMENTO = B.ID_DEPARTAMENTO";
    $resultadoEmpleado = $this->conn->query($sql);
    return $resultadoEmpleado;
  }

  public function registerEmpleado()
  {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $departamento = $_POST['departamento'];
    $cargo = $_POST['cargo'];

    $sqlSE = $this->conn->prepare("INSERT INTO empleado(DNI, NOMBRE, DEPARTAMENTO, CARGO) VALUES(?,?,?,?)");
    $sqlSE->bind_param("isii", $dni, $nombre, $departamento, $cargo);
    $saveEmploye = $sqlSE->execute();
    return $saveEmploye;
  }
}