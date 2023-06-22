<?php
   require_once "../configExample/configExample.php";



try {
    $conexion = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASSWORD);
    // echo "Conexión exitosa :)";
    $stringSql = $conexion->prepare("SELECT * FROM tareas ORDER BY prioridad ASC"); //Preparo la consulta
    $stringSql->execute(); //Ejecuto la consulta
    $datos = $stringSql->fetchAll(); //Recupero la respuesta
} catch (PDOException $ex) {
    echo "No pudimos conectarnos a la base de datos, revise su conexión.";
    $ex->getMessage();
}

require_once "header.php";
require_once "menu.php";
require_once "mensaje.php";

?>

<main class="container mt-5">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Estatus</th>
                     <t   h>Date</th>
                        <th>Priority</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php foreach ($datos as $row) {
                    switch ($row['prioridad']) {
                        case 1:
                            $priodidad =  "High";
                            break;
                        case 2:
                            $priodidad =  "Medium";
                            break;

                        default:
                            $priodidad =  "Low";
                            break;
                    }
                ?>
                    <tr>
                        <td><?= $row['titulo'] ?></td>
                        <td><?= $row['descripcion'] ?></td>
                        <td><?= ($row['estado'] == 0) ? "<span class='text-success'>Pending </span>" : "<span class='text-primary'>Finished</span>" ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $priodidad ?></td>
                        <td>
                            <form action="updateEstado.php" method="post">
                                <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                <input type="submit" name="checkbox" value="Complete" class="btn btn-primary">
                            </form>
                        </td>
                        <th>
                            <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-info">Edit</a>
                        </th>
                        <td>
                            <form action="delete.php" method="post">
                                <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</main>
</body>

</html>