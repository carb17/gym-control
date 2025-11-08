<?php

require_once 'conexion.php';

class ModeloPlanes
{

    static public function mdlMostrarPlanes($item, $valor)
    {
        if ($item != null) {
            try {
                $planes = Conexion::conectar()->prepare("SELECT * FROM planes WHERE $item = :$item");

                $planes->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $planes->execute();

                return $planes->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $planes = Conexion::conectar()->prepare("SELECT * FROM planes as p INNER JOIN especialidades as e ON p.id_especialidad = e.id_especialidad");

                $planes->execute();

                return $planes->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlMostrarPlanesActivos(): array|string
    {
        try {
            $planes = Conexion::conectar()->prepare("
            SELECT p.id_plan, p.tipo, p.duracion, p.monto_plan, e.nombre_especialidad 
            FROM planes AS p
            INNER JOIN especialidades AS e ON p.id_especialidad = e.id_especialidad
            WHERE p.estado = 1
        ");

            $planes->execute();

            return $planes->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }



    static public function mdlAgregarPlanes($tabla, $datos)
    {
        try {
            $planes = Conexion::conectar()->prepare("INSERT INTO $tabla (id_especialidad, tipo, duracion, monto_plan, estado) VALUES (:id_especialidad, :tipo, :duracion, :monto_plan, :estado)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $planes->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);
            $planes->bindParam(":tipo", $datos["tipo"], PDO::PARAM_INT);
            $planes->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
            $planes->bindParam(":monto_plan", $datos["monto_plan"], PDO::PARAM_INT);
            $planes->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);


            if ($planes->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarPlanes($tabla, $datos)
    {
        try {
            $planes = Conexion::conectar()->prepare("UPDATE $tabla SET id_especialidad = :id_especialidad, tipo = :tipo, duracion = :duracion, monto_plan = :monto_plan WHERE id_plan = :id_plan");

            $planes->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);
            $planes->bindParam(":tipo", $datos["tipo"], PDO::PARAM_INT);
            $planes->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
            $planes->bindParam(":monto_plan", $datos["monto_plan"], PDO::PARAM_INT);
            $planes->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);

            if ($planes->execute()) {
                return "ok";
            } else {

                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEstadoPlanes($tabla, $datos)
    {
        $planes = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado WHERE id_plan = :id_plan");

        $planes->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $planes->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);

        if ($planes->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
