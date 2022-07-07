<?php
require_once('./conn.php');

$peticion = mysqli_query($tareas, "SELECT * FROM tareas");
$data = array();
while ($tarea = mysqli_fetch_assoc($peticion)) {
    $obj = new stdClass();
    $obj->tarea = $tarea['tarea'];
    $obj->estado = $tarea['estado'];
    array_push($data, $obj);
}
echo json_encode($data);
