<?php
    require_once "header.php";
    require_once "menu.php";
?>
    <div class="container text-bg-primary flex p-5 ">
        <h3 class="text-uppercase">Nueva tarea</h3>
        <form action="save.php" method="POST">
            <div class="form-group ">
                <label for="" class="text-capitalize">Title</label>
                <input type="text" class="form-control" name="titulo">
            </div>
            <div class="form-group">
                <label for="" class="text-capitalize">Description</label>
                <textarea class="form-control" name="descripcion" id="" cols="30" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="" class="text-capitalize">Priority</label>
                <select name="prioridad" id="" class="form-control">
                    <option value="1">High </option>
                    <option value="2">Medium</option>
                    <option value="3">Low</option>
                </select>
            </div>
            <button type="submit" class="btn btn-light flex justify-content-center align-content-center mt-5">Guardar</button>
        </form>
    </div>
</body>
</html>