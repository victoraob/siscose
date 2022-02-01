<?php $titulo = "USUARIOS";
include_once "views/dashboard/header.php"; ?>


<div class="container">
    <div class="row">


        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                           <?php if(isset($this->mensajeerror)) {?>
                             <div class="alert  <?php echo $this->claseStyle;?>" role="alert">
                                <?php echo $this->mensajeerror;?>
                             </div>
                           <?php } ?> 
                        <h2> <button type="button" class="btn cur-p btn-info" data-toggle="modal" data-target="#registromodal">Nuevo Usuario</button> | <button type="button" class="btn cur-p btn-primary" data-toggle="modal" data-target="#registrotech">Nuevo Tecnico</button> | <button type="button" class="btn cur-p btn-secondary" data-toggle="modal" data-target="#depamodal">Agregar Departamento</button></h2>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo Electronico</th>
                                    <th>Telefono</th>
                                    <th>Rol</th>
                                    <th>Departamento</th>
                                    <th>Estado</th>
                                    <th>Fecha de creacion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $it = 1; foreach ($this->usuarios as $usuario) { ?>
                                    <tr>
                                        <td><?php echo $it++; ?> </td>
                                        <td><?php echo $usuario['name'] ?> <?php echo $usuario['lastname'] ?></td>
                                        <td><?php echo $usuario['email'] ?></td>
                                        <td><?php echo $usuario['phone'] ?></td>
                                        <td><?php echo $usuario['name_rols'] ?></td>
                                        <td><?php echo $usuario['name_dep'] ?></td>
                                        <td><?php echo $usuario['status'] == 1 ? "Activo" : "Inactivo"; ?></td>
                                        <td><?php echo $usuario['create_at'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <a href="<?php echo constant('URL'); ?>admin/editUser/<?php echo $usuario['id_user'];?>" class="btn btn-warning">
                                                    <i class="fas fa-edit "></i>
                                                </a>

                                                


                                                <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteproduct<?php echo $producto["id_products"]; ?>"><i class="fas fa-trash-alt "></i></a> -->

                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->




    </div>
</div>










<!-- Modal -->
<div class="modal fade" id="registromodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form action="<?php echo constant('URL'); ?>admin/registro" method="POST">
                            <div class="row justify-content-center">

                                <div class="form-group  col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nombre" name="name" pattern="[A-Z-a-z]+">
                                        
                                    </div>
                                    <small>solo se permiten letras</small>
                                </div>

                                <div class="form-group  col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Apellido" name="lastname" pattern="[A-Z-a-z]+">
                                    </div>
                                    <small>solo se permiten letras</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="correo@example.com" name="email">
                                    </div>
                                </div>

                                <div class="form-group  col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                    </div>
                                </div>




                                <div class="form-group  col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Telefono" name="phone">
                                    </div>
                                </div>

                                <!-- <div class="form-group  col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>

                                        <select class="form-control" id="exampleFormControlSelect1" name="rol">
                                            <option selected disabled>Tipo de usuario</option>

                            <?php foreach ($this->rols as $rol){?>
                                        <option value=" <?php echo $rol['id_rols']?>"><?php echo $rol['name_rols']?></option>
                            <?php }?>

                                            
                                        </select>
                                    </div>
                                </div> -->

                                <input type="hidden" name="rol" value="3">


                                <div class="form-group  col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>

                                        <select class="form-control" id="exampleFormControlSelect1" name="departament">
                                            <option selected disabled>Departamento</option>

                                        <?php foreach ($this->departaments as $depa){?>
                                        <option value=" <?php echo $depa['id_dep']?>"><?php echo $depa['name_dep']?></option>
                                        <?php }?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-group ">
                                        <button type="submit" name="registrar" class="btn btn-corsetti btn-lg btn-block">Registrar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="registrotech" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro Nuevo Tecnico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form action="<?php echo constant('URL'); ?>admin/registro" method="POST">
                            <div class="row justify-content-center">

                                <div class="form-group  col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nombre" name="name">
                                    </div>
                                </div>

                                <div class="form-group  col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Apellido" name="lastname">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="correo@example.com" name="email">
                                    </div>
                                </div>

                                <div class="form-group  col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                    </div>
                                </div>




                                <div class="form-group  col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Telefono" name="phone">
                                    </div>
                                </div>

                                <!-- <div class="form-group  col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>

                                        <select class="form-control" id="exampleFormControlSelect1" name="rol">
                                            <option selected disabled>Tipo de usuario</option>

                            <?php foreach ($this->rols as $rol){?>
                                        <option value=" <?php echo $rol['id_rols']?>"><?php echo $rol['name_rols']?></option>
                            <?php }?>

                                            
                                        </select>
                                    </div>
                                </div> -->

                                <input type="hidden" name="rol" value="2">
                                <input type="hidden" name="departament" value="2">
                                
                                <div class="form-group  col-md-12">
                                <hr><h6>Departamento de Informatica</h6><hr>
                                </div>
                                

                                <!-- <div class="form-group  col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>

                                        <select class="form-control" id="exampleFormControlSelect1" name="departament">
                                            <option selected disabled>Departamentos</option>

                                        <?php foreach ($this->departaments as $depa){?>
                                        <option value=" <?php echo $depa['id_dep']?>"><?php echo $depa['name_dep']?></option>
                                        <?php }?>

                                        </select>
                                    </div>
                                </div> -->

                                <div class="form-group col-md-6">
                                    <div class="form-group ">
                                        <button type="submit" name="registrar" class="btn btn-corsetti btn-lg btn-block">Registrar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="depamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form action="<?php echo constant('URL'); ?>admin/setDepartaments" method="POST">
                            <div class="row justify-content-center">

                                <div class="form-group  col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nombre de departamento" name="name">
                                    </div>
                                </div>

                                <div class="form-group  col-md-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-group ">
                                        <button type="submit" name="registrar" class="btn btn-corsetti btn-lg btn-block">Registrame</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include_once "views/dashboard/footer.php"; ?>