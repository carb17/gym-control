<?php


class ControladorClientes
{
    static public function ctrMostrarClientes($item, $valor)
    {

        $respuesta = ModeloClientes::mdlMostrarClientes($item, $valor);
        return $respuesta;
    }

    static public function ctrAgregarClientes()
    {

        if (isset($_POST["dni"])) {
            $tabla = "clientes";

            $datos = array(
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "nacimiento" => $_POST["nacimiento"],
                "direccion" => $_POST["direccion"],
                "tel" => $_POST["tel"],
                "email" => $_POST["email"],
                "inscripcion" => $_POST["inscripcion"],
                "id_plan" => $_POST["id_plan"]
            );

            // print_r($datos);

            $url = ControladorPlantilla::url() . "clientes";
            $respuesta = ModeloClientes::mdlAgregarClientes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El cliente se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
        }
    }

    static public function ctrEditarClientes()
    {
        $tabla = "clientes";

        if (isset($_POST["id"])) {

            $datos = array(
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "nacimiento" => $_POST["nacimiento"],
                "inscripcion" => $_POST["inscripcion"],
                "direccion" => $_POST["direccion"],
                "tel" => $_POST["tel"],
                "email" => $_POST["email"],
                "id_plan" => $_POST["id_plan"],
                "id" => $_POST["id"]

            );

            $url = ControladorPlantilla::url() . "clientes";

            $respuesta = ModeloClientes::mdlEditarClientes($tabla, $datos);

            // print_r($respuesta);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El cliente se actualizó correctamente",
                "' . $url . '"
                );
                </script>';

            } else {
                echo '<script>
                    fncSweetAlert(
                    "error",
                    "Este cliente ya existe"
                    );
                    </script>';
            }
        }
    }
}
