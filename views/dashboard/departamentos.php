<?php $titulo = "Departamentos";
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
                        <h2> Modificar Departamentos</h2>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Opciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $it = 1; foreach ($this->departaments as $dp) { ?>
                                    <tr>
                                        <td><?php echo $it++; ?> </td>
                                        <td><?php echo $dp['name_dep'] ?></td>
                                        <td><?php echo $dp['description_dep'] ?></td>

                                        <td><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#depamodal<?php echo $dp['id_dep'] ?>">Editar</a></td>
                                        
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



<?php foreach ($this->departaments as $dp): ?>

    

<!-- Modal -->
<div class="modal fade" id="depamodal<?php echo $dp['id_dep'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar  Departamento de : <?php echo $dp['name_dep'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form action="<?php echo constant('URL'); ?>admin/departamentos" method="POST">
                        <input type="hidden" name="id" value="<?php echo $dp['id_dep']; ?>">
                            <div class="row justify-content-center">

                                <div class="form-group  col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nombre de departamento" name="name" value="<?php echo $dp['name_dep'] ?>">
                                    </div>
                                </div>

                                <div class="form-group  col-md-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $dp['description_dep'] ?></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-group ">
                                        <button type="submit" name="update" class="btn btn-corsetti btn-lg btn-block">Actualizar</button>
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


<?php endforeach; ?>






<?php include_once "views/dashboard/footer.php"; ?>