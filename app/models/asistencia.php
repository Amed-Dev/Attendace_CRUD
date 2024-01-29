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
  public function getListAttendance()
  {
    $sqlGAL = $this->conn->prepare("SELECT * FROM empleado A 
            INNER JOIN cargo B ON A.CARGO = B.ID_CARGO
            INNER JOIN departamento C ON A.DEPARTAMENTO = C.ID_DEPARTAMENTO
            INNER JOIN registro_asistencia D ON D.ID_EMPLEADO = A.ID_EMPLEADO 
            INNER JOIN estado_asistencia E ON D.ID_ESTADO = E.ID WHERE A.ACTIVO = b'1' AND DATE(D.FECHA) = DATE(NOW())");

    if ($sqlGAL === false) {
      die("Error en la preparación de la consulta: " . $this->conn->error);
    }
    $sqlGAL->execute();
    $resultadoAttendance = $sqlGAL->get_result();
    $bgColor = [1 => 'success', 2 => 'danger', 3 => 'warning', 4 => 'info'];
    $listAttend = [];
    if ($resultadoAttendance->num_rows > 0) {
      while ($row = $resultadoAttendance->fetch_assoc()) {
        $color = $bgColor[$row['ID_ESTADO']];
        $listAttend[] = array(
          'id' => $row['ID_EMPLEADO'],
          'dni' => $row['DNI'],
          'nombre' => $row['NOMBRE'],
          'departamento' => $row['NOMBRE_DEPARTAMENTO'],
          'cargo' => $row['NOMBRE_CARGO'],
          'color' => $color,
          'asistencia' => $row['ESTADO'],
          'fecha' => $row['FECHA'],
        );
      }
    }

    return $listAttend;
  }
  public function getListAttendanceByID($formData)
  {
    $id = $formData['id'];
    $sqlGAID = $this->conn->prepare("SELECT * FROM empleado A 
            INNER JOIN cargo B ON A.CARGO = B.ID_CARGO
            INNER JOIN departamento C ON A.DEPARTAMENTO = C.ID_DEPARTAMENTO
            INNER JOIN registro_asistencia D ON D.ID_EMPLEADO = A.ID_EMPLEADO 
            INNER JOIN estado_asistencia E ON D.ID_ESTADO = E.ID WHERE A.ID_EMPLEADO = ?");
    $sqlGAID->bind_param("i", $id);
    if ($sqlGAID === false) {
      die("Error en la preparación de la consulta: " . $this->conn->error);
    }
    $sqlGAID->execute();
    $resultadoAttendance = $sqlGAID->get_result();
    $bgColor = [1 => 'success', 2 => 'danger', 3 => 'warning', 4 => 'info'];
    $listAttendID = [];
    if ($resultadoAttendance->num_rows > 0) {
      while ($row = $resultadoAttendance->fetch_assoc()) {
        $color = $bgColor[$row['ID_ESTADO']];
        $listAttendID[] = array(
          'id' => $row['ID_EMPLEADO'],
          'dni' => $row['DNI'],
          'nombre' => $row['NOMBRE'],
          'departamento' => $row['NOMBRE_DEPARTAMENTO'],
          'cargo' => $row['NOMBRE_CARGO'],
          'color' => $color,
          'asistencia' => $row['ID'],
        );
      }
    }

    return $listAttendID;
  }
  public function registerAttendance($formData)
  {
    $result = array();

    $id = $formData['id'];
    $asistencia = $formData['asistencia'];

    $sqlSA = $this->conn->prepare("INSERT INTO registro_asistencia (ID_EMPLEADO, ID_ESTADO)
    VALUES (?, ?);");
    $sqlSA->bind_param("ii", $id, $asistencia);
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
    $asistencia = $formData['asistencia'];

    $sqlSE = $this->conn->prepare("UPDATE registro_asistencia SET ID_ESTADO = ? WHERE ID_EMPLEADO = ?");
    $sqlSE->bind_param("ii", $asistencia, $id);
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

    $sqlGEID = $this->conn->prepare("SELECT NOMBRE, ID_EMPLEADO FROM empleado WHERE DNI = ? LIMIT 1");

    $sqlGEID->bind_param("i", $dni);

    if ($sqlGEID === false) {
      die("Error en la preparación de la consulta: " . $this->conn->error);
    }
    $sqlGEID->execute();
    $resultadoEmpleadoID = $sqlGEID->get_result();

    $empleado = [];
    if ($resultadoEmpleadoID->num_rows > 0) {
      while ($row = $resultadoEmpleadoID->fetch_assoc()) {
        $empleado[] = array(
          'nombre' => $row['NOMBRE'],
          'id' => $row['ID_EMPLEADO'],
        );
      }
      $result['encontrado'] = $empleado;
    } else {
      $result['no_existe'] = "El usuario no se encuentra en la Base de Datos";
    }
    return $result;
  }
}