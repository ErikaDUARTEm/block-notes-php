<?php
    require_once "config/config.php";
    
   
    try{
        $conexion = new PDO("mysql:host=". HOST. ";dbname=". DB_NAME . "", DB_USER, DB_PASSWORD);
        // echo "Conexión exitosa :)";
        $stringSql = $conexion->prepare("SELECT * FROM tareas ORDER BY prioridad ASC"); //Preparo la consulta
        $stringSql->execute(); //Ejecuto la consulta
        $datos = $stringSql->fetchAll(); //Recupero la respuesta
    }catch(PDOException $ex){
        echo "No pudimos conectarnos a la base de datos, revise su conexión.";
        $ex->getMessage();
    }
    
    require_once "layout/header.php";
    require_once "layout/menu.php";
   
    
?>
