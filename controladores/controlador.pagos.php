<?php


class ControladorPagos
{

    static public function ctrMostrarPagos($item, $valor)
    {

        $respuesta = ModeloPagos::mdlMostrarPagos($item, $valor);
        return $respuesta;
    }


    static public function ctrEstadoPagos()
    {
        if (isset($_GET["id"]) && isset($_GET["estado"])) {

            $url = ControladorPlantilla::url() . "pagos";
            $tabla = "clientes";

            $datos = array(

                "id" => $_GET["id"],
                "estado" => $_GET["estado"]
            );

            $respuesta = ModeloPagos::mdlEstadoPagos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El pago se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }
}
