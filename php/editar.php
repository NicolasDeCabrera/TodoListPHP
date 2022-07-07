<?php
$id = $_GET['id'];
$tarea = $_GET['tarea'];
$estado = $_GET['estado'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../editar.css">
    <title>Editar</title>
</head>

<body>
    <h2 class="title">Editar</h2>
    <form class="form" action="./procesarEditar.php" method="POST">
        <input type="text" name="tarea" value="<?php echo $tarea ?>" placeholder="tarea..." />
        <select name="estado" value="<?php echo $estado ?>">
            <?php
            if ($estado === "Pendiente") echo '<option selected value="Pendiente">Pendiente</option>';
            else echo '<option value="Pendiente">Pendiente</option>';
            if ($estado === "En progreso") echo '<option selected value="En progreso">En progreso</option>';
            else echo '<option value="En progreso">En progreso</option>';
            if ($estado === "Realizada") echo '<option selected value="Realizada">Realizada</option>';
            else echo '<option value="Realizada">Realizada</option>';
            ?>
        </select>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="submit">Editar</button>
    </form>
</body>

</html>