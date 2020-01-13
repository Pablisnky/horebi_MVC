<?php
//Se mapea la url
//Mientras no se cargue ninguna direción en el url cargara el controlador por defecto

class Core{
    // En la url el controlador es el index 0, el metodo el index 1, el parametro el index 2
    protected $controladorActual = "paginas";
    protected $metodoActual = "index";
    protected $parametros = [];

    // **************************************************************************************

    public function __construct(){
        //  print_r($this->geturl());
        $url = $this->geturl();
        // print_r($url);

        //Busca en la carpeta controladores si el controlador que hay en la url existe
        //Si existe se setea como controladr; por defecto el controlador es "pagina"
        if(file_exists("../app/controladores/" . ucwords($url[0]) . ".php")){
            $this->controladorActual = ucwords($url[0]);
            echo "Nombre del controlador: " . $this->controladorActual;
            unset($url[0]);
            // echo "El controlador existe";
        }
        else{
            echo "El controlador no existe" . "<br>";
        }
        
        //se solicita el controlador recibido y se instancia
        require_once("../app/controladores/" . $this->controladorActual . ".php");
        $this->controladorActual = new $this->controladorActual;

        // **************************************************************************************
        
        //Busca en el controlador hayado si el metodo que hay en la url existe
        //Si no existe se setea como por defecto "index"
        if(isset($url[1])){
            if(method_exists($this->controladorActual, $url[1])){
                //Se chequea el metodo
                $this->metodoActual = $url[1];
                unset($url[1]);
            }
            else{
                echo "El metodo no existe" . "<br>";
            }
        }
        echo "El metodo a utilizar es: " . $this->metodoActual;
        
        // **************************************************************************************
        //Se obtienen los parametros enviados por la url
        $this->parametros = $url ? array_values($url) : [1];

        //llamar callback con parametros array
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    // **************************************************************************************

    public function geturl(){
        //La url se obtiene via get[] desde htaccess que esta en la carpeta public, que mapea todo lo que se hace
        echo "Se obtiene el controlador, metodo y parametro de la url: " . $_GET["url"] . "<br>";
        //Se verifica que la url este seteada
        if(isset($_GET["url"])){
            $url= rtrim($_GET["url"],'/');
            $url= filter_var($url, FILTER_SANITIZE_URL);
            $url= explode('/',$url);
            return $url;
        }
    }
}