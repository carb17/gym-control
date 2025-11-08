<h1>Clientes</h1>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="agregar_cliente" class="btn btn-info">Agregar cliente</a>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha nacimiento</th>
                            <th>Fecha inscripción</th>
                            <th>Último pago</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Plan</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $clientes = ControladorClientes::ctrMostrarClientes(null, null);
                        foreach ($clientes as $key => $cliente) {
                            ?>
                            <tr style="background-color:#000888">
                                <td> <?php echo $cliente["dni"] ?></td>
                                <td> <?php echo $cliente["nombre"] ?></td>
                                <td> <?php echo $cliente["apellido"] ?></td>
                                <td> <?php echo $cliente["nacimiento"] ?></td>
                                <td> <?php echo $cliente["inscripcion"] ?></td>
                                <td> <?php echo $cliente["ultimo_pago"] ?></td>
                                <td> <?php echo $cliente["direccion"] ?></td>
                                <td> <?php echo $cliente["tel"] ?> </td>
                                <td> <?php echo $cliente["email"] ?></td>
                                <td> <?php echo $cliente["nombre_especialidad"] ?></td>
                                <td><a href="index.php?pagina=editar_cliente&id=<?php echo $cliente["id"] ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>