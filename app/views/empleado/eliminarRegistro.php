<!--Eliminar registro del emplado-->
<div class="modal fade" id="eliminarRegistro" tabindex="-1" aria-labelldby="eliminarRegistroLabel" aria_hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-content">
                <h1 class="modal-tittle fs-5" id="eliminarRegistroLabel">Aviso</h1>
                <button tupe="button" class="btn-close" date-bs-dismiss="modal" aria-label="clase"></button>
            </div>
            <div class="modal-body">
                ¿Estas seguro de eliminar el registro del empleado?
            </div>

            <div class="modal-footer">
                <form action="elimina.php" method="post">

                    <imput type="hidden" name="id" id="id">
                    <button type="button" class="btn  btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="sumbit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>