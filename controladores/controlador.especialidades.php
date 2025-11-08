<?php


class ControladorEspecialidades
{
    static public function ctrMostrarEspecialidades($item, $valor)
    {

        $respuesta = ModeloEspecialidades::mdlMostrarEspecialidades($item, $valor);
        return $respuesta;
    }

    static public function ctrAgregarEspecialidades()
    {

        if (isset($_POST["nombre_especialidad"])) {
            $tabla = "especialidades";

            $datos = array(
                "nombre_especialidad" => $_POST["nombre_especialidad"]
            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "especialidades";
            $respuesta = ModeloEspecialidades::mdlAgregarEspecialidades($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "La especialidad se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';

            } else {
                echo '<script>
                    fncSweetAlert(
                    "error",
                    "Esta especialidad ya existe"
                    
                    );
                    </script>';
            }
        }
    }

    static public function ctrEditarEspecialidades()
    {
        $tabla = "especialidades";

        if (isset($_POST["id_especialidad"])) {

            $datos = array(
                "nombre_especialidad" => $_POST["nombre_especialidad"],
                "id_especialidad" => $_POST["id_especialidad"]

            );

            $url = ControladorPlantilla::url() . "especialidades";

            $respuesta = ModeloEspecialidades::mdlEditarEspecialidades($tabla, $datos);

            // print_r($respuesta);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "La especialidad se actualizó correctamente",
                "' . $url . '"
                );
                </script>';

            } else {
                echo '<script>
                    fncSweetAlert(
                    "error",
                    "Esta especialidad ya existe"
                    
                    );
                    </script>';
            }
        }
    }


}
