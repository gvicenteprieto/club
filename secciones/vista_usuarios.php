<?php include('../view/head/header.php'); ?>

<?php include('../secciones/usuarios.php');

//comentar para comenzar a crear admin + root
// if (empty($_SESSION['usuario'])) {
//     header("Location:../index.php");
// }
?>

<?php if ($_SESSION['usuario'] == "admin") : ?>
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">USUARIOS</h5>
                <div class="row">
                    <div class="col-12">
                        <br>
                        <div class="card card-header bg-secondary text-light fs-5">
                            Gestión de Usuarios
                        </div>
                        <div class="text-center row m-3">
                            <div class="col-6">
                                <button class="btn bg-success text-light mt-2 ">
                                    <a class="nav-link text-center" href="/login/secciones/vista_usuarios-add.php">
                                        Agregar nuevo Usuario
                                    </a>
                                </button>
                            </div>
                            <div class="col-6">
                                <form action="vista_usuarios.php" method="post">
                                    <input type="text" name="buscar" class="btn fw-bold fs-6 text-center mb-2 mt-2" style="background-color: #a6c3de">
                                    <input type="submit" value="Buscar Usuario" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive card-body card-background ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>DNI</th> -->
                                        <th>Usuario</th>
                                        <th>Apellidos</th>
                                        <th>Nombres</th>
                                        <th>Email</th>
                                        <th>Edición Registro Usuario</th>
                                        <th>Perfil de Usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($buscar != "") { ?>
                                        <?php foreach ($sql_response as $response) : ?>
                                            <tr>
                                                <!-- <td><?= $response['dni']; ?></td> -->
                                                <td class="fw-bold text-light fs-6"><i><?= $response['usuario']; ?></i></td>
                                                <td><?= $response['apellidos']; ?></td>
                                                <td><?= $response['nombres'];  ?></td>
                                                <td><?= $response['email'];  ?></td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <form action="/login/secciones/vista_usuarios-edit.php" method="post">
                                                            <div role="group" aria-label="Button group name">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $response['id'];  ?>">
                                                                <button onclick="return confirmEdit();" type="submit" name="accion" value="editar" class="btn btn-warning m-1">EDITAR
                                                                </button>
                                                            </div>
                                                        </form>

                                                        <form action="/login/secciones/vista_usuarios.php" method="post">
                                                            <div role="group" aria-label="Button group name">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $response['id'];  ?>">
                                                                <button onclick="return confirmDelete();" type="submit" name="accion" value="borrar" class="btn btn-danger m-1">QUITAR
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="/login/secciones/perfil_usuario.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $response['id'];  ?>">
                                                            <button type="submit" name="accion" value="editar" class="btn btn-secondary m-1">VER PERFIL
                                                            <i class="fa fa-eye text-info"> </i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <?php foreach ($usuarios as $usuario) : ?>
                                            <tr>
                                                <!-- <td><?php echo $usuario['dni']; ?></td> -->
                                                <td class="fw-bold text-light fs-6"><i><?php echo $usuario['usuario']; ?></i>
                                                    <!-- <?php
                                                            foreach ($usuario["actividades"] as $actividad) { ?>
                                                        <br>
                                                        🟠<a class="text-light" href="#" id="listaActividades">
                                                            <?php echo $actividad['nombre_actividad']; ?> 
                                                        </a>
                                                <?php } ?>  -->
                                                </td>
                                                <td><?php echo $usuario['apellidos']; ?></td>
                                                <td><?php echo $usuario['nombres']; ?></td>
                                                <td><?php echo $usuario['email']; ?></td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <form action="/login/secciones/vista_usuarios-edit.php" method="post">
                                                            <div role="group" aria-label="Button group name">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $usuario['id'];  ?>">
                                                                <button onclick="return confirmEdit();" type="submit" name="accion" value="editar" class="btn btn-warning m-1">EDITAR
                                                                </button>
                                                            </div>
                                                        </form>

                                                        <form action="/login/secciones/vista_usuarios.php" method="post">
                                                            <div role="group" aria-label="Button group name">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $usuario['id'];  ?>">
                                                                <button onclick="return confirmDelete();" type="submit" name="accion" value="borrar" class="btn btn-danger m-1">QUITAR
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="/login/secciones/perfil_usuario.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $usuario['id'];  ?>">
                                                            <button type="submit" name="accion" value="editar" class="btn btn-secondary m-1">VER PERFIL
                                                                <i class="fa fa-eye text-info"> </i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if ($buscar != "") { ?>
                        <div class="container text-center mt-3">
                            <div class="row justify-content-between">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <div>
                                        <a href="./vista_usuarios.php" class="btn btn-secondary m-2">
                                            REGRESAR
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($_SESSION['usuario'] !== "admin") : ?>
    <div class="container px-4 py-5">
        <h5 class="text-center text-danger mt-3">
            <i>No posee permisos para acceder a la sección Usuarios</i>
        </h5>
    </div>
    <div class="container">
        <h2 class="pb-2 border-bottom text-warning">Secciones habilitadas</h2>
        <div class="container text-center mt-5">
            <div class="row justify-content-around">
                <div class="col-3">
                    <div>
                        <div>
                            <h3 class="fs-3 text-light">Actividades</h3>
                            <p>Actividades disponibles.</p>
                            <a href="../../secciones/vista_actividades.php" class="btn btn-success">
                                Ver Actividades
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div>
                            <h3 class="fs-3 text-light">Socios</h3>
                            <p>Listado de socios.</p>
                            <a href="../../secciones/vista_socios.php" class="btn btn-success">
                                Ver Socios
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect("#listaActividades", {
        plugins: ['remove_button'],
    });
    new TomSelect("#activity", {
        plugins: ['remove_button'],
    });
</script>

<script type="text/javascript">
    function confirmDelete() {
        let confirmar = confirm("¿Confirma la eliminación de éste registro?");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    };

    function confirmEdit() {
        let confirmar = confirm("¿Desea editar éste usuario?");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    };
</script>

<?php include("../view/head/footer.php"); ?>