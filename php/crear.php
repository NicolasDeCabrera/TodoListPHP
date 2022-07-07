<?php
require_once('./conn.php');

$tarea = $_POST['tarea'];
$estado = $_POST['estado'];

$peticion = mysqli_query($tareas, "INSERT INTO tareas VALUES (NULL, '$tarea', '$estado')");

if ($peticion) {
    header("Location: ../index.php");
}
