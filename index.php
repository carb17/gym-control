<?php

require_once 'controladores/controlador.plantilla.php';
require_once 'controladores/controlador.usuarios.php';
require 'controladores/controlador.planes.php';
require_once 'controladores/controlador.pagos.php';
require_once 'controladores/controlador.entrenadores.php';
require_once 'controladores/controlador.clientes.php';
require_once 'controladores/controlador.especialidades.php';

require_once 'modelos/modelo.usuarios.php';
require 'modelos/modelo.planes.php';
require 'modelos/modelo.pagos.php';
require 'modelos/modelo.entrenadores.php';
require 'modelos/modelo.clientes.php';
require 'modelos/modelo.especialidades.php';



$plantilla = new ControladorPlantilla();
$plantilla->ctrMostrarPlantilla();


