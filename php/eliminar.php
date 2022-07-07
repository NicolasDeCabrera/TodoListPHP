<?php
require_once('./conn.php');

$id = $_GET['id'];
$peticion = mysqli_query($tareas, "DELETE FROM tareas WHERE id = '$id' LIMIT 1");

if ($peticion) {
  header("Location: ../index.php");
}
