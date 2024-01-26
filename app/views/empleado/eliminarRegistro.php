<!--Eliminar registro del emplado-->
<div class="modal fade" id="eliminarRegistro" tabindex="-1" aria-labelldby="eliminarRegistroLabel" aria_hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-tittle fs-5 text-danger-emphasis " id="eliminarRegistroLabel">Cuidado 🟠</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="fw-semibold text-secondary-emphasis">
          <p>Esta acción quitara al empleado del sistema de asistencia de
            forma permanente.</p>
          <p>Esta acción no se podrá
            revertir</p>
        </div>
        <form action="" method="POST">
          <imput type="hidden" name="id" id="id">
        </form>
      </div>
      <div class="modal-footer">
        <div class="row w-100">
          <div class="col-12 fw-bold">¿Desea continuar?</div>
        </div>

        <div class="w-50">
          <button type="button" class="btn  btn-secondary col-5" data-bs-dismiss="modal">No</button>
          <button type="sumbit" class="btn btn-danger col-5">Si</button>
        </div>
      </div>
    </div>
  </div>
</div>