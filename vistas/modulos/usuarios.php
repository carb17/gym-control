<h1>Usuarios</h1>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="agregar_usuario" class="btn btn-info">Agregar usuario</a>
            </div><!-- end card header -->

            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);
                        foreach ($usuarios as $key => $usuario) {
                            ?>
                            <tr style="background-color:#000888">
                                <td> <?php echo $usuario["nombre"] ?></td>
                                <td> <?php echo $usuario["apellido"] ?></td>
                                <td> <?php echo $usuario["usuario"] ?> </td>
                                <td>
                                    <?php if ($usuario["estado"] == 1) { ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger">Inactivo</span>
                                    <?php } ?>
                                </td>
                                <td><a href="index.php?pagina=editar_usuario&id=<?php echo $usuario["id"] ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                    <button class="btn btn-secondary btnEstadoUsuario" id=<?php echo $usuario["id"]; ?>
                                        estado=<?php echo $usuario["estado"]; ?>><i class="fa-solid fa-minus"></i></button>

                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php

$cambiarEstado = new ControladorUsuarios();
$cambiarEstado->ctrEstadoUsuarios();

?>