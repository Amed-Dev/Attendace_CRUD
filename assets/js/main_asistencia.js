import { $, $$ } from "./utils/dom.js";
const success_A = $("#success_A");
const error_A = $("#error_A");
const entradaDni = $("#dni");

//---asistencia
const dataLoadA = $("#registerAttendanceForm");
const dataUpdateA = $("#updateAttendanceForm");

const modalSA = new bootstrap.Modal($("#modalRegisterAttendance"));
const modalUA = new bootstrap.Modal($("#modalUpdateAttendance"));

//edit and delete modal
let modalSaveA = $("#modalRegisterAttendance");
let modalEditA = $("#modalUpdateAttendance");

// //---asistencia

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
          success_A.classList.remove("d-none");
          $("#msg_success_A").insertAdjacentHTML("afterbegin", result.message);
          myModal.hide();
          clearModal();
          success_A.classList.add("d-block");
        }, 1000);

        setTimeout(() => {
          success_A.classList.remove("d-block");
          success_A.classList.add("d-none");
          $("#msg_success_A").innerHTML = "";
          getAttendanceList();
        }, 3000);
      } else if (response.warning) {
        warning.classList.remove("d-none");
        warning.classList.add("d-block");
        $("#msg_error_A").insertAdjacentHTML("afterbegin", response.message);
      } else {
        const errorText = `Error: ${result.message}`;
        error_A.classList.remove("d-none");
        error_A.classList.add("d-block");
        $("#msg_error_A").insertAdjacentHTML("afterbegin", errorText);
      }
    } else {
      const errorText = `Error: ${response.status} - ${response.statusText}`;
      error_A.classList.remove("d-none");
      error_A.classList.add("d-block");
      $("#msg_error_A").insertAdjacentHTML("afterbegin", errorText);
    }
  } catch (error) {
    console.error("Error:", error);
  }
}

// obtener la información del empleado relacionado al departamento y cargo dentro de la empresa
async function getInfoAttendance(urlController, method, selectHTML) {
  const url = urlController;
  try {
    const formData = new FormData();
    formData.append("method", method);
    const response = await fetch(url, {
      method: "POST",
      body: formData,
    });

    if (!response.ok) {
      throw new Error("No se puede obtener la información de las películas");
    }

    const asistencias = await response.json();

    var contenidoHTML = "";
    contenidoHTML += "<option selected>Seleccionar...</option>";
    asistencias.forEach(function (asistencia) {
      contenidoHTML +=
        '<option value="' +
        asistencia.id +
        '">' +
        asistencia.estado_asistencia +
        "</option>";
    });

    // Muestra el contenido en el contenedor
    document.querySelectorAll("." + selectHTML).forEach(function (element) {
      element.innerHTML = contenidoHTML;
    });
  } catch (error) {
    console.error("Error al realizar la solicitud:", error);
  }
}

//listar estados de asistencia
function getAttendanceStatus() {
  let urlAsistencia = "../../app/controllers/asistenciaController.php";
  let methodA = "getStatusAttendance";
  let selectA = "asistencia";
  getInfoAttendance(urlAsistencia, methodA, selectA);
}

export async function getAttendanceList() {
  try {
    const formData = new FormData();
    formData.append("method", "getListAttendance");
    // almacenar la respuesta del servidor
    const response = await fetch(
      "../../app/controllers/asistenciaController.php",
      {
        method: "POST",
        body: formData,
      }
    );
    if (!response.ok) {
      throw new Error("No se puede obtener la información de los empleados");
    }
    const datos = await response.json();
    mostrarDatosA(datos);
  } catch (error) {
    console.error(error.message);
  }
}

