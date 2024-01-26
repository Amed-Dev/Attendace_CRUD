<?php
require_once "../models/departamento.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $data = json_decode(file_get_contents("php://input"), true);

  if (isset($data['method'])) {
    $accion = $data['method'];
    switch ($accion) {
      case 'getDepartamento':
        $model = new Departamento();
        $departamentos = $model->getDepartamento();
        echo json_encode($departamentos);
        break;
      // case 'label':
      //   # code...
      //   break;
      // default:
      //   # code...
      //   break;
    }
  }
}