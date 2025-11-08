<h1>Especialidades</h1>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="agregar_especialidad" class="btn btn-info">Agregar especialidad</a>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);
                        foreach ($especialidades as $key => $especialidad) {
                            ?>
                            <tr style="background-color:#000888">
                                <td> <?php echo $especialidad["nombre_especialidad"] ?></td>
                                <td><a href="index.php?pagina=editar_especialidad&id_especialidad=<?php echo $especialidad["id_especialidad"] ?>"
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