// Mostrar los empleados en la tabla
function mostrarDatosA(datos) {
  var contenidoHTML = "";
  datos.forEach(function (dato) {
    contenidoHTML += "<tr class='align-middle'>";
    contenidoHTML += "<td>" + dato.dni + "</td>";
    contenidoHTML += "<td>" + dato.nombre + "</td>";
    contenidoHTML += "<td>" + dato.departamento + "</td>";
    contenidoHTML += "<td>" + dato.cargo + "</td>";
    contenidoHTML +=
      "<td>" +
      '<span class="badge rounded-pill text-bg-' +
      dato.color +
      '">' +
      dato.asistencia +
      "</span>" +
      "</td>";
    contenidoHTML += "<td>" + dato.fecha + "</td>";
    contenidoHTML +=
      "<td class='text-center'>" +
      '<div class="d-flex flex-column justify-content-center   gap-4 m-2 py-2"> <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateAttendance" data-bs-id="' +
      dato.id +
      '"><i class="fa-solid fa-pen-to-square"></i> Editar</button>' +
      "</div></td>";
    contenidoHTML += "</tr>";
  });

  // Muestra el contenido en el contenedor
  document.getElementById("asistenciaList").innerHTML = contenidoHTML;
}

//limpiar el modal
function clearModal() {
  const $ = (selector, context = modalSaveA) => context.querySelector(selector);
  $(".modal-body #id").value = "";
  $(".modal-body #dni").value = "";
  $(".modal-body #nombre").value = "";
}

modalSaveA.addEventListener("shown.bs.modal", (event) => {
  $("#btn-submit").disabled = true;
  modalSaveA.querySelector(".modal-body #dni").focus();
});
//Obtener trabajador según el DNI
async function showEmploye(str) {
  let valid = false;
  if (str.toString().length == 0) {
    $("#txtHint").classList.remove("d-none");
    $("#nombre").value = "...";
    $("#txtHint").innerHTML = "Ningun DNI ingresado";
    return;
  } else {
    $("#txtHint").classList.add("d-none");

    let urlAE = "../../app/controllers/asistenciaController.php";
    let Form = dataLoadA;
    try {
      //almacena la data del formulario
      const formData = new FormData(Form);
      formData.append("method", "getEmpleadoByDNI");
      // almacenar la respuesta del servidor
      const response = await fetch(urlAE, {
        method: "POST",
        body: formData,
      });

      if (response.ok) {
        const result = await response.json();
        if (result.encontrado) {
          result.encontrado.forEach(function (empleado) {
            $("#nombre").classList.remove("nombre-nExits");
            $("#nombre").classList.add("nombre-found");
            $("#id").value = empleado.id;
            $("#nombre").value = empleado.nombre;
            valid = true;
          });
        } else if ((str.toString().length >= 1) & (str.toString().length < 8)) {
          $("#nombre").classList.remove("nombre-found");
          $("#nombre").classList.remove("nombre-nExits");
          $("#nombre").value = "buscando...";
          valid;
        } else {
          $("#nombre").classList.remove("nombre-found");
          $("#nombre").classList.add("nombre-nExits");
          $("#nombre").value = result.no_existe;
          valid;
        }
      } else {
        const errorText = `Error: ${response.status} - ${response.statusText}`;
        console.error("Error", errorText);
      }
      $("#asistenciaR").addEventListener("change", () => {
        $("#btn-submit").disabled =
          !valid || $("#asistenciaR").selectedIndex == 0;
      });
    } catch (error) {
      console.error("Error:", error);
    }
  }
}

entradaDni.addEventListener("keyup", () => {
  showEmploye(entradaDni.value);
});

// registrar nuevo trabajador
dataLoadA.addEventListener("submit", (event) => {
  event.preventDefault();
  $("#btn-submit").disabled = true;
  let modal = modalSA;
  let url = "../../app/controllers/asistenciaController.php";
  let method = "registerAttendance";
  let HTMLFormElement = dataLoadA;
  DBOperation(url, method, HTMLFormElement, modal);
});
//actualizar empleado
dataUpdateA.addEventListener("submit", (event) => {
  event.preventDefault();
  $("#btn-submitA").disabled = true;
  let modal = modalUA;
  let url = "../../app/controllers/asistenciaController.php";
  let method = "updateAttendance";
  let HTMLFormElement = dataUpdateA;
  DBOperation(url, method, HTMLFormElement, modal);
});

