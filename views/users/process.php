<?php $titulo = "SOLICITUDES | USUARIO";
include_once "views/users/header.php"; ?>


<div class="container-fluid">
    <!-- row -->
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Listado  | <button type="button" class="btn cur-p btn-secondary" data-toggle="modal" data-target="#depamodal">Hacer Solicitud</button></h2>
                        <?php if(isset($this->mensajeerror)) {?>
                             <div class="alert  <?php echo $this->claseStyle;?>" role="alert">
                                <?php echo $this->mensajeerror;?>
                             </div>
                           <?php } ?> 
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive-sm">
                                <table class="table table-striped projects">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 2%">N°</th>
                                            <th style="width: 30%">Solicitud</th>
                                            <th>Fecha de Solicitud</th>
                                            <th>Progreso</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php $no = 1; foreach ($this->solicitudes as $solicitud) {?>


                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td>
                                                <a><?php echo $solicitud["code_desk"]." - ". $solicitud["name_desk"];?></a>
                                            </td>
                                            <td>
                                                <p><?php echo $solicitud["create_desk"];?></p>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress_sm">
                                                    <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $solicitud["progress_desk"];?>%;"></div>
                                                </div>
                                                <small>Progreso de Solicitud  <?php echo $solicitud["progress_desk"];?>% </small>
                                            </td>
                                            <td>
                                                <a href="<?php echo constant('URL');?>user/progressdetails/<?php echo $solicitud["id_desk"];?>" class="btn btn-success btn-xs">Detalles</a>
                                            </td>
                                        </tr>
                                        

                                       

                                    <?php } ?>




                                      





                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end dashboard inner -->





    
<!-- Modal -->
<div class="modal fade" id="depamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles de Solicitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form action="<?php echo constant('URL'); ?>user/setSolicitud" method="POST">
                            <div class="row justify-content-center">

                                <!-- <div class="form-group  col-md-12">
                                        <input type="text" class="form-control" placeholder="Codigo de Proceso : #00001 " name="name" disabled>
                                </div> -->
                                <div class="form-group  col-md-12">
                                    <label for=""> Equipo</label>
                                        <input type="text" class="form-control" placeholder="Equipo, ej: monitor, cpu, teclado, laptop, impresora...  " name="equipo">
                                </div>



                                <div class="form-group  col-md-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" placeholder="Describa en detalle la falla del equipo"></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-group ">
                                        <button type="submit" name="registrar" class="btn btn-corsetti btn-lg btn-block">Enviar</button>
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


    <?php include_once "views/users/footer.php"; ?>