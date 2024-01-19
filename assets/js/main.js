const $ = (selector, context = document) => context.querySelector(selector);

const success = $("#success");
const error = $("#error");
const dataLoadEmploye = $("#registerEmployeForm");
const modalS = new bootstrap.Modal($("#modalRegisterUser"));
const modalU = new bootstrap.Modal($("#modalEdit"));
const modalD = new bootstrap.Modal($("#modalDelete"));
async function DBOperation(url, accion, msg_success, myModal) {
  // Crear un objeto FormData para enviar los datos del formulario
  try {
    //alamacena la data del formulario
    // const formData = new FormData(HTMLFormEl);
    // almacenar la respuesta del servidor
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify({ accion: "registerEmpleado" }),
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (response.ok) {
      setTimeout(() => {
        success.classList.remove("d-none");
        $("#msg_success").insertAdjacentHTML("afterbegin", msg_success);
        myModal.hide();
        clearModal();
        success.classList.add("d-block");
      }, 1500);

      setTimeout(() => {
        success.classList.remove("d-block");
        success.classList.add("d-none");
        $("#msg_success").insertAdjacentHTML("afterbegin", "");
        getMoviesCategory();
      }, 3500);
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

async function getMoviesCategory() {
  try {
    const response = await fetch("../../app/peliculas/shownMovies.php");
    if (!response.ok) {
      throw new Error("No se puede obtener la información de las películas");
    }
    const datos = await response.json();
    mostrarDatos(datos);
  } catch (error) {
    console.error(error.message);
  }
}

// Mostrar los datos en el contenedor
function mostrarDatos(datos) {
  var contenidoHTML = "";
  datos.forEach(function (dato) {
    contenidoHTML += "<tr class='align-middle'>";
    contenidoHTML += "<td>" + dato.id + "</td>";
    contenidoHTML += "<td>" + dato.nombre + "</td>";
    contenidoHTML += "<td>" + dato.descripcion + "</td>";
    contenidoHTML +=
      "<td class='text-center'>" +
      '<span class="badge rounded-pill text-bg-' +
      dato.color +
      '">' +
      dato.genero +
      "</span>" +
      "</td>";
    contenidoHTML +=
      "<td>" +
      '    <img src="data:image/jpeg; base64,' +
      dato.poster +
      '" class="card-img-top img-thumbnail border-3 w-25 mx-auto d-block border-dark-subtle" alt="...">' +
      "</td>";
    contenidoHTML +=
      "<td class='text-center'>" +
      '<div class="d-flex flex-column justify-content-center align-itemscenter gap-4 mx-2"> <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" data-bs-id="' +
      dato.id +
      '"><i class="fa-solid fa-pen-to-square"></i> Editar</button>' +
      '<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" data-bs-id="' +
      dato.id +
      '"><i class="fa-solid fa-trash"></i> Eliminar</button>' +
      "</div></td>";
    contenidoHTML += "</tr>";
  });

  // Muestra el contenido en el contenedor
  document.getElementById("moviesList").innerHTML = contenidoHTML;
}

dataLoadEmploye.addEventListener("submit", (event) => {
  event.preventDefault();
  let modal = modalS;
  let url = "../../app/controllers/empleadoController.php";
  let accion = "registerEmpleado";
  // let HTMLFormElement = dataLoad;
  let msg_success = "Su pelicula ha sido añadida exitosamente";
  DBOperation(url, HTMLFormElement, msg_success, modal);
});