modalEditA.addEventListener("hide.bs.modal", (event) => {
  const $ = (selector, context = modalEditA) => context.querySelector(selector);
  $(".modal-body #dni").value = "";
  $(".modal-body #nombre").value = "";
  $(".modal-body #departamento").value = "";
  $(".modal-body #cargo").value = "";
});

modalEditA.addEventListener("shown.bs.modal", (event) => {
  const $ = (selector, context = modalEditA) => context.querySelector(selector);
  let button = event.relatedTarget;
  $(".modal-body #asistencia").focus();

  let id = button.getAttribute("data-bs-id");
  let inputID = $(".modal-body #id");
  let inputDni = $(".modal-body #dni");
  let inputNombre = $(".modal-body #nombre");
  let inputDepartamento = $(".modal-body #departamento");
  let inputCargo = $(".modal-body #cargo");
  let inputAsitencia = $(".modal-body #asistencia");

  async function getEmpleadosByID() {
    try {
      let url = "../../app/controllers/asistenciaController.php";
      const formData = new FormData();
      formData.append("method", "getListAttendanceByID");
      formData.append("id", id);
      const response = await fetch(url, {
        method: "POST",
        body: formData,
      });
      if (!response.ok) {
        throw new Error("Error al obtener datos del servidor");
      }
      const datos = await response.json();
      if (datos.length > 0) {
        const primerDato = datos[0];
        inputID.value = primerDato.id;
        inputDni.value = primerDato.dni;
        inputNombre.value = primerDato.nombre;
        inputDepartamento.value = primerDato.departamento;
        inputCargo.value = primerDato.cargo;
        inputAsitencia.value = primerDato.asistencia;
      }
    } catch (error) {
      console.error(error);
    }
  }
  getEmpleadosByID();
});

// Evento para cerrar el sidebar cuando se hace clic fuera de él
document.addEventListener("click", function (event) {
  const sidebar = document.querySelector(".sidebar");
  const navbarToggle = document.querySelector(".navbar-toggler");

  if (!sidebar.contains(event.target) && event.target !== navbarToggle) {
    const sidebarCollapse = new bootstrap.Collapse(
      document.getElementById("navbarToggleExternalContent"),
      { toggle: false }
    );
    sidebarCollapse.hide();
  }
});

document.addEventListener("DOMContentLoaded", () => {
  let targetId;
  function activarBoton(targetId, pillsTab) {
    let botonActivo = $(`#${pillsTab} .active`);
    if (botonActivo) {
      botonActivo.classList.remove("active");
    }
    let botonActivar = $(`#${pillsTab} ${targetId}-tab`);
    if (botonActivar) {
      botonActivar.classList.add("active");
    }
  }

  function getTarget(botones, pillsTab) {
    botones.forEach(function (boton) {
      boton.addEventListener("click", function () {
        // Obtener el ID del destino del botón
        targetId = this.getAttribute("data-bs-target");
        activarBoton(targetId, pillsTab);
      });
    });
  }

  function handleResize() {
    if (window.innerWidth > 576) {
      const sidebarCollapse = new bootstrap.Collapse(
        $("#navbarToggleExternalContent"),
        { toggle: false }
      );
      getTarget($$("#v-pills-tab-sm .nav-link"), "v-pills-tab");
      sidebarCollapse.hide();
    } else {
      getTarget($$("#v-pills-tab .nav-link"), "v-pills-tab-sm");
    }
  }

  handleResize();
  window.addEventListener("resize", handleResize);
});

window.addEventListener("load", function () {
  getAttendanceList();
  getAttendanceStatus();
});
