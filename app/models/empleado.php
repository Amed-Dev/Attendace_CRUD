<?php
require "../config/dataBase.php";
class Empleado
{
  private $conn;

  public function __construct()
  {
    $db = Database::getInstance();
    $this->conn = $db->getConnection();
  }
  public function getEmpleados()
  {
    $sqlGE = $this->conn->prepare("SELECT * FROM empleado A 
            INNER JOIN cargo B ON A.CARGO = B.ID_CARGO
            INNER JOIN departamento C ON A.DEPARTAMENTO = C.ID_DEPARTAMENTO");
    if ($sqlGE === false) {
      die("Error en la preparación de la consulta: " . $this->conn->error);
    }
    $sqlGE->execute();
    $resultadoEmpleado = $sqlGE->get_result();

    $empleados = [];
    if ($resultadoEmpleado->num_rows > 0) {
      while ($row = $resultadoEmpleado->fetch_assoc()) {
        $empleados[] = array(
          'id' => $row['ID_EMPLEADO'],
          'dni' => $row['DNI'],
          'nombre' => $row['NOMBRE'],
          'departamento' => $row['NOMBRE_DEPARTAMENTO'],
          'cargo' => $row['NOMBRE_CARGO'],
          'fecha_registro' => $row['FECHA_REGISTRO'],
        );
      }
    }

    return $empleados;
  }
  public function getEmpleadosByID($formData)
  {
    $id = $formData['id'];
    $sqlGEID = $this->conn->prepare("SELECT * FROM empleado A 
            INNER JOIN cargo B ON A.CARGO = B.ID_CARGO
            INNER JOIN departamento C ON A.DEPARTAMENTO = C.ID_DEPARTAMENTO WHERE ID_EMPLEADO = ?");
    $sqlGEID->bind_param("i", $id);

    if ($sqlGEID === false) {
      die("Error en la preparación de la consulta: " . $this->conn->error);
    }
    $sqlGEID->execute();
    $resultadoEmpleadoID = $sqlGEID->get_result();

    $empleadoID = [];
    if ($resultadoEmpleadoID->num_rows > 0) {
      while ($row = $resultadoEmpleadoID->fetch_assoc()) {
        $empleadoID[] = array(
          'id' => $row['ID_EMPLEADO'],
          'dni' => $row['DNI'],
          'nombre' => $row['NOMBRE'],
          'departamento' => $row['ID_DEPARTAMENTO'],
          'cargo' => $row['ID_CARGO'],
        );
      }
    }

    return $empleadoID;
  }
  public function registerEmpleado($formData)
  {
    $result = array();

    $dni = $formData['dni'];
    $nombre = $formData['nombre'];
    $departamento = $formData['departamento'];
    $cargo = $formData['cargo'];

    $sqlSE = $this->conn->prepare("INSERT INTO empleado(DNI, NOMBRE, DEPARTAMENTO, CARGO) VALUES(?,?,?,?)");
    $sqlSE->bind_param("isii", $dni, $nombre, $departamento, $cargo);
    $saveEmploye = $sqlSE->execute();
    if ($saveEmploye) {
      $result['success'] = true;
      $result['message'] = "El nuevo trabajador ha sido registrado exitosamente";
    } else {
      $result['success'] = false;
      $result['message'] = "No hemos podido registrar al nuevo trabajador, comuniquese con el encargado del TI";
    }
    return $result;
  }
}