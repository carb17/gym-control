<?php

$item = "id";
$valor = $_GET["id"];

$usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar usuario</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                        value="<?php echo $usuario["nombre"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido"
                        value="<?php echo $usuario["apellido"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control"
                        value="<?php echo $usuario["usuario"]; ?>" placeholder="Usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contrasena</label>
                    <input type="password" id="contrasena" name="contrasena" class="form-control"
                        placeholder="Contraseña" value="<?php echo $usuario["contrasena"]; ?>" required>
                </div>

                <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">

                <?php
                $editar = new ControladorUsuarios();
                $editar->ctrEditarUsuarios();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>

            </form>
        </div>

    </div>
</div>