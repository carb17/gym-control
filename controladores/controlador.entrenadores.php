<?php


class ControladorEntrenadores
{
    static public function ctrMostrarEntrenadores($item, $valor)
    {

        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($item, $valor);
        return $respuesta;
    }

    static public function ctrAgregarEntrenadores()
    {

        if (isset($_POST["dni"])) {
            $tabla = "entrenadores";

            $datos = array(
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "tel" => $_POST["tel"],
                "email" => $_POST["email"],
                "contratacion" => $_POST["contratacion"],
                "id_especialidad" => $_POST["id_especialidad"]
            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "entrenadores";
            $respuesta = ModeloEntrenadores::mdlAgregarEntrenadores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El entrenador se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';

            } else {
                echo '<script>
                    fncSweetAlert(
                    "error",
                    "Este entrenador ya existe"
                    
                    );
                    </script>';
            }
        }
    }

    static public function ctrEditarEntrenadores()
    {
        $tabla = "entrenadores";

        if (isset($_POST["id"])) {

            $datos = array(
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "tel" => $_POST["tel"],
                "email" => $_POST["email"],
                "contratacion" => $_POST["contratacion"],
                "id_especialidad" => $_POST["id_especialidad"],
                "id" => $_POST["id"]

            );

            $url = ControladorPlantilla::url() . "entrenadores";

            $respuesta = ModeloEntrenadores::mdlEditarEntrenadores($tabla, $datos);

            // print_r($respuesta);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El entrenador se actualizó correctamente",
                "' . $url . '"
                );
                </script>';

            } else {
                echo '<script>
                    fncSweetAlert(
                    "error",
                    "Este entrenador ya existe"
                    
                    );
                    </script>';
            }
        }
    }

    static public function ctrEstadoEntrenadores()
    {
        if (isset($_GET["id"]) && isset($_GET["estado"])) {

            $url = ControladorPlantilla::url() . "entrenadores";
            $tabla = "entrenadores";

            $datos = array(
                "id" => $_GET["id"],
                "estado" => $_GET["estado"],
            );

            $respuesta = ModeloEntrenadores::mdlEstadoEntrenadores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El entrenador se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }
}
