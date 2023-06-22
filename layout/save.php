<?php
    require_once "config/config.php";
    //validar que vengas datos, en caso de que falte uno, que rediriga a nuevo
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $prioridad = isset($_POST['prioridad']) ? $_POST['prioridad'] : '';
    $fecha = date('Y-m-d');
    $edo = 0;
    
    if (empty($titulo) || empty($descripcion) || empty($prioridad)){
        header("Location:nuevo.php");
        
    }else{
        try{
        
            $conexion = new PDO("mysql:host=". HOST. ";dbname=". DB_NAME . "", DB_USER, DB_PASSWORD);
    
            $stringSql = $conexion->prepare("INSERT INTO tareas (titulo, descripcion, estado, fecha, prioridad) VALUES (:titulo, :descripcion, :estado, :fecha, :prioridad)");
            $stringSql->bindParam(":titulo", $titulo, PDO::PARAM_STR);
            $stringSql->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stringSql->bindParam(":estado", $edo, PDO::PARAM_INT);
            $stringSql->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stringSql->bindParam(":prioridad", $prioridad, PDO::PARAM_INT);

            
            if ($stringSql->execute()) {  //si execute es true redirigir a index.php
                //mandar un mensaje del resultado de la operación por get 
                header("Location: index.php?mensaje=Tarea guardada correctamente");
                exit();
            } else {        
                header("Location: index.php?mensaje=Error al guardar la tarea");
            }
        } catch(PDOException $ex){
            echo "No pudimos conectarnos a la base de datos, revise su conexión.";
            $ex->getMessage();
        }
    }