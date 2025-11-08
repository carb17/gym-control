<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar especialidad</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre_especialidad" class="form-label">Nombre</label>
                    <input type="text" name="nombre_especialidad" class="form-control" placeholder="Nombre" required>
                </div>

                <?php
                $guardar = new ControladorEspecialidades();
                $guardar->ctrAgregarEspecialidades();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

            </form>
        </div>

    </div>
</div>