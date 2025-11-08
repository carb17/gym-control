<?php

require_once 'conexion.php';

class ModeloPagos
{

    static public function mdlMostrarPagos($item = null, $valor = null)
    {
        try {
            if ($item != null) {
                $sql = "SELECT c.*, e.nombre_especialidad, p.monto_plan
                    FROM clientes AS c
                    INNER JOIN planes AS p ON c.id_plan = p.id_plan INNER JOIN especialidades as e ON p.id_especialidad = e.id_especialidad
                    WHERE c.$item = :$item";

                $pagos = Conexion::conectar()->prepare($sql);
                $pagos->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $pagos->execute();

                return $pagos->fetch(PDO::FETCH_ASSOC);
            } else {
                $sql = "SELECT c.*, e.nombre_especialidad, p.monto_plan
                    FROM clientes AS c
                    INNER JOIN planes AS p ON c.id_plan = p.id_plan INNER JOIN especialidades as e ON p.id_especialidad = e.id_especialidad";

                $pagos = Conexion::conectar()->prepare($sql);
                $pagos->execute();

                return $pagos->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }


    static public function mdlEstadoPagos($tabla, $datos)
    {

        $pagos = Conexion::conectar()->prepare("UPDATE $tabla SET pago_mensual = :estado, ultimo_pago = CURDATE() WHERE id = :id ");

        $pagos->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $pagos->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($pagos->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
