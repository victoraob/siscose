<?php $titulo = "DASHBOARD | SOLICITUDES";
include_once "views/dashboard/header.php"; ?>


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
                            Solicitudes Pendientes <span class="badge badge-info rounded-circle">
                      <?php echo $this->SolicitudesPending[0]["COUNT(request_equipment.id_request)"];?> 
                  </span> 
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
                                            <th><i class="fas fa-toggle-on"></i> CAMBIAR ESTADO</th>
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

                                                <td>
                                                    <form action=" <?php echo constant('URL');?>admin/solicitudes" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $solicitudes['id_request']; ?>">
<div class="input-group">
<select class="form-control" name="statusreques" required>
  <option selected>Seleccionar estado</option>
  <?php foreach($this->StatusRequest as $StatusRequest): ?>
  <option value="<?php echo $StatusRequest['id_statusreques']; ?>">
    <?php echo $StatusRequest['name_statusreques'];?></option>
  <?php endforeach;?>
</select>
  <button class="btn btn-outline-info" type="submit"> <i class='fa fa-sync-alt'></i></button>
</div>
                                                   </form>
                                                </td>

                                               

                                               
                                            <tr>
                                            <?php endforeach; ?>




                                            <?php if (empty($this->solicitudes)) : ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-info" role="alert">
                                                            <h4 class="text-center text-info">No hay Solicitudes existentes</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>






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