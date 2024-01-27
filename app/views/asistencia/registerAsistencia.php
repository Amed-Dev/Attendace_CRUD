<!-- Modal -->
<div class="modal fade" id="modalRegisterAttendance" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar asistencia trabajador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data" id="registerAttendanceForm">
          <div class="mb-3">
            <label for="dni" class="form-label">DNI: </label>
            <input type="number" class="form-control" id="dni" name="dni" placeholder="80394852">
          </div>
          <!-- <div class="mb-3">
            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del trabajador">
          </div> -->
          <div class="mb-3">
            <label for="asistencia" class="form-label">Asistencia: </label>
            <select class="form-select asistencia" aria-label="Asistencia" name="asistencia">
              <!-- contenido añadido desde js -->
            </select>
          </div>
          <div class="d-flex justify-content-end gap-2 ">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-save" id="btn-submit"></i>
              Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>