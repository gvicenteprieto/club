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
                    <div class="card card-background p-1 mb-3">
                        <br>
                        <div class="card card-header bg-secondary text-light fs-5">
                            <a class="nav-link text-center mt-1" href="/login/secciones/vista_usuarios.php">
                                Listado de Usuarios
                            </a>
                        </div>

                        <div class="text-center row">
                            <div class="col-md-6">
                                <button class="btn bg-success text-light mt-2 ">
                                    <a class="nav-link text-center" 
                                        href="/login/secciones/vista_usuarios-add.php">
                                        Agregar nuevo usuario
                                    </a>
                                </button>
                            </div>

                            <div class="col-md-6">
                                <form action="vista_usuarios.php" method="post">
                                    <input type="text" name="buscar" 
                                        class="btn fw-bold fs-6 text-center mb-2 mt-2" 
                                        style="background-color: #a6c3de">
                                    <input type="submit" value="Buscar" class="btn btn-primary">
                                </form>
                            </div>
                        </div>

                        <div class="table-responsive card-body card-background ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Usuario</th>
                                        <th>Apellidos</th>
                                        <th>Nombres</th>
                                        <th>Email</th>
                                        <th>Edición Registro Usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($buscar != "") { ?>
                                        <?php foreach ($sql_response as $response) : ?>
                                            <tr>
                                                <td><?= $response['dni']; ?></td>
                                                <td class="text-primary fw-bold"><?= $response['usuario']; ?></td>
                                                <td><?= $response['apellidos']; ?></td>
                                                <td><?= $response['nombres'];  ?></td>
                                                <td><?= $response['email'];  ?></td>
                                                <td>
                                                    <form action="/login/secciones/vista_usuarios-edit.php" method="post">
                                                        <input type="hidden" name="dni" id="dni" value="<?php echo $response['dni']; ?>">
                                                        <!-- <input type="submit" value="seleccionar" 
                                                            name="accion" class="btn btn-warning"> -->
                                                        <button onclick="return confirmEdit();" type="submit" class="btn btn-warning">
                                                            <input type="hidden" value="seleccionar" name="accion">EDITAR REGISTRO
                                                        </button>
                                                        <button onclick="return confirmDelete();" 
                                                            type="submit" name="accion" value="borrar" 
                                                            class="btn btn-danger">BORRAR REGISTRO
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <?php foreach ($usuarios as $usuario) : ?>
                                            <tr>
                                                <td><?php echo $usuario['dni']; ?></td>
                                                <td class="text-primary fw-bold"><?php echo $usuario['usuario']; ?></td>
                                                <td><?php echo $usuario['apellidos']; ?></td>
                                                <td><?php echo $usuario['nombres']; ?></td>
                                                <td><?php echo $usuario['email']; ?></td>
                                                <td>
                                                    <form action="/login/secciones/vista_usuarios-edit.php" method="post">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $usuario['id'];  ?>">
                                                        <button onclick="return confirmEdit();" type="submit" name="accion" 
                                                            value="editar" class="btn btn-warning m-1">EDITAR
                                                        </button>
                                                        <button onclick="return confirmDelete();" type="submit" name="accion" 
                                                            value="borrar" class="btn btn-danger m-1">QUITAR
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirmDelete() {
        let confirmar = confirm("¿Confirma la eliminación de éste registro?");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    }

    // Swal.fire({
    //     title: 'Are you sure?',
    //     text: "You won't be able to revert this!",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Yes, delete it!'
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         Swal.fire(
    //             'Deleted!',
    //             'Your file has been deleted.',
    //             'success'
    //         )
    //     }
    // })
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