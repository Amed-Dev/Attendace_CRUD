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

    <!-- Button trigger modal -->
    <div class="row justify-content-end mb-5 my-5">
      <button type="button" class="btn btn-primary col-auto" data-bs-toggle="modal" data-bs-target="#modalSave"> <i
          class="fa-solid fa-circle-plus"></i>
        Nuevo registro de asistencia
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
                <label for="sector" class="form-label">Departamento: </label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Seleccionar...</option>
                  <option value="1">Recursos Humanos</option>
                  <option value="2">Contabilidad</option>
                  <option value="3">Gerencia</option>
                  <option value="4">Departamento de Limpieza</option>
                  <option value="5">Departamento de Seguridad</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="cargo" class="form-label">Cargo: </label>
                <select class="form-select" aria-label="Default select example">
    <option selected>Seleccionar...</option>
    <optgroup>
    <optgroup label="Recursos Humanos">
    <option value="1">Gerente de Recursos Humanos</option>
    <option value="2">Asistente de Recursos Humanos</option>
    <option value="3">Analista de Recursos Humanos</option>
    <option value="4">Especialista en Capacitación</option>
    <option value="5">Coordinador de Personal</option>
    <option value="6">Asesor de Empleados</option>
    <option value="7">Especialista en Beneficios</option>
    <option value="8">Reclutador</option>
    <option value="9">Asistente de Nómina</option>
    <option value="10">Consultor de RRHH</option>
    </optgroup>
    <!-- Cargos para Contabilidad -->
    <optgroup>
    <optgroup label="Contabilidad">
    <option value="11">Contador Principal</option>
    <option value="12">Asistente de Contabilidad</option>
    <option value="13">Analista Financiero</option>
    <option value="14">Auditor Interno</option>
    <option value="15">Especialista en Impuestos</option>
    <option value="16">Controller Financiero</option>
    <option value="17">Analista de Presupuesto</option>
    <option value="18">Cajero</option>
    <option value="19">Analista de Costos</option>
    <option value="20">Economista</option>
    </optgroup>
    <!-- Cargos para Gerencia -->
    <optgroup>
    <optgroup label="Gerencia">
    <option value="21">CEO</option>
    <option value="22">Director Ejecutivo</option>
    <option value="23">Vicepresidente</option>
    <option value="24">Director de Operaciones</option>
    <option value="25">Director de Marketing</option>
    <option value="26">Director de Tecnología</option>
    <option value="27">Director de Ventas</option>
    <option value="28">Director de Recursos Humanos</option>
    <option value="29">Director Financiero</option>
    <option value="30">Gerente General</option>
    </optgroup>
    <!-- Cargos para Departamento de Limpieza -->
    <optgroup>
    <optgroup label="Departamento de Seguridad">
    <option value="31">Supervisor de Limpieza</option>
    <option value="32">Personal de Limpieza</option>
    <option value="33">Encargado de Mantenimiento</option>
    <option value="34">Operario de Limpieza</option>
    <option value="35">Jefe de Logística</option>
    <option value="36">Técnico de Limpieza</option>
    <option value="37">Operador de Máquinas de Limpieza</option>
    <option value="38">Asistente de Limpieza</option>
    <option value="39">Coordinador de Limpieza</option>
    <option value="40">Especialista en Desinfección</option>
    </optgroup>
    <!-- Cargos para Departamento de Seguridad -->
    <optgroup>
    <optgroup label="Departamento de Seguridad">
    <option value="41">Jefe de Seguridad</option>
    <option value="42">Guardia de Seguridad</option>
    <option value="43">Supervisor de Seguridad</option>
    <option value="44">Especialista en Seguridad Corporativa</option>
    <option value="45">Oficial de Seguridad</option>
    <option value="46">Técnico en Sistemas de Seguridad</option>
    <option value="47">Inspector de Seguridad</option>
    <option value="48">Guardia de Patrulla</option>
    <option value="49">Coordinador de Seguridad</option>
    <option value="50">Analista de Riesgos</option>
    </optgroup>
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
                </select>
              </div>
              <div class="mb-3">
                <label for="fecha" class="datetime">Fecha: </label>
                <input type="date" class="form-control" id="fecha" placeholder="Nombre del trabajador">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary"> <i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>
        </div>
      </div>
    </div>

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
  </div>
<?php include '../views/empleado/register.php'; ?>
<?php include '../views/asistencia/asistencia.php'; ?>
<?php include '../views/empleado/eliminarRegistro.php'; ?>

<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script>
  var myModal = new bootstrap.Modal(document.getElementById('modalSave'), {
    keyboard: false
  });
</script>

</body>
</html>
