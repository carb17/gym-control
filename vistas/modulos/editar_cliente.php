<?php

$item = "id";
$valor = $_GET["id"];

$cliente = ControladorClientes::ctrMostrarClientes($item, $valor);
$planes = ControladorPlanes::ctrMostrarPlanesActivos();

?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar cliente</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" class="form-control" placeholder="DNI"
                        value="<?php echo $cliente["dni"]; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                        value="<?php echo $cliente["nombre"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido"
                        value="<?php echo $cliente["apellido"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nacimiento" class="form-label">Fecha nacimiento</label>
                    <input type="date" name="nacimiento" class="form-control" placeholder="Fecha nacimiento"
                        value="<?php echo $cliente["nacimiento"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="inscripcion" class="form-label">Fecha inscripción</label>
                    <input type="date" name="inscripcion" class="form-control" placeholder="Fecha inscripción"
                        value="<?php echo $cliente["inscripcion"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="<?php echo $cliente["direccion"]; ?>" placeholder="Dirección" required>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Teléfono</label>
                    <input type="text" id="tel" name="tel" class="form-control" value="<?php echo $cliente["tel"]; ?>"
                        placeholder="Teléfono" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo"
                        value="<?php echo $cliente["email"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="id_plan" class="form-label">Planes</label>
                    <select name="id_plan" id="id_plan" class="form-select" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($planes as $key => $plan) {
                            $selected = ($plan["id_plan"] == $cliente["id_plan"]) ? "selected" : "";
                            ?>
                            <option value="<?php echo $plan["id_plan"]; ?>" <?php echo $selected; ?>>
                                <?php echo $plan["nombre_especialidad"]; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <input type="hidden" name="id" value="<?php echo $cliente["id"]; ?>">

                <?php
                $editar = new ControladorClientes();
                $editar->ctrEditarClientes();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

            </form>
        </div>

    </div>
</div>