<?php $titulo = "SOLICITUDES | ".strtoupper($_SESSION['usuario'][0]['name_dep']);
include_once "views/users/header.php"; ?>



<div class="container-fluid">
    <?php if (isset($this->success) and !empty($this->success)) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <?php echo $this->success; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($this->error) and !empty($this->error)) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    <?php echo $this->error; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
   

    <!-- row -->
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>
                            Solicitudes Realizadas |

                            <button type="button" class="btn cur-p btn-primary" data-toggle="modal" data-target="#newsoli"> <i class="fa fa-folder-open blue_color"></i> Nueva Solicitud</button> |

                            

                        </h2>
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
                                            <th>DESCRIPCIÓN</th>
                                            <th>DEPARTAMENTO</th>
                                            <th>ESTADO</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1;
                                        foreach ($this->solicitudes as $solicitudes) : ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $solicitudes['descrip_request']; ?></td>

                                                <td><?php echo $solicitudes['name_dep']; ?></td>


                                                <td>

                                                <?php echo 

$solicitudes['status_request'] == 1 ? "<button class='btn btn-outline-danger'>".
$solicitudes['name_statusreques']." <i class='fa fa-clock'></i></button>" : 
"<button class='btn btn-outline-success'>".
$solicitudes['name_statusreques']." <i class='fa fa-check-circle'></i></button>" ;
                                                ?>
                                                    
                                                </td>

                                               

                                               
                                            <tr>
                                            <?php endforeach; ?>










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
    <div class="modal fade" id="newsoli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-folder-open blue_color"></i> Nueva Solicitud de Equipo <br> <small> (especifica los detalles del equipo que tu departamento necesita)</small></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="<?php echo constant('URL'); ?>user/solicitudes" method="POST">


                               


                                <div class="row justify-content-start">
                                    <div class="form-group col-md-12">
                                        
                                        <label for="exampleFormControlTextarea1">Descripcion de solicitud </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                            </div>
                                            
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ej: El departamento xxxxx requiere de una impresora...." name="descrip_request"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="form-group col-md-6">
                                        <div class="form-group ">
                                            <button type="submit" name="newequip" value="newequip" class="btn btn-corsetti btn-lg btn-block btn-outline-info">Enviar <i class="fas fa-location-arrow"></i></button>
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