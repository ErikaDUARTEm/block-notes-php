<?php
//Mostrar mensaje de tarea guardada o eliminada correctamente
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    if ($mensaje == "Task saved successfully") {
        // Mostrar el mensaje en la página
        echo '<div class="alert alert-success">' . $mensaje . '</div>';
    } else if ($mensaje == "Failed to save task") {
        //mostrar mensaje de error
        echo '<div class="alert alert-danger">' . $mensaje . '</div>';
    } else if ($mensaje == "Task Deleted Successfully") {
        echo '<div class="alert alert-danger">' . $mensaje . '</div>';
    }
}
