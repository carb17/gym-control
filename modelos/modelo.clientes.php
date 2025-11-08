<?php

require_once 'conexion.php';

class ModeloClientes
{

    static public function mdlMostrarClientes($item, $valor)
    {
        if ($item != null) {
            try {
                $clientes = Conexion::conectar()->prepare("SELECT * FROM clientes WHERE $item = :$item");
                $clientes->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $clientes->execute();

                return $clientes->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $clientes = Conexion::conectar()->prepare("SELECT * FROM clientes as c INNER JOIN planes as p ON c.id_plan = p.id_plan AND p.estado = 1 INNER JOIN especialidades AS e ON p.id_especialidad = e.id_especialidad");
                $clientes->execute();

                return $clientes->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarClientes($tabla, $datos)
    {
        try {
            $clientes = Conexion::conectar()->prepare("INSERT INTO $tabla (dni, nombre, apellido, nacimiento, inscripcion, ultimo_pago, direccion, tel, email, id_plan) VALUES (:dni, :nombre, :apellido, :nacimiento, :inscripcion, :ultimo_pago, :direccion, :tel, :email,  :id_plan)");

            $clientes->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $clientes->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $clientes->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $clientes->bindParam(":nacimiento", $datos["nacimiento"], PDO::PARAM_STR);
            $clientes->bindParam(":inscripcion", $datos["inscripcion"], PDO::PARAM_STR);
            $clientes->bindParam(":ultimo_pago", $datos["inscripcion"], PDO::PARAM_STR);
            $clientes->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $clientes->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
            $clientes->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $clientes->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);

            if ($clientes->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarClientes($tabla, $datos)
    {
        try {
            $clientes = Conexion::conectar()->prepare("UPDATE $tabla SET dni = :dni, nombre = :nombre, apellido = :apellido, nacimiento = :nacimiento, inscripcion = :inscripcion, direccion = :direccion, tel = :tel, email = :email, id_plan = :id_plan WHERE id = :id");

            $clientes->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $clientes->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $clientes->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $clientes->bindParam(":nacimiento", $datos["nacimiento"], PDO::PARAM_STR);
            $clientes->bindParam(":inscripcion", $datos["inscripcion"], PDO::PARAM_STR);
            $clientes->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $clientes->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
            $clientes->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $clientes->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $clientes->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($clientes->execute()) {
                return "ok";
            } else {

                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
