<?php


class ControladorUsuarios
{

    static public function ctrIngresoUsuarios()
    {
        if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {

            // Validar formato del usuario
            if (preg_match('/^[a-zA-Z0-9_]+$/', $_POST["usuario"])) {

                $item = "usuario";
                $valor = trim($_POST["usuario"]);

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($item, $valor);

                // Verificar si el usuario existe
                if ($respuesta && isset($respuesta["contrasena"])) {

                    // Verificar la contraseña encriptada
                    if (password_verify(trim($_POST["contrasena"]), $respuesta["contrasena"])) {

                        echo '<script>
                    fncSweetAlert("loading", "Ingresando..", "")
                    </script>';

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["apellido"] = $respuesta["apellido"];

                        echo '<script>
                    window.location = "' . ControladorPlantilla::url() . '";
                    </script>';

                    } else {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                    Contraseña incorrecta.
                    </div>';
                    }

                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">
                El usuario no existe.
                </div>';
                }

            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">
            El formato del usuario no es válido.
            </div>';
            }
        }
    }

    static public function ctrMostrarUsuarios($item, $valor)
    {

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($item, $valor);
        return $respuesta;
    }

    static public function ctrAgregarUsuarios()
    {

        if (isset($_POST["nombre"])) {
            $tabla = "usuarios";

            $hashedContrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

            $datos = array(
                "usuario" => $_POST["usuario"],
                "contrasena" => $hashedContrasena,
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"]
            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "usuarios";
            $respuesta = ModeloUsuarios::mdlAgregarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El usuario se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';

            } else {
                echo '<script>
                    fncSweetAlert(
                    "error",
                    "Este usuario ya existe"
                    
                    );
                    </script>';
            }
        }
    }

    /*=============================================
EDITAR DATOS
=============================================*/
    static public function ctrEditarUsuarios()
    {
        $tabla = "usuarios";

        if (isset($_POST["id"])) {
            if (!empty($_POST["contrasena"])) {
                // CIFRAR CONTRASEÑA
                $hashedContrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
            } else {
                // SI NO SE PROPORCIONA UNA NUEVA CONTRASEÑA, QUEDA LA ACTUAL
                $hashedContrasena = $_POST["contrasena_actual"];
            }
            $datos = array(
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "usuario" => $_POST["usuario"],
                "contrasena" => $hashedContrasena,
                "id" => $_POST["id"]

            );

            $url = ControladorPlantilla::url() . "usuarios";

            $respuesta = ModeloUsuarios::mdlEditarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El usuario se actualizó correctamente",
                "' . $url . '"
                );
                </script>';

            } else {
                echo '<script>
                    fncSweetAlert(
                    "error",
                    "Este usuario ya existe"
                    );
                    </script>';
            }
        }
    }

    static public function ctrEstadoUsuarios()
    {
        if (isset($_GET["id"]) && isset($_GET["estado"])) {

            $url = ControladorPlantilla::url() . "usuarios";
            $tabla = "usuarios";

            $datos = array(
                "id" => $_GET["id"],
                "estado" => $_GET["estado"]
            );

            $respuesta = ModeloUsuarios::mdlEstadoUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El estado del usuario se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }
}
