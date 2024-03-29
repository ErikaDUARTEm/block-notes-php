<?php
require_once "../configExample/configExample.php";

$id = $_GET['id'];
try {
    $conexion = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASSWORD);

    $stringSql = $conexion->prepare("SELECT * FROM tareas WHERE id =:id");
    $stringSql->bindParam(":id", $id, PDO::PARAM_INT);
    $stringSql->execute();
    $registro = $stringSql->fetch();
} catch (PDOException $ex) {
    echo "No pudimos conectarnos a la base de datos, revise su conexión.";
    $ex->getMessage();
}

require_once "header.php";
require_once "menu.php";
?>
<!--Plantilla para editar tarea y guardar de nuevo-->
<div class="container">
    <h3>Edit task</h3>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $registro['id'] ?>">
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="titulo" value="<?= $registro['titulo'] ?>">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="descripcion" id="" cols="30" rows="4"><?= $registro["descripcion"] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Priority</label>
            <select name="prioridad" class="form-control">
                <option value="1" <?= ($registro['prioridad'] == 1) ? "selected" : "" ?>>High</option>
                <option value="2" <?= ($registro['prioridad'] == 2) ? "selected" : "" ?>>Medium</option>
                <option value="3" <?= ($registro['prioridad'] == 3) ? "selected" : "" ?>>Low</option>
            </select>
        </div>
        <div class="form-group mt-4">
            <label for="">Date: <?= $registro['fecha'] ?></label>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Save</button>
    </form>
</div>
</body>

</html>