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
    $resultadoAsistencia = $sqlGA->get_result();

    $estado_asistencia = [];
    if ($resultadoAsistencia->num_rows > 0) {
      while ($row = $resultadoAsistencia->fetch_assoc()) {
        $estado_asistencia[] = array(
          'id' => $row['ID'],
          'estado_asistencia' => $row['ESTADO'],
        );
      }
    }

    return $estado_asistencia;
  }
  public function getListAttendance($formData)
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
  public function registerAttendance($formData)
  {
    $result = array();

    $dni = $formData['dni'];
    $asistencia = $formData['asistencia'];

    $sqlSA = $this->conn->prepare("INSERT INTO registro_asistencia (ID_EMPLEADO, ID_ESTADO)
    VALUES (?, ?);");
    $sqlSA->bind_param("ii", $dni, $asistencia);
    $saveAttendance = $sqlSA->execute();
    if ($saveAttendance) {
      $result['success'] = true;
      $result['message'] = "Las asistencia del trabajador ha sido registrada exitosamente";
    } else {
      $result['success'] = false;
      $result['message'] = "No hemos podido registrar la asistencia del trabajador, comuniquese con el encargado del TI";
    }
    return $result;
  }

  public function updateAttendance($formData)
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
      $result['message'] = "La asistencia ha actualizada exitosamente";
    } else {
      $result['success'] = false;
      $result['message'] = "No hemos podido actualizar la asistencia, comuniquese con el encargado del TI";
    }
    return $result;
  }

  public function getSuggestionForDNI($formData)
  {
    $result = array();
    $dni = $formData['dni'];

    $sqlGEID = $this->conn->prepare("SELECT NOMBRE FROM empleado WHERE DNI = ? LIMIT 1");

    $sqlGEID->bind_param("i", $dni);

    if ($sqlGEID === false) {
      die("Error en la preparación de la consulta: " . $this->conn->error);
    }
    $sqlGEID->execute();
    $resultadoEmpleadoID = $sqlGEID->get_result();

    $empleado = [];
    if ($resultadoEmpleadoID->num_rows > 0) {
      while ($row = $resultadoEmpleadoID->fetch_assoc()) {
        $empleado[] = $row['NOMBRE'];
      }
      $result['encontrado'] = $empleado[0];
    } else {
      $result['no_existe'] = "Usuario no se encuentra en la Base de Datos";
    }
    return $result;
  }
}