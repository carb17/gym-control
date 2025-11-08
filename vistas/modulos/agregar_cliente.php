<?php

$planes = ControladorPlanes::ctrMostrarPlanesActivos();

?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar cliente</h5>
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
                    <label for="nacimiento" class="form-label">Fecha nacimiento</label>
                    <input type="date" name="nacimiento" class="form-control" placeholder="Fecha nacimiento" required>
                </div>
                <div class="mb-3">
                    <label for="inscripcion" class="form-label">Fecha inscripción</label>
                    <input type="date" name="inscripcion" class="form-control" placeholder="Fecha inscripción" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Teléfono</label>
                    <input type="number" name="tel" class="form-control" placeholder="Teléfono" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                </div>
                <div class="mb-3">
                    <label for="id_plan" class="form-label">Planes</label>
                    <select class="form-select" name="id_plan" id="id_plan" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($planes as $key => $plan) { ?>

                            <option value="<?php echo $plan["id_plan"]; ?>"><?php echo $plan["nombre_especialidad"]; ?>
                            </option>

                        <?php } ?>

                    </select>
                </div>


                <?php
                $guardar = new ControladorClientes();
                $guardar->ctrAgregarClientes();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

            </form>
        </div>

    </div>
</div>