const $ = (selector, context = document) => context.querySelector(selector);
const $$ = (selector, context = document) => context.querySelectorAll(selector);

const success = $("#success");
const error = $("#error");
// const warning = $("#warning");

//---empleado
const dataLoad = $("#registerEmployeForm");
// const dataUpdate = $("#moviesUpdate");
// const dataDelete = $("#moviesDelete");

const modalSE = new bootstrap.Modal($("#modalRegisterUser"));
// const modalU = new bootstrap.Modal($("#modalEdit"));
// const modalD = new bootstrap.Modal($("#modalDelete"));
// const btnDelete = $("#btn-D");

//edit and delete modal
let modalSaveE = $("#modalRegisterUser");
let modalEditE = $("#editarRegistro");
let modalDeleteE = $("#eliminarRegistro");

//---asistencia

// operaciones en la base de datos
async function DBOperation(url, method, HTMLFormEl, myModal) {
  // Crear un objeto FormData para enviar los datos del formulario
  try {
    //almacena la data del formulario
    const formData = new FormData(HTMLFormEl);
    formData.append("method", method);
    // almacenar la respuesta del servidor
    const response = await fetch(url, {
      method: "POST",
      body: formData,
    });

    if (response.ok) {
      const result = await response.json();
      if (result.success) {
        setTimeout(() => {
          success.classList.remove("d-none");
          $("#msg_success").insertAdjacentHTML("afterbegin", result.message);
          myModal.hide();
          clearModal();
          success.classList.add("d-block");
        }, 1000);

        setTimeout(() => {
          success.classList.remove("d-block");
          success.classList.add("d-none");
          $("#msg_success").innerHTML = "";
          getMoviesCategory();
        }, 3000);
      } else if (response.warning) {
        warning.classList.remove("d-none");
        warning.classList.add("d-block");
        $("#msg_error").insertAdjacentHTML("afterbegin", response.message);
      } else {
        const errorText = `Error: ${result.message}`;
        error.classList.remove("d-none");
        error.classList.add("d-block");
        $("#msg_error").insertAdjacentHTML("afterbegin", errorText);
      }
    } else {
      const errorText = `Error: ${response.status} - ${response.statusText}`;
      error.classList.remove("d-none");
      error.classList.add("d-block");
      $("#msg_error").insertAdjacentHTML("afterbegin", errorText);
    }
  } catch (error) {
    console.error("Error:", error);
  }
}

// obtener la información del empleado relacionado al departamento y cargo dentro de la empresa
async function getInfoPuestoEmpleado(
  urlController,
  method,
  selectHTML,
  dpto = 0
) {
  const url = urlController;
  try {
    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        method: method,
        departamento: dpto,
      }),
    });

    if (!response.ok) {
      throw new Error("No se puede obtener la información de las películas");
    }

    const cargos = await response.json();

    var contenidoHTML = "";
    contenidoHTML += "<option selected>Seleccionar...</option>";
    cargos.forEach(function (cargo) {
      contenidoHTML +=
        '<option value="' + cargo.id + '">' + cargo.nombre + "</option>";
    });

    // Muestra el contenido en el contenedor
    document.querySelectorAll("." + selectHTML).forEach(function (element) {
      element.innerHTML = contenidoHTML;
    });
  } catch (error) {
    console.error("Error al realizar la solicitud:", error);
  }
}
//listar cargos
async function cargarCargos(departamentoSelect, cargoSelect) {
  let selectedDpto = departamentoSelect.value;

  // Limpiar el contenido actual
  cargoSelect.innerHTML = "";

  // Listar cargos
  let urlCargo = "../../app/controllers/cargoController.php";
  let methodC = "getCargo";
  let selectC = "cargo";
  await getInfoPuestoEmpleado(urlCargo, methodC, selectC, selectedDpto);
}

//listar departamentos
function getDepartamento() {
  let urlDpto = "../../app/controllers/departamentoController.php";
  let methodD = "getDepartamento";
  let selectD = "departamento";
  getInfoPuestoEmpleado(urlDpto, methodD, selectD);
}

async function getEmpleadosList() {
  try {
    const formData = new FormData();
    formData.append("method", "getEmpleados");
    // almacenar la respuesta del servidor
    const response = await fetch(
      "../../app/controllers/empleadoController.php",
      {
        method: "POST",
        body: formData,
      }
    );
    if (!response.ok) {
      throw new Error("No se puede obtener la información de los empleados");
    }
    const datos = await response.json();
    mostrarDatos(datos);
  } catch (error) {
    console.error(error.message);
  }
}

