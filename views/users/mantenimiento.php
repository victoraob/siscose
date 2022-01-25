<?php $titulo = "DASHBOARD | MANTENIMIENTO DE EQUIPOS";
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
                        <h2>Listado | <button type="button" class="btn cur-p btn-outline-info" data-toggle="modal" data-target="#depamodal">Enviar Equipo a mantenimiento <i class="fas fa-cloud"></i></button></h2>
                        <?php
                        //  echo '<pre>';
                        //  var_dump($this->mainEquipment);
                        //  echo '</pre>';
 
                         ?>
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
                                            <th style="width: 30%">Equipo</th>
                                            <th>Fecha de Envio</th>
                                            <th>Progreso</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1;
                                        foreach ($this->mainEquipment as $mainEquipment) { ?>


                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>
                                                    <a><?php echo $mainEquipment["name_equipmenttype"]. " - " . $mainEquipment["marca_equipcomp"]. " - " . $mainEquipment["model_equipcomp"]. " - " . $mainEquipment["color_equipcomp"]; ?></a>
                                                </td>
                                                <td>
                                                    <p><?php echo $mainEquipment["create_equipcomp"]; ?></p>
                                                </td>
<?php if ($mainEquipment["status_equipcomp"] == 2) : ?>
    <td><button type="button" class="btn btn-danger">Equipo Dañado</button></td>
<?php else: ?> 
    <td class="project_progress">
                                                    <div class="progress progress_sm">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $mainEquipment["progress_maintenance"]; ?>%;"></div>
                                                    </div>
                                                    <small>Progreso de Mantenimiento <?php echo $mainEquipment["progress_maintenance"]; ?>% </small>
                                                </td>
<?php endif; ?> 
                                               
                                                <!--<td>
                                                     <a href="<?php echo constant('URL'); ?>user/progressdetails/<?php echo $mainEquipment["id_desk"]; ?>" class="btn btn-success btn-xs">Detalles</a> 
                                                </td>-->
                                                <td>
                                                <?php 
                                                
if ($mainEquipment["id_statusequip"] == 1) {
    echo "<button class='btn btn-outline-success'>".
    $mainEquipment['name_statusequip']." <i class='fa check-circle'></i></button>";

}if ($mainEquipment["id_statusequip"] == 2) {
    echo "<button class='btn btn-danger'>".
    $mainEquipment['name_statusequip']." <i class='fa fa-clock'></i></button>";

}if ($mainEquipment["id_statusequip"] == 3) {
    echo "<button class='btn btn-outline-warning'>".
    $mainEquipment['name_statusequip']." <i class='fa fa-clock'></i></button>";
}

                                                ?>
                                                    
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
                    <h5 class="modal-title" id="exampleModalLabel">Mantenimiento de equipos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="<?php echo constant('URL'); ?>user/mantenimiento" method="POST">
                                




                                    <div class="row justify-content-center">
                                        <div class="form-group  col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                                </div>

                                                <select class="form-control" id="exampleFormControlSelect1" name="equipcomp">
                                                    <option selected disabled>Seleccione el equipo con fallas</option>

                                                    <?php foreach ($this->equipmentComputer as $equipmentComputer) : ?>
                                                        <option value=" <?php echo $equipmentComputer['id_equipcomp'] ?>"><?php echo $equipmentComputer['name_equipmenttype']." ".$equipmentComputer['marca_equipcomp']." ".$equipmentComputer['model_equipcomp']." ".$equipmentComputer['color_equipcomp'] ;?></option>
                                                    <?php endforeach; ?>


                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center">
                                    <div class="form-group  col-md-12">
                                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" placeholder="Describa en detalle la falla del equipo"></textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group ">
                                            <button type="submit" name="mante" class="btn btn-corsetti btn-lg btn-block">Enviar</button>
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