<?php

$item = "id_especialidad";
$valor = $_GET["id_especialidad"];

$especialidad = ControladorEspecialidades::ctrMostrarEspecialidades($item, $valor);

?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar especialidad</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre_especialidad" class="form-label">Nombre</label>
                    <input type="text" name="nombre_especialidad" class="form-control" placeholder="Nombre"
                        value="<?php echo $especialidad["nombre_especialidad"]; ?>" required>
                </div>


                <input type="hidden" name="id_especialidad" value="<?php echo $especialidad["id_especialidad"]; ?>">

                <?php
                $editar = new ControladorEspecialidades();
                $editar->ctrEditarEspecialidades();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

            </form>
        </div>

    </div>
</div>