// Mostrar los empleados en la tabla
function mostrarDatos(datos) {
  var contenidoHTML = "";
  datos.forEach(function (dato) {
    contenidoHTML += "<tr class='align-middle'>";
    contenidoHTML += "<td>" + dato.dni + "</td>";
    contenidoHTML += "<td>" + dato.nombre + "</td>";
    contenidoHTML += "<td>" + dato.departamento + "</td>";
    contenidoHTML += "<td>" + dato.cargo + "</td>";
    contenidoHTML += "<td>" + dato.fecha_registro + "</td>";
    contenidoHTML +=
      "<td class='text-center'>" +
      '<div class="d-flex flex-column justify-content-center align-itemscenter gap-4 mx-2"> <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editarRegistro" data-bs-id="' +
      dato.id +
      '"><i class="fa-solid fa-pen-to-square"></i> Editar</button>' +
      '<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarRegistro" data-bs-id="' +
      dato.id +
      '"><i class="fa-solid fa-trash"></i> Eliminar</button>' +
      "</div></td>";
    contenidoHTML += "</tr>";
  });

  // Muestra el contenido en el contenedor
  document.getElementById("empleadosList").innerHTML = contenidoHTML;
}

//limpiar el modal
function clearModal() {
  const $ = (selector, context = modalSaveE) => context.querySelector(selector);
  $(".modal-body #dni").value = "";
  $(".modal-body #nombre").value = "";
  $(".modal-body .departamento").selectedIndex = 0;
  $(".modal-body .cargo").selectedIndex = 0;
}

//listar cargos según el departamento
document.addEventListener("DOMContentLoaded", function () {
  let departamentos = document.querySelectorAll(".departamento");
  let cargos = document.querySelectorAll(".cargo");

  departamentos.forEach(function (departamento, index) {
    cargarCargos(departamento, cargos[index]);
    departamento.addEventListener("change", function () {
      cargarCargos(departamento, cargos[index]);
    });
  });
});

// registrar nuevo trabajador
dataLoad.addEventListener("submit", (event) => {
  event.preventDefault();
  let modal = modalSE;
  let url = "../../app/controllers/empleadoController.php";
  let method = "registerEmpleado";
  let HTMLFormElement = dataLoad;
  DBOperation(url, method, HTMLFormElement, modal);
});

modalEditE.addEventListener("hide.bs.modal", (event) => {
  const $ = (selector, context = modalEditE) => context.querySelector(selector);
  $(".modal-body #dni").value = "";
  $(".modal-body #nombre").value = "";
  $(".modal-body #departamento").value = "";
  $(".modal-body #cargo").value = "";
});

modalEditE.addEventListener("shown.bs.modal", (event) => {
  const $ = (selector, context = modalEditE) => context.querySelector(selector);
  let button = event.relatedTarget;

  let id = button.getAttribute("data-bs-id");
  let inputID = $(".modal-body #id");
  let inputDni = $(".modal-body #dni");
  let inputNombre = $(".modal-body #nombre");
  let inputDepartamento = $(".modal-body #departamento");
  let inputCargo = $(".modal-body #cargo");

  async function getEmpleadosByID() {
    try {
      // Verificar que id esté definido
      if (typeof id === "undefined") {
        console.error("El valor de id no está definido.");
        return;
      }
      let url = "../../app/controllers/empleadoController.php";
      const formData = new FormData();
      formData.append("method", "getEmpleadosByID");
      formData.append("id", id);
      const response = await fetch(url, {
        method: "POST",
        body: formData,
      });
      if (!response.ok) {
        throw new Error("Error al obtener datos del servidor");
      }
      const datos = await response.json();
      console.log(datos);
      if (datos.length > 0) {
        const primerDato = datos[0]; // Tomar el primer objeto del array
        inputID.value = primerDato.id;
        inputDni.value = primerDato.dni;
        inputNombre.value = primerDato.nombre;
        inputDepartamento.value = primerDato.departamento;
        cargarCargos(inputDepartamento, inputCargo);
        await new Promise((resolve) => setTimeout(resolve, 500));
        inputCargo.value = primerDato.cargo;
      }
    } catch (error) {
      console.error(error);
    }
  }
  getEmpleadosByID();
});

modalDeleteE.addEventListener("shown.bs.modal", (event) => {
  const $ = (selector, context = modalDeleteE) =>
    context.querySelector(selector);
  let button = event.relatedTarget;
  let id = button.getAttribute("data-bs-id");
  let inputID = $(".modal-body #id");
  let poster = $(".modal-body #posterPath");

  let url = "../../app/peliculas/getMovieID.php";

  fetch(url, {
    method: "POST",

    body: JSON.stringify({
      id: id,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      inputID.value = data.id;
      poster.value = data.poster;
    })
    .catch((err) => console.error(err));
});
window.onload = function () {
  getEmpleadosList();
  getDepartamento();
};
