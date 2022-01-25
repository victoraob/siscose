<?php $titulo = "SOLICITUDES DE EQUIPOS";
include_once "views/dashboard/header.php"; ?>

<div class="container-fluid">
    <!-- row -->
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Listado | </h2>
                        <?php if (isset($this->mensajeerror)) { ?>
                            <div class="alert  <?php echo $this->claseStyle; ?>" role="alert">
                                <?php echo $this->mensajeerror; ?>
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
                                            <th>Tecnico</th>
                                            <th>Progreso</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1;
                                        foreach ($this->solicitudes as $solicitud) { ?>


                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>
                                                    <a><?php echo $solicitud["code_desk"] . " - " . $solicitud["name_desk"]; ?></a>
                                                </td>
                                                <td>
                                                    <p><?php echo $solicitud["create_desk"]; ?></p>
                                                </td>


<td>
    <form action="<?php echo constant('URL');?>admin/techOfDesk" method="POST">
                                                
        <input type="hidden" name="desk" value="<?php echo $solicitud["id_desk"];?>">
<div class="form-group col-md-12">
    <div class="input-group">
      <select class="form-control" id="exampleFormControlSelect1" name="tecnico">
      <option value="" selected disabled> <?php if ($solicitud["tecnico_desk"] == NULL) {echo "NO ASIGNADO";} else {echo "ASIGNADO";} ?></option>
       
      <?php foreach ($this->tecnicos as $tech) { ?>
        <option value="<?php echo $tech['id_user'] ?>">
        <?php echo $tech['name'] . " " . $tech['lastname'] ?></option><?php } ?>
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
                                                        <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $solicitud["progress_desk"]; ?>%;"></div>
                                                    </div>
                                                    <small>Progreso de Solicitud <?php echo $solicitud["progress_desk"]; ?>% </small>
                                                </td>
                                                <td>
                                                    <a href="<?php echo constant('URL'); ?>user/progressdetails/<?php echo $solicitud["id_desk"]; ?>" class="btn btn-success btn-xs">Detalles</a>
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



    <?php include_once "views/dashboard/footer.php"; ?>