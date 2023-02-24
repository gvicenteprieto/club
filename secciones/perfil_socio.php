<?php include('../view/head/header.php'); ?>

<?php include('../secciones/socios.php');


$id = isset($_POST['id']) ? $_POST['id'] : "";
print_r($id);
if ($id) {
    $sql = "SELECT * FROM socios WHERE id=:id";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        $id = $user['id'];
        $NSOCIO = $user['NSOCIO'];
        $APELLIDO = $user['APELLIDO'];
        $NOMBRE = $user['NOMBRE'];
        $FINGRESO = $user['FINGRESO'];
        $CALLE = $user['CALLE'];
        $ALTURA = $user['ALTURA'];
        $ECALLE_1 = $user['ECALLE_1'];
        $ECALLE_2 = $user['ECALLE_2'];
        $PISO = $user['PISO'];
        $DEPTO = $user['DEPTO'];
        $PARTIDO = $user['PARTIDO'];
        $CPOSTAL = $user['CPOSTAL'];
        $LOCALIDAD = $user['LOCALIDAD'];
        $CELULAR = $user['CELULAR'];
        $DNI = $user['DNI'];
        $FNACIMIENTO = $user['FNACIMIENTO'];
        $OSOCIAL = $user['OSOCIAL'];
        $NAFILIADO = $user['NAFILIADO'];
        $EMAIL = $user['EMAIL'];
        $OBSERVACIONES = $user['OBSERVACIONES'];
        $ESTADO = $user['ESTADO'];
    };
}

?>
<style>
    #customers {
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>

<div class="container p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">
                Perfil de Socio
            </h5>
            <div class="row">
                <div>
                    <div class="card p-3">
                        <br>
                        <div class="card card-header bg-secondary text-light">
                            <h5 class="fs-4 text-center text-warning">
                                <?php echo "N° de Socio "; ?>
                                <i>
                                    <?php echo $NSOCIO; ?>
                                </i>
                            </h5>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive card-background">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>N° SOCIO</th>
                                            <th>Apellido</th>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Localidad/Barrio - Partido</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $NSOCIO; ?></td>
                                            <td><?php echo $APELLIDO; ?></td>
                                            <td><?php echo $NOMBRE; ?></td>

                                            <td><?php echo $CELULAR; ?></td>
                                            <td><?php echo $EMAIL; ?></td>

                                            <td><?php echo $LOCALIDAD; ?> - <?php echo $PARTIDO; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
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
</script>
<?php include("../view/head/footer.php"); ?>