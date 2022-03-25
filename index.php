<?php
include_once "bd/conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "select id, nombre, pais, edad from personas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data= $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DataTable</title>

    <link
      rel="stylesheet"
      href="lib/bootstrap-4.3.1-dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="main.css" />

    <link rel="stylesheet" href="lib/datatables.min.css" />
    <link
      rel="stylesheet"
      href="lib/DataTables-1.11.5/css/dataTables.bootstrap5.min.css"
    />
  </head>
  <body>
    <header>
      <h4 class="text-center text-light">
        <span class="badge badge-danger"> DATATABLES</span>
      </h4>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <button id="btnNuevo" type="button" class="btn-btn-success">
            Nuevo
          </button>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table
              id="tablaPersonas"
              class="table table-striped table-bordered table-condensed"
              style="width: 100%"
            >
              <thead class="text-center">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Pais</th>
                  <th>Edad</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($data as $dat){
                 ?>
                <tr>
                  <td><?php echo $dat ["id"]?></td>
                  <td><?php echo $dat ["nombre"]?></td>
                  <td><?php echo $dat ["pais"]?></td>
                  <td><?php echo $dat ["edad"]?></td>
                  <td>
                    <div class="text-center">
                      <div class="btn-group">
                        <button class="btn btn-primary btnEditar">
                          Editar
                        </button>
                        <button class="btn btn-danger btnBorrar">Borrar</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- modal -->

    <div
      class="modal fade"
      id="modalCRUD"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLAbel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="formPersonas">
            <div class="modal-body">
              <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" />
              </div>
              <div class="form-group">
                <label for="pais" class="col-form-label">Pais:</label>
                <input type="text" class="form-control" id="pais" />
              </div>
              <div class="form-group">
                <label for="edad" class="col-form-label">Edad:</label>
                <input type="text" class="form-control" id="edad" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">
                Cancelar
              </button>
              <button type="submit" id="btnGuardar" class="btn btn-dark">
                Guardar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- jquery, popper,bootstrap -->
    <script src="lib/jquery-3.6.0.min.js"></script>
    <script src="lib/popper.min.js"></script>
    <script src="lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

    <!-- datables -->
    <script type="text/javascript" src="lib/datatables.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
  </body>
</html>
