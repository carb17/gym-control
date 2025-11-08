<h1>Entrenadores</h1>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="agregar_entrenador" class="btn btn-info">Agregar entrenador</a>
            </div><!-- end card header -->

            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Fecha contratación</th>
                            <th>Especialidad</th>
                            <th>Estado</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);
                        foreach ($entrenadores as $key => $entrenador) {
                            ?>
                            <tr style="background-color:#000888">
                                <td> <?php echo $entrenador["dni"] ?></td>
                                <td> <?php echo $entrenador["nombre"] ?></td>
                                <td> <?php echo $entrenador["apellido"] ?></td>
                                <td> <?php echo $entrenador["tel"] ?> </td>
                                <td> <?php echo $entrenador["email"] ?></td>
                                <td> <?php echo $entrenador["contratacion"] ?></td>
                                <td> <?php echo $entrenador["nombre_especialidad"] ?></td>
                                <td>
                                    <?php if ($entrenador["estado"] == 1) { ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger">Inactivo</span>
                                    <?php } ?>
                                </td>
                                <td><a href="index.php?pagina=editar_entrenador&id=<?php echo $entrenador["id"] ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                    <button class="btn btn-secondary btnEstadoEntrenador" id=<?php echo $entrenador["id"]; ?>
                                        estado=<?php echo $entrenador["estado"]; ?>><i class="fa-solid fa-minus"></i></button>

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

$cambiarEstado = new ControladorEntrenadores();
$cambiarEstado->ctrEstadoEntrenadores();

?>