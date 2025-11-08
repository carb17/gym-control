<?php

$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);

?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="number" name="dni" class="form-control" placeholder="DNI" required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Teléfono</label>
                    <input type="number" name="tel" class="form-control" placeholder="Teléfono" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                </div>
                <div class="mb-3">
                    <label for="contratacion" class="form-label">Fecha contratación</label>
                    <input type="date" name="contratacion" class="form-control" placeholder="Fecha contratación"
                        required>
                </div>
                <div class="mb-3">
                    <label for="id_especialidad" class="form-label">Especialidades</label>
                    <select class="form-select" name="id_especialidad" id="id_especialidad" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($especialidades as $key => $especialidad) { ?>

                            <option value="<?php echo $especialidad["id_especialidad"]; ?>">
                                <?php echo $especialidad["nombre_especialidad"]; ?>
                            </option>

                        <?php } ?>

                    </select>
                </div>

                <?php
                $guardar = new ControladorEntrenadores();
                $guardar->ctrAgregarEntrenadores();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

            </form>
        </div>

    </div>
</div>