<?php include('../view/head/header.php'); ?>

<?php include('../secciones/usuarios.php');

//comentar para comenzar a crear admin + root
// if (empty($_SESSION['usuario'])) {
//     header("Location:../index.php");
// }
?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">USUARIOS</h5>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="card card-header bg-secondary text-light fs-5">
                        Gestión de Usuarios
                    </div>
                    <div class="text-center row m-3">
                        <div class="col-md-6">
                            <button class="btn bg-success text-light mt-2 ">
                                <a class="nav-link text-center" href="/login/secciones/vista_usuarios-add.php">
                                    Agregar nuevo Usuario
                                </a>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <form action="vista_usuarios.php" method="post">
                                <input type="text" name="buscar" class="btn fw-bold fs-6 text-center mb-2 mt-2" 
                                    style="background-color: #a6c3de">
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
                                            <td><?= $response['usuario']; ?></td>
                                            <td><?= $response['apellidos']; ?></td>
                                            <td><?= $response['nombres'];  ?></td>
                                            <td><?= $response['email'];  ?></td>
                                            <td>
                                                <div class="d-flex ">
                                                    <form action="/login/secciones/vista_usuarios-edit.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" 
                                                                value="<?php echo $response['id'];  ?>">
                                                            <button onclick="return confirmEdit();" type="submit" name="accion" 
                                                                value="editar" class="btn btn-warning m-1">EDITAR
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <form action="/login/secciones/vista_usuarios.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" 
                                                                value="<?php echo $response['id'];  ?>">
                                                            <button onclick="return confirmDelete();" type="submit" name="accion" 
                                                                value="borrar" class="btn btn-danger m-1">QUITAR
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="/login/secciones/perfil_usuario.php" method="post">
                                                    <div role="group" aria-label="Button group name">
                                                        <input type="hidden" name="id" id="id" 
                                                            value="<?php echo $response['id'];  ?>">
                                                        <button type="submit" name="accion" value="editar" 
                                                            class="btn btn-secondary m-1">VER PERFIL
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
                                            <td class="fw-bold fs-6"><?php echo $usuario['usuario']; ?>
                                                <?php
                                                    foreach ($usuario["actividades"] as $actividad) { ?>
                                                        <br>
                                                        🟠<a class="text-light" href="#" id="listaActividades">
                                                            <?php echo $actividad['nombre_actividad']; ?> 
                                                        </a>
                                                        <!-- <form action="/login/secciones/vista_usuarios.php" method="post">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $usuario['id'];  ?>">
                                                            <button type="submit" name="accion" value="borrarAct">❌
                                                            </button>
                                                        </form> -->
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $usuario['apellidos']; ?></td>
                                            <td><?php echo $usuario['nombres']; ?></td>
                                            <td><?php echo $usuario['email']; ?></td>
                                            <td>
                                                <div class="d-flex ">
                                                    <form action="/login/secciones/vista_usuarios-edit.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" 
                                                                value="<?php echo $usuario['id'];  ?>">
                                                            <button onclick="return confirmEdit();" type="submit" name="accion" 
                                                                value="editar" class="btn btn-warning m-1">EDITAR
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <form action="/login/secciones/vista_usuarios.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" 
                                                                value="<?php echo $usuario['id'];  ?>">
                                                            <button onclick="return confirmDelete();" type="submit" name="accion" 
                                                                value="borrar" class="btn btn-danger m-1">QUITAR
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="/login/secciones/perfil_usuario.php" method="post">
                                                    <div role="group" aria-label="Button group name">
                                                        <input type="hidden" name="id" id="id" 
                                                            value="<?php echo $usuario['id'];  ?>">
                                                        <button type="submit" name="accion" value="editar" 
                                                            class="btn btn-secondary m-1">VER PERFIL
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
                    <!-- </div> -->
                </div>

                <?php if ($buscar != "") { ?>
                    <div class="container text-center mt-3">
                        <div class="row justify-content-between">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div>
                                    <a href="./vista_usuarios.php" class="btn btn-success m-2">
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

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    //new TomSelect('#listaActividades');

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
    }

    function confirmEdit() {
        let confirmar = confirm("¿Desea editar éste usuario?");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php include("../view/head/footer.php"); ?>