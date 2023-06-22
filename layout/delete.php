<?php
    require_once "config/settings.php";
    $id =$_POST['id'];
    try{
        $conexion = new PDO("mysql:host=". HOST. ";dbname=". DB_NAME . "", DB_USER, DB_PASSWORD);

        $stringSql = $conexion->prepare("DELETE FROM tareas WHERE id = :id");
        $stringSql->bindParam(":id", $id, PDO::PARAM_INT);


        if ($stringSql->execute()) {  //si execute es true redirigir a index.php
            //mandar un mensaje del resultado de la operación por get 
            header("Location: index.php?mensaje=Task Deleted Successfully");
            exit();
        } else {        
        echo "An error occurred while trying to delete the task.";
        }
    }catch(PDOException $ex){
        echo "We couldn't connect to the database, please check your connection.";
        $ex->getMessage();
    }