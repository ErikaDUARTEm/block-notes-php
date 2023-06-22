<?php
//Mostrar mensaje de tarea guardada o eliminada correctamente
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    if ($mensaje == "Tarea guardada correctamente") {
        // Mostrar el mensaje en la página
        echo '<div class="alert alert-success">' . $mensaje . '</div>';
    } else if ($mensaje == "Error al guardar la tarea") {
        //mostrar mensaje de error
        echo '<div class="alert alert-danger">' . $mensaje . '</div>';
    } else if ($mensaje == "Tarea Eliminada correctamente") {
        echo '<div class="alert alert-danger">' . $mensaje . '</div>';
    }
}
