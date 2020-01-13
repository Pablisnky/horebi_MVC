<?php
    class Paginas extends Controlador{
        public function __construct(){
            $this->articuloModelo= $this->modelo("Articulo");
            echo "Se ha cargado el controlador por defecto \"Página\"";
            echo "<br>";
        }
        
        //Siempre cargara el metodo index por defecto sino se pasa un metodo especifico
        public function index(){
            $Afiliados= $this->articuloModelo->obtenerArticulos();
            $Datos=[
                "titulo"=>"Bienvenidos",
                "Afiliados"=>$Afiliados
            ];
            $this->vista("paginas/inicio",$Datos);
        }
        
        public function articulo(){
            $this->vista("paginas/articulo");
        }

        public function actualizar($num_registro){
            echo $num_registro;
            echo "<br>";
        }
    }