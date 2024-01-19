<?php 

require_once "../models/cargo.php";

if (isset($_POST['accion'])){
  $accion = $_POST['accion'];
  switch ($variable) {
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