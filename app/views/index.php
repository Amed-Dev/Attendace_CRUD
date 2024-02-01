<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="stylesheet" href="../../assets/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/stylesCustomized.css">
  <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
  <title>Attendace CRUD</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-auto bg-dark sticky-top-md "> <!--Contenedor general del Sidebar -->
        <div
          class="d-flex flex-lg-column flex-column flex-sm-row flex-nowrap align-items-center text-white sticky-top-md fixed-top min-vh-lg-100 pt-xl-4 pt-lg-2 overflow-hidden"> <!--Contenedor flexible del Sidebar -->
          <span
            class="d-block text-danger-emphasis fs-4 fw-bold border rounded-3 p-3 mx-3 border-info d-smA-none">TECHS</span>
          <div
            class="nav nav-pills nav-flush flex-lg-column flex-column flex-sm-row flex-nowrap mb-auto mx-auto text-center p-3 d-smA-none"
            id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active text-lg-start text-md-center" id="v-pills-home-tab" data-bs-toggle="pill"
              data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
              <i class="fs-4 bi-house"></i>
              <span class="ms-1 d-none d-sm-inline">Home</span></button>
            <button class="nav-link text-lg-start text-md-center" id="v-pills-asistencia-tab" data-bs-toggle="pill"
              data-bs-target="#v-pills-asistencia" type="button" role="tab" aria-controls="v-pills-asistencia"
              aria-selected="false"><i class="fs-4 bi-calendar-check"></i> <span
                class="ms-1 d-none d-sm-inline">Asistencia</span></button>
            <button class="nav-link text-lg-start text-md-center" id="v-pills-trabajadores-tab" data-bs-toggle="pill"
              data-bs-target="#v-pills-trabajadores" type="button" role="tab" aria-controls="v-pills-trabajadores"
              aria-selected="false"><i class="fs-4 bi-people"></i> <span
                class="ms-1 d-none d-sm-inline">Trabajadores</span></button>
          </div>  <!-- Botones de navegación-->
          <div class="dropdown p-3 align-self-lg-start d-smA-none" id="dropdownContainer">
            <a href="#"
              class="d-flex align-items-center justify-content-center p-3 text-white text-decoration-none dropdown-toggle"
              id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../../assets/img/admin.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
              <span class="d-none d-sm-inline mx-1">Admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow ">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
          <!-- collapse for mobile devices -->
          <nav class="navbar navbar-dark bg-dark d-sm-none fixed-top-md">
            <div class="container-fluid">
              <span
                class="d-block text-danger-emphasis fs-4 fw-bold border rounded-3 p-3 mx-3 border-info ">TECHS</span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>

          </nav>

          <div class="collapse collapse-horizontal align-self-start" id="navbarToggleExternalContent"
            data-bs-theme="dark">
            <div class="bg-dark pt-sm-26 min-vh-sm-100 sidebar">
              <div
                class="nav nav-pills nav-flush flex-lg-column flex-column flex-md-row flex-nowrap mb-auto mx-auto text-center p-3 d-sm-block min-vh-sm-50"
                id="v-pills-tab-sm" role="tablist" aria-orientation="vertical">
                <button class="nav-link active text-lg-start text-md-center" id="v-pills-home-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                  aria-selected="true">
                  <i class="fs-4 bi-house"></i>
                  <span class="ms-1 d-none d-sm-inline">Home</span></button>
                <button class="nav-link text-lg-start text-md-center" id="v-pills-asistencia-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-asistencia" type="button" role="tab" aria-controls="v-pills-asistencia"
                  aria-selected="false"><i class="fs-4 bi-calendar-check"></i> <span
                    class="ms-1 d-none d-sm-inline">Asistencia</span></button>
                <button class="nav-link text-lg-start text-md-center" id="v-pills-trabajadores-tab"
                  data-bs-toggle="pill" data-bs-target="#v-pills-trabajadores" type="button" role="tab"
                  aria-controls="v-pills-trabajadores" aria-selected="false"><i class="fs-4 bi-people"></i> <span
                    class="ms-1 d-none d-sm-inline">Trabajadores</span></button>
              </div>
              <div class="dropdown p-3 align-self-lg-start" id="dropdownContainer">
                <a href="#"
                  class="d-flex align-items-center justify-content-center p-3 text-white text-decoration-none dropdown-toggle"
                  id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../../assets/img/admin.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                  <span class="d-none d-sm-inline mx-1">Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow ">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md p-0 min-vh-100 ">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
            tabindex="0">
            <div class="d-flex align-items-center justify-content-center min-vh-100 ">
              <div class="card  text-center min-lg-w-60 w-80">
                <div class="card-header fs-4 text-start text-info-emphasis ">
                  <span id="saludo"></span>
                </div>
                <div class="card-body " id="home-card-body">
                  <div class="blur container">
                    <h5 class="card-title fs-1">Bienvenido</h5>
                    <p class="card-text">a <span class="text-danger-emphasis fs-4 fw-bold ">TECHS</span></p>
                  </div>

                </div>
                <div class="card-footer text-body-secondary">
                  <span class="text-info fs-5" id="dateTime"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade pt-sm-26" id="v-pills-asistencia" role="tabpanel"
            aria-labelledby="v-pills-asistencia-tab" tabindex="0">
            <?php include "./asistencia/asistencia.php"; ?>
          </div>
          <div class="tab-pane fade pt-sm-26" id="v-pills-trabajadores" role="tabpanel"
            aria-labelledby="v-pills-trabajadores-tab" tabindex="0">
            <?php include "./empleado/empleado.php"; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>