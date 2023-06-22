<?php
   require_once "../configExample/configExample.php";

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$prioridad = $_POST['prioridad'];
$id = $_POST['id'];
try {
    $conexion = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASSWORD);

    $stringSql = $conexion->prepare("UPDATE tareas SET titulo =:titulo, descripcion=:descripcion, prioridad =:prioridad WHERE id =:id");
    $stringSql->bindParam(":titulo", $titulo, PDO::PARAM_STR);
    $stringSql->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
    $stringSql->bindParam(":prioridad", $prioridad, PDO::PARAM_INT);
    $stringSql->bindParam(":id", $id, PDO::PARAM_INT);
    $stringSql->execute();
    header("Location: index.php");
} catch (PDOException $ex) {
    echo "We couldn't connect to the database, please check your connection.";
    $ex->getMessage();
}
