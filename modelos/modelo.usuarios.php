<?php

require_once 'conexion.php';

class ModeloUsuarios
{

    static public function mdlMostrarUsuarios($item, $valor)
    {
        if ($item != null) {
            try {
                $usuarios = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE $item = :$item");
                $usuarios->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $usuarios->execute();

                $resultado = $usuarios->fetch(PDO::FETCH_ASSOC);

                // print_r($resultado);

                return $resultado;

            } catch (Exception $e) {

                return "Error: " . $e->getMessage();

            }

        } else {

            try {
                $usuarios = Conexion::conectar()->prepare("SELECT * FROM usuarios");
                $usuarios->execute();

                return $usuarios->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {

                return "Error: " . $e->getMessage();

            }
        }
    }

    static public function mdlAgregarUsuarios($tabla, $datos)
    {
        try {
            $usuarios = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, contrasena, nombre, apellido) VALUES (:usuario, :contrasena, :nombre, :apellido)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $usuarios->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $usuarios->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $usuarios->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $usuarios->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);

            if ($usuarios->execute()) {

                return "ok";
            } else {

                return "error";
            }

        } catch (PDOException $e) {

            return "Error: " . $e->getMessage();

        }
    }

    static public function mdlEditarUsuarios($tabla, $datos)
    {
        try {
            $usuarios = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, usuario = :usuario, contrasena = :contrasena WHERE id = :id");

            $usuarios->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $usuarios->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $usuarios->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $usuarios->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $usuarios->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($usuarios->execute()) {
                return "ok";

            } else {

                return "Error: ";

                // print_r(Conexion::conectar()->errorInfo());

            }

        } catch (Exception $e) {

            return "Error: " . $e->getMessage();

        }
    }

    static public function mdlEstadoUsuarios($tabla, $datos)
    {
        $usuarios = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado WHERE id = :id");

        $usuarios->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $usuarios->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($usuarios->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
