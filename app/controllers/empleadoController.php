<?php

require_once "../models/empleado.php";

if (isset($_POST['accion'])) {
  $accion = $_POST['accion'];
  switch ($variable) {
    case 'getEmpleado':
      $model = new Empleado();
      $empleados = $model->getEmpleado();
      echo json_encode($empleados);
      break;
    case 'registerEmpleado':
      $model = new Empleado();
      $empleados = $model->registerEmpleado();
      echo json_encode($empleados);
      break;
    // default:
    //   # code...
    //   break;
  }
}