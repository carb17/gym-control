<?php

require_once 'conexion.php';

class ModeloEntrenadores
{

    static public function mdlMostrarEntrenadores($item, $valor)
    {
        if ($item != null) {
            try {
                $entrenadores = Conexion::conectar()->prepare("SELECT * FROM entrenadores WHERE $item = :$item");
                $entrenadores->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $entrenadores->execute();

                return $entrenadores->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $entrenadores = Conexion::conectar()->prepare("SELECT * FROM entrenadores as e INNER JOIN especialidades as s ON e.id_especialidad = s.id_especialidad");
                $entrenadores->execute();

                return $entrenadores->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarEntrenadores($tabla, $datos)
    {
        try {
            $entrenadores = Conexion::conectar()->prepare("INSERT INTO $tabla (dni, nombre, apellido, tel, email, contratacion, id_especialidad) VALUES (:dni, :nombre, :apellido, :tel, :email, :contratacion,  :id_especialidad)");

            $entrenadores->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $entrenadores->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $entrenadores->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $entrenadores->bindParam(":tel", $datos["tel"], PDO::PARAM_INT);
            $entrenadores->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $entrenadores->bindParam(":contratacion", $datos["contratacion"], PDO::PARAM_STR);
            $entrenadores->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);


            if ($entrenadores->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarEntrenadores($tabla, $datos)
    {
        try {
            $entrenadores = Conexion::conectar()->prepare("UPDATE $tabla SET dni = :dni, nombre = :nombre, apellido = :apellido, tel = :tel, email = :email, contratacion = :contratacion,  id_especialidad = :id_especialidad WHERE id = :id");

            $entrenadores->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $entrenadores->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $entrenadores->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $entrenadores->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
            $entrenadores->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $entrenadores->bindParam(":contratacion", $datos["contratacion"], PDO::PARAM_STR);
            $entrenadores->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);
            $entrenadores->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($entrenadores->execute()) {
                return "ok";
            } else {

                return "error";

                // print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEstadoEntrenadores($tabla, $datos)
    {
        $entrenadores = Conexion::conectar()->prepare("UPDATE $tabla SET estado=:estado WHERE id = :id");

        $entrenadores->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $entrenadores->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($entrenadores->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

}
