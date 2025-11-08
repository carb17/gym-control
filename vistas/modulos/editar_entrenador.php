<?php

$item = "id";
$valor = $_GET["id"];

$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);
$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);


?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" class="form-control" placeholder="DNI"
                        value="<?php echo $entrenador["dni"]; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                        value="<?php echo $entrenador["nombre"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido"
                        value="<?php echo $entrenador["apellido"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Teléfono</label>
                    <input type="text" id="tel" name="tel" class="form-control"
                        value="<?php echo $entrenador["tel"]; ?>" placeholder="Teléfono" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo"
                        value="<?php echo $entrenador["email"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha contratación</label>
                    <input type="date" name="contratacion" class="form-control" placeholder="Fecha contratación"
                        value="<?php echo $entrenador["contratacion"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="id_especialidad" class="form-label">Especialidad</label>
                    <select name="id_especialidad" id="id_especialidad" class="form-select" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($especialidades as $especialidad) {
                            $selected = ($especialidad["id_especialidad"] == $entrenador["id_especialidad"]) ? "selected" : "";
                            ?>
                            <option value="<?php echo $especialidad["id_especialidad"]; ?>" <?php echo $selected; ?>>
                                <?php echo $especialidad["nombre_especialidad"]; ?>
                            </option>
                        <?php } ?>


                    </select>
                </div>

                <input type="hidden" name="id" value="<?php echo $entrenador["id"]; ?>">

                <?php
                $editar = new ControladorEntrenadores();
                $editar->ctrEditarEntrenadores();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>

            </form>
        </div>

    </div>
</div>