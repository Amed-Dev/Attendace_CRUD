<?php
require_once "../models/departamento.php";

if (isset($_POST['accion'])) {
  $accion = $_POST['accion'];
  switch ($variable) {
    case 'getDepartamento':
      $model = new Departamento();
      $cargos = $model->getDepartamento();
      echo json_encode($cargos);
      break;
    // case 'label':
    //   # code...
    //   break;
    // default:
    //   # code...
    //   break;
  }
}