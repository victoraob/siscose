<?php $titulo = "ASIGNACIONES DE TRABAJO";
include_once "views/tech/header.php"; ?>


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
                        <h2>Listado | </h2>
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
                                            <th style="width: 20%">Solicitud</th>
                                            <th>Fecha de Solicitud</th>
                                            <th>Marcar Progreso</th>
                                            <th>Progreso</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1;
                                        foreach ($this->asignaciones as $solicitud) { ?>


                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>
                                                    <a><?php echo $solicitud["name_equipmenttype"] . " - " . $solicitud["marca_equipcomp"]; ?></a>
                                                    <small><br>
                                                    <?php echo $solicitud["descri_maintenance"]; ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <p><?php echo $solicitud["date_asignation"]; ?></p>
                                                </td>

                                               
<?php if ($solicitud["status_equipcomp"] == 2) : ?>
               <td><button type="button" class="btn btn-danger">Equipo Dañado</button></td> 
               <td><button type="button" class="btn btn-danger">Equipo Dañado</button></td> 
<?php else: ?>                               

<td>
    <form action="<?php echo constant('URL');?>tech/asigprogress" method="POST">
                                                
        <input type="hidden" name="maintenance" value="<?php echo $solicitud["id_maintenance"];?>">
   <div class="form-group col-md-12">
    <div class="input-group">
      <select class="form-control" id="exampleFormControlSelect1" name="progress_maintenance">

      <option selected disabled><?php echo $solicitud["progress_maintenance"]; ?>%</option>

      <option value="10">10%</option>
      <option value="20">20%</option>
      <option value="30">30%</option>
      <option value="40">40%</option>
      <option value="50">50%</option>
      <option value="60">60%</option>
      <option value="70">70%</option>
      <option value="80">80%</option>
      <option value="90">90%</option>
      <option value="100">100%</option>
       
     
     </select>
     <div class="input-group-prepend">
        <button type="submit" class="btn btn-primary" name="settec"><i class="fas fa-check"></i></button>
      </div>
    </div>
  </div>
   </form>
</td>
    
<td class="project_progress">
                                                    <div class="progress progress_sm">
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $solicitud["progress_maintenance"]; ?>%;"></div>
                                                    </div>
                                                    <small>Progreso de Solicitud <?php echo $solicitud["progress_maintenance"]; ?>% </small>
</td>

<?php endif; ?>

 
                                                


<td>
                                                    <a href="<?php echo constant('URL'); ?>tech/asigdetails/<?php echo $solicitud["id_maintenance"]; ?>" class="btn btn-success btn-xs">Detalles</a>
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




<?php include_once "views/tech/footer.php"; ?>