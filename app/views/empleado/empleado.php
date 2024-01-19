<!--modal empleado-->
<div class="modal fade" id="editarRegistro" tabindex="-1" aria-labelledby="editarRegistroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editarRegistroLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="..." method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="Dni" class="form-label">DNI</label>
                    <input type="text" name="dni" id="dni" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="departamento" class="form-label">Sector de trabajo</label>
                    <select name="departamento" id="departamento" class="form-select" required> <option value="">Seleccionar...</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="Cargo" class="form-label">Cargo</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" required>
                </div>
                
                <div class="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-flopy-disk"></i>Guardar</button>
                </div>

                </form>
            </div>
            
        </div>
    </div>
</div>