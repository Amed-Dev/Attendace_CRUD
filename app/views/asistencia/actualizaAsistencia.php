<!-- Modal -->
<div class="modal fade" id="modalUpdateAttendance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar asistencia del trabajador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data" id="updateAttendanceForm">
          <input type="hidden" id="id" name="id">
          <div class="mb-3">
            <label for="dni" class="form-label">DNI: </label>
            <input type="number" class="form-control" id="dni" name="dni" placeholder="..." disabled>
          </div>
          <div class="mb-3">
            <div class="alert alert-warning d-none" id="txtHint"></div>
            <label for="nombre" class="form-label">Nombre del trabajador: </label>
            <input type="text" class="form-control" id="nombre" name="nombre" disabled placeholder="...">
          </div>
          <div class="mb-3">
            <label for="departamento" class="form-label">Departamento: </label>
            <input type="text" class="form-control departamento" aria-label="Departamento" name="departamento"
              id="departamento" disabled>
          </div>
          <div class="mb-3">
            <label for="cargo" class="form-label">Cargo: </label>
            <input type="text" class="form-control cargo" aria-label="Cargo" name="cargo" id="cargo" disabled>
          </div>
          <div class="mb-3">
            <label for="asistencia" class="form-label">Asistencia: </label>
            <select class="form-select asistencia" aria-label="Asistencia" name="asistencia" id="asistencia">
              <!-- contenido añadido desde js -->
            </select>
          </div>
          <div class="d-flex justify-content-end gap-2 ">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btn-submitA"> <i class="fa-solid fa-save" ></i>
              Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>