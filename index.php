<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css">

  <title>Lista de tareas</title>
</head>

<body>
  <h2 class="title">Lista de Tareas</h2>
  <form class="form" action="./php/crear.php" method="post">
    <div>
      <input type="text" id="input" name="tarea" placeholder="nueva tarea..." autocomplete="off" />
      <input type="hidden" value="Pendiente" name="estado" />
      <button type="submit" id="btn-guardar">Guardar</button>
    </div>
    <span id="existe" class="existe">Esa tarea ya existe</span>
    <span id="posiblemente-existe" class="posib_existe">Posiblemente esa tarea ya existe...</span>
  </form>
  <?php
  require_once('./php/conn.php');

  $peticion = mysqli_query($tareas, "SELECT * FROM tareas");
  echo "  <table class='tabla'>
  <thead>
    <tr>
      <th>Tarea</th>
      <th>Estado</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  ";
  if (mysqli_num_rows($peticion) > 0) {
    while ($tarea = mysqli_fetch_assoc($peticion)) {
      echo "<tbody> <tr>";
      if ($tarea['estado'] == "Realizada") echo " <td style='text-decoration:line-through'>" . $tarea["tarea"] . "</td><td style='color:#6fe222'>" . $tarea["estado"] . "</td>";
      else if ($tarea['estado'] == "En progreso") echo " <td style='color:yellow'>" . $tarea["tarea"] . "</td><td style='color:yellow'>" . $tarea["estado"] . "</td>";
      else echo "<td>" . $tarea["tarea"] . "</td><td>" . $tarea["estado"] . "</td>";
      echo " <td class='editar'><a  href='./php/editar.php?id=" . $tarea['id'] . "&&tarea=" . $tarea['tarea'] . "&&estado=" . $tarea['estado'] . "'>Editar</a></td>
        <td class='eliminar'><a  href='./php/eliminar.php?id=" . $tarea['id'] . "'>Eliminar</a></td>
      </tr>";
    }
  } else {
    echo '<tr>
          <td colspan="4">No hay tareas guardadas...</td>
    </tr>';
  }
  echo " </tbody>
        </table>";
  ?>
  <script src="./js/funciones.js"></script>
</body>

</html>