<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="stylesheet" href="../../assets/css/all.min.css">
  <title>Attendace CRUD</title>
</head>

<body>
  <div class="container p-4 mx-2">
    <h1 class="text-center">Asitencia empleados</h1>
    <!-- Button trigger modal -->
    <div class="row justify-content-end ">
      <button type="button" class="btn btn-primary col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
          class="fa-solid fa-circle-plus"></i>
        Launch demo modal
      </button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>