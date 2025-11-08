<?php

$item = "id_plan";
$valor = $_GET["id_plan"];

$plan = ControladorPlanes::ctrMostrarPlanes($item, $valor);
$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);

?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar plan</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">

                <div class="mb-3">
                    <label for="id_especialidad" class="form-label">Especialidad</label>
                    <select name="id_especialidad" id="id_especialidad" class="form-select" required>

                        <option value="">Selecciona una opción</option>

                        <?php foreach ($especialidades as $key => $especialidad) { ?>

                            <option 
                                value="<?php echo $especialidad["id_especialidad"]; ?>" 
                                <?php echo ($especialidad["id_especialidad"] == $plan["id_especialidad"]) ? 'selected' : ''; ?>>
                                <?php echo $especialidad["nombre_especialidad"]; ?>
                            </option>

                        <?php } ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Veces por semana</label>
                    <select class="form-select" name="tipo" id="tipo" required>
                        <option value="<?php echo $plan["nombre_plan"]; ?>" required></option>
                        <option value="2" <?php echo ($plan["tipo"] == 2) ? 'selected' : ''; ?>>2 veces por semana
                        </option>
                        <option value="3" <?php echo ($plan["tipo"] == 3) ? 'selected' : ''; ?>>3 veces por semana
                        </option>
                        <option value="5" <?php echo ($plan["tipo"] == 5) ? 'selected' : ''; ?>>Todos los días</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración</label>
                    <input type="text" id="duracion" name="duracion" class="form-control"
                        placeholder="Ej: 1 mes, 3 meses, etc." value="<?php echo $plan["duracion"]; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="monto_plan" class="form-label">Precio</label>
                    <input type="number" id="monto_plan" name="monto_plan" class="form-control"
                         value="<?php echo $plan["monto_plan"]; ?>" required>
                </div>

                <input type="hidden" name="id_plan" value="<?php echo $plan["id_plan"]; ?>">

                <?php
                $editar = new ControladorPlanes();
                $editar->ctrEditarPlanes();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

            </form>
        </div>

    </div>
</div>