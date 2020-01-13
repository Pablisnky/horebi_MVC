<?php
    //Se cargan las librerias (clases)
    require_once("config/Configurar.php");

    //se cargan manualmete las clases si existe un autoload no es necesario esto
    require_once("librerias/Conexion_BD.php");
    require_once("librerias/Controlador.php");
    require_once("librerias/Core.php");

    //Se utiliza un autoload para no cargar las clases manualmente
    // spl_autoload_register(function($nombreClase){
    //     require_once("librerias/" . $nombreClase . ".php");
    // })
?>