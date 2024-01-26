<?php

require_once "../models/empleado.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $accion = $_POST['method'];
  $model = new Empleado();

  switch ($accion) {
    case 'getEmpleados':
      $empleados = $model->getEmpleados();
      echo json_encode($empleados);
      break;
    case 'getEmpleadosByID':
      $empleados = $model->getEmpleadosByID($_POST);
      echo json_encode($empleados);
      break;
    case 'registerEmpleado':
      $empleados = $model->registerEmpleado($_POST);
      echo json_encode($empleados);
      break;
    // default:
    //   # code...
    //   break;
  }
}