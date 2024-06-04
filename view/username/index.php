<?php
    require_once "../../controller/usernameController.php";
    $obj = new usernameController();
    $rows = $obj->index();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
            body {
                font-family: "Pzlayfair Display", serif;
                font-optical-sizing: auto;
                font-weight: weight;
                font-style: normal;
            }
            .custom-title {
            font-size: 20px;
            color: #333;
            }
            .btn-primary {
            font-size: 16px;
            font-weight: bold;
            }
        </style>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Uuarios</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-success">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($rows): ?>
                        <?php foreach($rows as $row): ?>
                            <tr>
                                <td><?= $row[0] ?></td>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><?= $row[3] ?></td>
                                <td><?= $row[4] ?></td>
                                <td><?= $row[5] ?></td>
                                <td>
                                    <!-- Botones para abrir las ventanas modales -->
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row[0] ?>">Ver</a>
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row[0] ?>">Editar</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row[0] ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No hay registros actualmente</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <a href="create.php" class="btn btn-success">Agregar Nuevo Usuario</a>
    </div>

   <!-- Ventanas Modales -->
<?php if($rows): ?>
    <?php foreach($rows as $row): ?>
        <!-- Ventana Modal para Ver -->
        <div class="modal fade" id="viewModal<?= $row[0] ?>" tabindex="-1" aria-labelledby="viewModalLabel<?= $row[0] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel<?= $row[0] ?>">Detalles del Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí puedes mostrar los detalles del usuario -->
                        <p>Nombre: <?= $row[1] ?></p>
                        <p>Dirección: <?= $row[2] ?></p>
                        <p>Teléfono: <?= $row[3] ?></p>
                        <p>Correo Electrónico: <?= $row[4] ?></p>
                        <p>Estado: <?= $row[5] ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

 <!-- Ventana Modal para Editar -->
<div class="modal fade" id="editModal<?= $row[0] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row[0] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?= $row[0] ?>">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar el usuario -->
                <form action="edit.php" method="POST">
                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label">Nombre:</label>
                        <input type="text" name="edit_nombre" class="form-control" id="edit_nombre" value="<?= $row[1] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="edit_direccion" class="form-label">Dirección:</label>
                        <input type="text" name="edit_direccion" class="form-control" id="edit_direccion" value="<?= $row[2] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="edit_telefono" class="form-label">Teléfono:</label>
                        <input type="text" name="edit_telefono" class="form-control" id="edit_telefono" value="<?= $row[3] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="edit_correo" class="form-label">Correo Electrónico:</label>
                        <input type="text" name="edit_correo" class="form-control" id="edit_correo" value="<?= $row[4] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="edit_estado" class="form-label">Estado:</label>
                        <input type="text" name="edit_estado" class="form-control" id="edit_estado" value="<?= $row[5] ?>">
                    </div>
                    <input type="hidden" name="edit_id" value="<?= $row[0] ?>">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<!-- Ventana Modal para Eliminar -->
<div class="modal fade" id="deleteModal<?= $row[0] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row[0] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?= $row[0] ?>">Eliminar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?= $row[0] ?>">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php endforeach; ?>
<?php endif; ?>

    <!-- JavaScript/jQuery (Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
