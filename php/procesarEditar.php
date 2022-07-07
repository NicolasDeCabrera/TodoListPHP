<?php
require_once('./conn.php');

$id = $_POST['id'];
$tarea = $_POST['tarea'];
$estado = $_POST['estado'];

$peticion = mysqli_query($tareas, "UPDATE tareas SET 
tarea = '$tarea', 
estado = '$estado' 
WHERE id = '$id' LIMIT 1");

if ($peticion) {
    header("Location: ../index.php");
}
