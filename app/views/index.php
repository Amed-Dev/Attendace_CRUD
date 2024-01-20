<!DOCTYPE html>
<html lang="en" data-bs-theme="">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="stylesheet" href="../../assets/css/all.min.css">
  <link rel="stylesheet" href="./style.css">

  <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
  <title>Attendace CRUD</title>
</head>

<body>
  <div class="container p-4 my-2">
    <h1 class="text-center my-3">Registro de Empleados</h1>

    <!-- Button trigger modal guardar-->
    <div class="row justify-content-end mb-5 my-5">
      <button type="button" class="btn btn-primary col-auto" data-bs-toggle="modal" data-bs-target="#modalSave"> <i
          class="fa-solid fa-circle-plus"></i>
        Nuevo registro de asistencia
      </button>
    </div>
    <!-- Button trigger modal editar-->
    <div class="row justify-content-end mb-5 my-5">
      <button type="button" class="btn btn-warning col-auto" data-bs-toggle="modal" data-bs-target="#editarRegistro"> <i
          class="fa-solid fa-circle-plus"></i>
        Editar empleado
      </button>
    </div>

    <table id="tabla" class="table table-hover">
      <thead class="text-center">
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Departamento</th>
          <th>Cargo</th>
          <th>Asistencia</th>
          <th>Fecha</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
    <?php
    include "./empleado/actualizarEmpleado.php";
    include "./empleado/register.php";
    ?>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>