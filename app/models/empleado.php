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
            INNER JOIN departamento C ON A.DEPARTAMENTO = C.ID_DEPARTAMENTO WHERE A.ACTIVO = b'1'");
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
  public function deleteEmpleado($formData)
  {
    $result = array();

    $id = $formData['id'];

    $sqlSE = $this->conn->prepare("UPDATE empleado SET ACTIVO = b'0' WHERE ID_EMPLEADO = ?");
    $sqlSE->bind_param("i", $id);
    $deleteEmploye = $sqlSE->execute();
    if ($deleteEmploye) {
      $result['success'] = true;
      $result['message'] = "El trabajador ha sido eliminado exitosamente";
    } else {
      $result['success'] = false;
      $result['message'] = "No hemos podido eliminar el trabajador, comuniquese con el encargado del TI";
    }
    return $result;
  }
}