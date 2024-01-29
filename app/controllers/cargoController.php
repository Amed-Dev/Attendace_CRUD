<?php

require_once "../models/cargo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $data = json_decode(file_get_contents("php://input"), true);

  if (isset($data['method'])) {
    $accion = $data['method'];
    switch ($accion) {
      case 'getCargo':
        $model = new Cargo();
        $cargos = $model->getCargo();
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
}