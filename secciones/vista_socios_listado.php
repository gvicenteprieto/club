<?php include('../view/head/header.php'); ?>
<?php include('../secciones/socios.php');  ?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">LISTA DE SOCIOS</h5>

            <div class="row">



                <div class="table-responsive card-body card-background">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>N° SOCIO</th>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Localidad/Barrio - Partido</th>
                                <th>Edición Registro Socio</th>
                                <th>Perfil de Socio</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($socios as $socio) : ?>
                                <tr>
                                    <td><?php echo $socio['NSOCIO']; ?></td>
                                    <td><?php echo $socio['APELLIDO']; ?></td>
                                    <td><?php echo $socio['NOMBRE']; ?></td>
                                    <td><?php echo $socio['CELULAR']; ?></td>
                                    <td><?php echo $socio['EMAIL']; ?></td>
                                    <td><?php echo $socio['LOCALIDAD']; ?> - <?php echo $socio['PARTIDO']; ?></td>
                                    <td>
                                        <div class="d-flex ">
                                            <form action="/login/secciones/vista_socios-edit.php" method="post">
                                                <div role="group" aria-label="Button group name">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $socio['id'];  ?>">
                                                    <button onclick="return confirmEdit();" type="submit" name="accion" value="editar" class="btn btn-warning m-1">EDITAR
                                                    </button>
                                                </div>
                                            </form>
                                            <form action="/login/secciones/vista_socios_listado.php" method="post">
                                                <div role="group" aria-label="Button group name">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $socio['id'];  ?>">
                                                    <button onclick="return confirmDelete();" type="submit" name="accion" value="borrar" class="btn btn-danger m-1">QUITAR
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </td>
                                    <td>
                                        <form action="/login/secciones/perfil_socio.php" method="post">
                                            <div role="group" aria-label="Button group name">
                                                <input type="hidden" name="id" id="id" value="<?php echo $socio['id'];  ?>">
                                                <button type="submit" name="accion" value="editar" class="btn btn-secondary m-1">VER PERFIL
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
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