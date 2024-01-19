<!-- Modal -->
<div class="modal fade" id="modalRegisterUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar trabajador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data" id="registerEmployeForm">
          <div class="mb-3">
            <label for="nombre" class="form-label">DNI: </label>
            <input type="number" class="form-control" id="nombre" placeholder="80394852">
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del trabajador">
          </div>
          <div class="mb-3">
            <label for="sector" class="form-label">Departamento: </label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Seleccionar...</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="cargo" class="form-label">Cargo: </label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Seleccionar...</option>
              <option value="1"></option>
            </select>
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