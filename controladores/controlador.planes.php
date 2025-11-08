<?php


class ControladorPlanes
{


    static public function ctrMostrarPlanes($item, $valor)
    {

        $respuesta = ModeloPlanes::mdlMostrarPlanes($item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarPlanesActivos()
    {
        return ModeloPlanes::mdlMostrarPlanesActivos();
    }

    static public function ctrAgregarPlanes()
    {
        if (isset($_POST["id_especialidad"])) {

            $tabla = "planes";
            $datos = array(
                "id_especialidad" => $_POST["id_especialidad"],
                "tipo" => $_POST["tipo"],
                "duracion" => $_POST["duracion"],
                "monto_plan" => $_POST["monto_plan"],

            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "planes";
            $respuesta = ModeloPlanes::mdlAgregarPlanes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El plan se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
        }
    }

    /*=============================================
EDITAR DATOS
=============================================*/
    static public function ctrEditarPlanes()
    {
        $tabla = "planes";

        if (isset($_POST["id_plan"])) {
            $datos = array(
                "id_especialidad" => $_POST["id_especialidad"],
                "tipo" => $_POST["tipo"],
                "duracion" => $_POST["duracion"],
                "monto_plan" => $_POST["monto_plan"],
                "id_plan" => $_POST["id_plan"],

            );

            // print_r($tabla);
            // print_r($datos);

            $url = ControladorPlantilla::url() . "planes";

            $respuesta = ModeloPlanes::mdlEditarPlanes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El plan se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }

    static public function ctrEstadoPlanes()
    {
        if (isset($_GET["id_plan"])) {
            $url = ControladorPlantilla::url() . "planes";

            $tabla = "planes";

            $datos = array(
                "id_plan" => $_GET["id_plan"],
                "estado" => $_GET["estado"]
            );

            $respuesta = ModeloPlanes::mdlEstadoPlanes($tabla, $datos);


            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El estado del plan se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }
}
