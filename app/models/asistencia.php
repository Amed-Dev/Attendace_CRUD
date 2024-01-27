<?php
require "../config/dataBase.php";
class Asistencia
{

  private $conn;
  public function __construct()
  {
    $db = Database::getInstance();
    $this->conn = $db->getConnection();
  }
  public function getSatusAttendace()
  {
    $sqlGA = $this->conn->prepare("SELECT * FROM estado_asistencia");

    if ($sqlGA === false) {
      die("Error en la preparación de la consulta: " . $this->conn->error);
    }
    $sqlGA->execute();
    $resultadoEmpleado = $sqlGA->get_result();

    $estado_asistencia = [];
    if ($resultadoEmpleado->num_rows > 0) {
      while ($row = $resultadoEmpleado->fetch_assoc()) {
        $estado_asistencia[] = array(
          'id' => $row['ID'],
          'estado_asistencia' => $row['ESTADO'],
        );
      }
    }

    return $estado_asistencia;
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

  public function updateEmpleado($formData)
  {
    $result = array();

    $id = $formData['id'];
    $dni = $formData['dni'];
    $nombre = $formData['nombre'];
    $departamento = $formData['departamento'];
    $cargo = $formData['cargo'];

    $sqlSE = $this->conn->prepare("UPDATE empleado SET DNI = ?, NOMBRE = ?, DEPARTAMENTO = ?, CARGO = ? WHERE ID_EMPLEADO = ?");
    $sqlSE->bind_param("isiii", $dni, $nombre, $departamento, $cargo, $id);
    $updateEmploye = $sqlSE->execute();
    if ($updateEmploye) {
      $result['success'] = true;
      $result['message'] = "El trabajador ha sido actualizado exitosamente";
    } else {
      $result['success'] = false;
      $result['message'] = "No hemos podido actualizar el trabajador, comuniquese con el encargado del TI";
    }
    return $result;
  }
}