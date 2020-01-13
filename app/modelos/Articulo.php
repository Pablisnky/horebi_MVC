<?php
    class Articulo{
        private $db;

        public function __construct(){
            $this->db= new Conexion_BD;
        }

        public function obtenerArticulos(){
            $this->db->Consulta("SELECT * FROM afiliado");
            return $this->db->registros();
        }
    }