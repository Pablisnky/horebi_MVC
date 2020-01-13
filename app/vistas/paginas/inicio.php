<!-- Se carga el header -->
<?php
    require(RUTA_APP . "/vistas/inc/header.php");
?>


<h1>Vista "inicio" por defecto, cargada exitosamente</h1>
<?php echo $Datos["titulo"] . "<br>"?>
<?php echo RUTA_APP . "<br>";

    foreach($Datos["Afiliados"] as $Afiliados):
        echo $Afiliados->nombre . "<br>";
    endforeach;

?>



<!-- Se carga el footer -->
<?php
    require(RUTA_APP . "/vistas/inc/footer.php");
?>