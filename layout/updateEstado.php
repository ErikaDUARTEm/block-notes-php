<?php
   require_once "../configExample/configExample.php";

if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {
    // Verificar si el checkbox está marcado
    $tareaId = $_POST['id'];
    $estado = 1;
    // Actualizar el estado en la base de datos según tu lógica
    try {
        $conexion = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASSWORD);

        $stringSqlUpdate = $conexion->prepare("UPDATE tareas SET estado =:estado WHERE id =:id");
        $stringSqlUpdate->bindParam(":estado", $estado, PDO::PARAM_INT);
        $stringSqlUpdate->bindParam(":id", $tareaId, PDO::PARAM_INT);

        if ($stringSqlUpdate->execute()) {
            header("Location: index.php?mensaje=Tarea%20actualizada%20correctamente");
            exit();
        }
    } catch (PDOException $ex) {
        echo "No pudimos conectarnos a la base de datos, revise su conexión.";
        $ex->getMessage();
    }
    exit;
}
header("Location: index.php");
exit();
