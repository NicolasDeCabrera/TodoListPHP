const $input = document.querySelector("#input");
const $existe = document.querySelector("#existe");
const $posiblemente_existe = document.querySelector("#posiblemente-existe");
const $btn_guardar = document.querySelector("#btn-guardar");
let newTarea = "";
let tareasDb = "";
let existe = false;
let posiblemente_existe = false;
//valores por defecto
$btn_guardar.disabled = true;
$input.focus();
//evento cuando la tecla deja de ser pulsada
$input.addEventListener("keyup", () => {
  todasLasTareas();
  if ($input.value.length > 0) {
    existe = tareasDb.includes($input.value.trim());
    posiblemente_existe = tareasDb[0]
      ? tareasDb.filter((t) => t.includes($input.value.trim())).length > 0
      : false;
    if (existe) {
      console.log("existe");
      posiblemente_existe = false;
      $existe.style.display = "block";
      $posiblemente_existe.style.display = "none";
      console.log($existe.style);
    } else {
      $existe.style.display = "none";
    }
    if (posiblemente_existe) {
      console.log("posiblemente existe");
      $posiblemente_existe.style.display = "block";
      $existe.style.display = "none";
    } else {
      $posiblemente_existe.style.display = "none";
    }
    verificacion();
  } else {
    $posiblemente_existe.style.display = "none";
    $existe.style.display = "none";
  }
});

// $btn_guardar.addEventListener("click", () => {
//   console.log($btn_guardar);
//   if ($btn_guardar.disabled) {
//     alert("intentas agregar una tarea vacia o la tarea existe");
//   }
// });

function todasLasTareas() {
  fetch("http://localhost/instituto/tareas/php/tareas.php")
    .then((response) => response.json())
    .then((data) => {
      tareasDb = data.map((d) => d.tarea);
    });
}

function verificacion() {
  if (!existe) {
    $btn_guardar.disabled = false;
  } else {
    $btn_guardar.disabled = true;
  }
}
