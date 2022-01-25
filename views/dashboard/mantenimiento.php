<?php $titulo = "DASHBOARD | MANTENIMIENTO DE EQUIPOS";
include_once "views/dashboard/header.php"; ?>



<div class="container-fluid">

<?php if (isset($_GET['success']) and !empty($_GET['success'])) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error']) and !empty($_GET['error'])) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    <?php echo $_GET['error']; ?>
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
                        <h2>Equipos para mantenimiento </h2>
                        
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
                                            <th >Equipo</th>
                                            <!-- <th>Fecha de Envio</th> -->
                                            <th>Progreso</th>
                                            <th>Estado</th>
                                            <th>Tecnico</th>
                                            <th>Detalles</th>
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
                                               



                                                <td>
                                                <?php 
                                                
if ($mainEquipment["id_statusequip"] == 1) {
    echo "<button class='btn btn-outline-success'>".
    $mainEquipment['name_statusequip']." <i class='fa check-circle'></i></button>";

}if ($mainEquipment["id_statusequip"] == 2) {
    echo "<button class='btn btn-outline-danger'>".
    $mainEquipment['name_statusequip']." <i class='fa fa-clock'></i></button>";

}if ($mainEquipment["id_statusequip"] == 3) {
    echo "<button class='btn btn-outline-info'>".
    $mainEquipment['name_statusequip']." <i class='fa fa-clock'></i></button>";
}

                                                ?>
                                                    
                                                </td>

<?php if ($mainEquipment['tecnico_maintenance'] == NULL):?>

<td>
<form action=" <?php echo constant('URL');?>admin/addtech" method="POST">
<input type="hidden" name="maintenance" value="<?php echo $mainEquipment['id_maintenance']; ?>">

<div class="input-group">
<select class="form-control" name="tecnico" required>
  <option selected>Asignar Tecnico</option>
  <?php foreach($this->TechAll as $TechAll): ?>
  <option value="<?php echo $TechAll['id_user']; ?>"> Tecnico 
    <?php echo $TechAll['name']." ".$TechAll['lastname'];?></option>
  <?php endforeach;?>
</select>
  <button class="btn btn-outline-info" type="submit" name="send"> <i class='fa fa-sync-alt'></i></button>
</div>
</form>
</td>
<td>NO DISPONIBLE</td>


<?php else:?> 
    <td>Tecnico Asignado</td> 
    
    <td>
<a href="<?php echo constant('URL'); ?>admin/maindetails/<?php echo $mainEquipment["id_maintenance"]; ?>" class="btn btn-success btn-xs">ver mas</a>
</td>

<?php endif;?>


                                               
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




<?php include_once "views/dashboard/footer.php"; ?>