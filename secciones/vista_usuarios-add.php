<?php include('../view/head/header.php'); ?>

<?php include('../secciones/usuarios.php'); ?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">USUARIOS</h5>
            <div class="row">

                <div class="col-md-12 mb-3">

                    <form action="" method="post">
                        <div class="card card-background p-1">
                            <br>
                            <!-- <div class="card card-header bg-success text-light text-center mt-1 fw-bold"> -->
                            <div class="btn btn-success fw-bold">
                               Gestión de ALTA usuarios
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="dni" class="form-label text-secondary">DNI</label>
                                    <input type="text" class="form-control" name="dni" id="dni" 
                                        value="<?php echo $dni; ?>" placeholder="Documento Nacional de Identidad">
                                </div>
                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="text" class="form-control text-primary fw-bold fs-5" 
                                        name="usuario" id="usuario"  placeholder="Usuario">
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label text-secondary">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" 
                                        value="<?php echo $apellidos; ?>" placeholder="Apellidos">
                                </div>
                                <div class="mb-3">
                                    <label for="nombres" class="form-label text-secondary">Nombres</label>
                                    <input type="text" class="form-control" name="nombres" id="nombres" 
                                        value="<?php echo $nombres; ?>" placeholder="Nombres">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label text-secondary">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" 
                                        value="<?php echo $email; ?>" placeholder="Correo Electrónico">
                                </div>
                                <div class="mb-3"></div>

                                <!-- ACTIVIDADES -->
                                 <div class="mb-3">
                                    <label for="" class="form-label">Seleccione actividad disponible para vincular al usuario: </label>

                                    <select multiple class="form-control" name="actividades[]" id="listaActividades">
                                    <!-- <option value="">Seleccione actividad:</option>  -->
                                        <?php foreach($actividades as $actividad){ ?>
                                            <option
                                                <?php
                                                    if(!empty($arrayActividades)): 
                                                        if(in_array($actividad['id'],$arrayActividades)):
                                                            echo "selected";
                                                        endif;

                                                    endif;  
                                                ?>
                                                value="<?php echo $actividad['id']; ?>">
                                                <?php echo $actividad['id']; ?> - <?php echo $actividad['nombre_actividad']; ?>
                                            </option>
                                        <?php } ?>
                                        
                                    </select>
                                </div> 

                                <div class="btn-group d-flex " role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregar" 
                                        class="btn btn-success fw-bold">AGREGAR NUEVO USUARIO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect("#listaActividades",{
		plugins: ['remove_button'],
	});
	
</script> 
<?php include("../view/head/footer.php"); ?>