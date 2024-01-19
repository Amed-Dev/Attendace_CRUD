<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en" data-bs-theme="dark">
=======
<html lang="en" data-bs-theme="">
>>>>>>> 98317327864318c67dce89f2ccfde11778cb9c40

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="stylesheet" href="../../assets/css/all.min.css">
<<<<<<< HEAD
  <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
=======
  <link rel="stylesheet" href="./style.css">
>>>>>>> 98317327864318c67dce89f2ccfde11778cb9c40
  <title>Attendace CRUD</title>
</head>

<body>
  <div class="container p-4 my-2">
<<<<<<< HEAD
    <h1 class="text-center my-3">Asitencia empleados</h1>

    <!-- Button trigger modal -->
    <div class="row justify-content-end my-4">
      <button type="button" class="btn btn-primary col-auto" data-bs-toggle="modal" data-bs-target="#modalSave"> <i
          class="fa-solid fa-circle-plus"></i>
        Launch demo modal
=======
    <h1 class="text-center my-3">Registro de Empleados</h1>

    <!-- Button trigger modal -->
    <div class="row justify-content-end mb-5 my-5">
      <button type="button" class="btn btn-primary col-auto" data-bs-toggle="modal" data-bs-target="#modalSave"> <i
          class="fa-solid fa-circle-plus"></i>
        Nuevo registro de asistencia
>>>>>>> 98317327864318c67dce89f2ccfde11778cb9c40
      </button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalSave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar trabajador</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre del trabajador">
              </div>
              <div class="mb-3">
<<<<<<< HEAD
                <label for="sector" class="form-label">Sector de trabajo: </label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
=======
                <label for="sector" class="form-label">Departamento: </label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Seleccionar...</option>
                  <option value="1">Recursos Humanos</option>
                  <option value="2">Contabilidad</option>
                  <option value="3">Gerencia</option>
                  <option value="4">Departamento de Limpieza</option>
                  <option value="5">Departamento de Seguridad</option>
>>>>>>> 98317327864318c67dce89f2ccfde11778cb9c40
                </select>
              </div>
              <div class="mb-3">
                <label for="cargo" class="form-label">Cargo: </label>
                <select class="form-select" aria-label="Default select example">
<<<<<<< HEAD
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
=======
                  <option selected>Seleccionar...</option>
                  <option value="1"></option>
                  <option value="2"></option>
                  <option value="3"></option>
                  <option value="4"></option>
                </select>
              </div>
              <div class="mb-3">
                <label for="cargo" class="form-label">Asistencia: </label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Seleccionar...</option>
                  <option value="1">Presente</option>
                  <option value="2">Falta</option>
                  <option value="3">Tardanza</option>
                  <option value="4">Permiso</option>
>>>>>>> 98317327864318c67dce89f2ccfde11778cb9c40
                </select>
              </div>
              <div class="mb-3">
                <label for="fecha" class="form-label">Fecha: </label>
                <input type="text" class="form-control" id="fecha" placeholder="Nombre del trabajador">
              </div>
<<<<<<< HEAD
              <div class="mb-3">
                <label for="foto_perfil" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="foto_perfil">
              </div>
=======
>>>>>>> 98317327864318c67dce89f2ccfde11778cb9c40
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary"> <i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>
        </div>
      </div>
    </div>

<<<<<<< HEAD
    <table class="table  table-dark table-hover">
      <thead class="text-center">
        <tr>
          <th> DNI </th>
          <th> Nombre</th>
          <th> Cargo</th>
          <th> Asistencia</th>
          <th> Fecha</th>
=======
    <table id="tabla" class="table table-hover">
      <thead class="text-center">
        <tr>
          <th>DNI</th>
          <th> Nombre</th>
          <th>Departamento</th>
          <th> Cargo</th>
          <th> Asistencia</th>
          <th> Fecha</th>
          <th> Acción</th>
>>>>>>> 98317327864318c67dce89f2ccfde11778cb9c40
        </tr>
      </thead>
      <tbody>
        <!-- //<?php
        //require "shownData.php";
        //while($row = $sql->fetch_assoc()){
        //echo '<tr>';
        //echo '  <td>'. $row['ID'].'</td>';
        //echo '</tr>';
        //}
        //?> -->
      </tbody>
    </table>
<<<<<<< HEAD
  </div>
=======
>>>>>>> 98317327864318c67dce89f2ccfde11778cb9c40
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>