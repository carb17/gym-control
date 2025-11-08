<?php

require_once 'conexion.php';

class ModeloEspecialidades
{

    static public function mdlMostrarEspecialidades($item, $valor)
    {
        if ($item != null) {
            try {
                $especialidades = Conexion::conectar()->prepare("SELECT * FROM especialidades WHERE $item = :$item");
                $especialidades->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $especialidades->execute();

                return $especialidades->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $especialidades = Conexion::conectar()->prepare("SELECT * FROM especialidades");
                $especialidades->execute();

                return $especialidades->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarEspecialidades($tabla, $datos)
    {
        try {
            $especialidades = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_especialidad) VALUES (:nombre_especialidad)");

            $especialidades->bindParam(":nombre_especialidad", $datos["nombre_especialidad"], PDO::PARAM_STR);

            if ($especialidades->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarEspecialidades($tabla, $datos)
    {
        try {
            $especialidades = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_especialidad = :nombre_especialidad WHERE id_especialidad = :id_especialidad");

            $especialidades->bindParam(":nombre_especialidad", $datos["nombre_especialidad"], PDO::PARAM_STR);
            $especialidades->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);

            if ($especialidades->execute()) {
                return "ok";
            } else {

                return "error";

                // print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

}
