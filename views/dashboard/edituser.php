<?php $titulo = "DASHBOARD";
include_once "views/dashboard/header.php"; ?>

<div class="container">
    <div class="row my-5">
        <div class="col-md-12">
            <h3 class="text-center">Editando Usuario : "<?php echo $this->usuario[0]['name'] . " " . $this->usuario[0]['lastname']; ?>"</h3>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php if (isset($this->mensaje)) { ?>
            <div class="alert  alert-success" role="alert">
                <?php echo $this->mensaje; ?>
            </div>
        <?php } ?>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?php echo constant('URL'); ?>admin/updateUser" method="POST">
                <input type="hidden" name="id" value="<?php echo $this->usuario[0]['id_user']; ?>">
                <div class="row justify-content-center">

                    <div class="form-group  col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre" name="name" value="<?php echo $this->usuario[0]['name']; ?>">
                        </div>
                    </div>

                    <div class="form-group  col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Apellido" name="lastname" value="<?php echo $this->usuario[0]['lastname']; ?>">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="correo@example.com" name="email" value="<?php echo $this->usuario[0]['email']; ?>">
                        </div>
                    </div>

                    <div class="form-group  col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" value="<?php echo $this->usuario[0]['password']; ?>">
                        </div>
                    </div>




                    <div class="form-group  col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Telefono" name="phone" value="<?php echo $this->usuario[0]['phone']; ?>">
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group ">
                            <button type="submit" name="update" class="btn btn-success btn-lg btn-block">Acutalizar</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>



<?php include_once "views/dashboard/footer.php"; ?>