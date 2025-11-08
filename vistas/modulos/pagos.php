<h1>Pagos</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Plan</th>
                            <th>Monto</th>
                            <th>Estado del pago</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $pagos = ControladorPagos::ctrMostrarPagos(null, null);
                        foreach ($pagos as $key => $pago) {
                            ?>
                            <tr style="background-color:#000888">
                                <td> <?php echo $pago["dni"] ?></td>
                                <td> <?php echo $pago["nombre"] ?></td>
                                <td> <?php echo $pago["apellido"] ?></td>
                                <td> <?php echo $pago["nombre_especialidad"] ?> </td>
                                <td> <?php echo $pago["monto_plan"] ?></td>
                                <td> <?php if ($pago["pago_mensual"] == 1) { ?>
                                        <span class="badge bg-success">Aprobado</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger">Pendiente</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <button class="btn btn-secondary btnEstadoPago" id=<?php echo $pago["id"]; ?>
                                        estado=<?php echo $pago["pago_mensual"]; ?>>
                                        <i class="fa-solid fa-minus"></i></button>
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

$cambiarEstado = new ControladorPagos();
$cambiarEstado->ctrEstadoPagos();

?>