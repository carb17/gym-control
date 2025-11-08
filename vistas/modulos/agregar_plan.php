<?php

$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);

?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar plan</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="id_especialidad" class="form-label">Especialidad</label>
                    <select class="form-select" name="id_especialidad" id="id_especialidad" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($especialidades as $key => $especialidad) { ?>

                            <option value="<?php echo $especialidad["id_especialidad"]; ?>">
                                <?php echo $especialidad["nombre_especialidad"]; ?>
                            </option>

                        <?php } ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Veces por semana</label>
                    <select class="form-select" name="tipo" id="tipo" required>
                        <option value="">Selecciona una opción</option>
                        <option value="2">2 veces por semana</option>
                        <option value="3">3 veces por semana</option>
                        <option value="5">Todos los dias</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración (meses)</label>
                    <input type="number" id="duracion" name="duracion" class="form-control" min="1" max="12" required>
                </div>

                <div class="mb-3">
                    <label for="monto_plan" class="form-label">Precio</label>
                    <input type="number" name="monto_plan" class="form-control" placeholder="Precio $" required>
                </div>


                <?php
                $guardar = new ControladorPlanes();
                $guardar->ctrAgregarPlanes();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

            </form>
        </div>

    </div>
</div>