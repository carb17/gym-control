<h1>Planes de entrenamiento</h1>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="agregar_plan" class="btn btn-info">Agregar plan</a>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Especialidad</th>
                            <th>Veces por semana</th>
                            <th>Duración (meses)</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $planes = ControladorPlanes::ctrMostrarPlanes(null, null);
                        foreach ($planes as $key => $plan) {
                            ?>
                            <tr style="background-color:#000888">
                                <td> <?php echo $plan["nombre_especialidad"] ?></td>
                                <td> <?php echo $plan["tipo"] ?> </td>
                                <td> <?php echo $plan["duracion"] ?></td>
                                <td>$ <?php echo $plan["monto_plan"] ?></td>
                                <td>
                                    <?php if ($plan["estado"] == 1) { ?>
                                        <span class="badge bg-success">Disponibilidad</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger">No disponibilidad</span>
                                    <?php } ?>
                                </td>
                                <td><a href="index.php?pagina=editar_plan&id_plan=<?php echo $plan["id_plan"] ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-secondary btnEstadoPlan" id_plan=<?php echo $plan["id_plan"]; ?>
                                        estado=<?php echo $plan["estado"]; ?>><i class="fa-solid fa-minus"></i></button>
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

$cambiarEstado = new ControladorPlanes();
$cambiarEstado->ctrEstadoPlanes();

?>