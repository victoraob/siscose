<?php $titulo = "Detalles | " . $this->equipDetails[0]['name_equipmenttype'] . " " . $this->equipDetails[0]['model_equipcomp'] . " " . $this->equipDetails[0]['marca_equipcomp'];
include_once "views/dashboard/header.php"; ?>


<?php $no = 1;
foreach ($this->equipDetails as $equipDetails) : ?>



    <div class="container">

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


        <div class="row bg-light py-5" style="background-color: white !important;box-shadow: 0px 1px 12px 1px #0000003d;">
            <div class="col-md-3 my-auto">
                <img width="180" class="rounded" src="<?php echo constant('URL'); ?>public/images/equipment.png" alt="#">
            </div>

            <div class="col-md-6 my-auto">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">


                            <li>
                                <h4 class="text-dark"><i class="fa fa-desktop"></i> Equipo: <small><?php echo $equipDetails['name_equipmenttype']; ?></small> </h4>
                            </li>

                            <li>
                                <h4 class="text-dark"><i class="fa fa-barcode"></i> Codigo: <small><?php echo $equipDetails['code_equipcomp']; ?></small> </h4>
                            </li>


                            <li>
                                <h4 class="text-dark"><i class="fa fa-bookmark"></i> Modelo: <small><?php echo $equipDetails['model_equipcomp']; ?></small> </h4>
                            </li>

                            <li>
                                <h4 class="text-dark"><i class="fa fa-tag"></i> Marca: <small><?php echo $equipDetails['marca_equipcomp']; ?></small> </h4>
                            </li>

                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="list-unstyled">

                            <li>
                                <h4 class="text-dark"><i class="fa fa-cloud"></i> Departamento: <small><?php echo $equipDetails['name_dep']; ?></small> </h4>
                            </li>

                            <li>
                                <h4 class="text-dark"><i class="fa fa-exclamation-circle"></i> Estado: <small><?php echo $equipDetails['name_statusequip']; ?></small> </h4>

                            </li>

                            <!-- <li>
                                <h4 class="text-dark"><i class="fa fa-dollar-sign"></i> Precio: <small><?php echo $equipDetails['precio_equipcomp']; ?>$</small> </h4>
                            </li> -->

                            <li>
                                <h4 class="text-dark"><i class="fa fa-palette"></i> Color: <small><?php echo $equipDetails['color_equipcomp']; ?></small> </h4>
                            </li>



                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-auto">
                <img width="180" class="rounded" src="<?php echo constant('URL') . "public/images/qrcodes/" . $equipDetails['qrcode_equipcomp']; ?>" alt="#">
            </div>
        </div>






    </div> <!-- fin de container  -->




<?php #var_dump($_SESSION);?>



    <div class="container-fluid mt-5">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Opciones | Configuración</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row bg-light py-5" style="background-color: white !important;box-shadow: 0px 1px 12px 1px #0000003d;">

            

            <!-- <div class="col-md-3">
                <div class="row justify-content-center">
                <div class="col-md-11 pt-4 pb-2 btnconf" data-toggle="modal" data-target="#changeStatus">
                        <h4 class="text-center text-btnconf">
                            <i class="fas fa-toggle-on"></i> Cambiar estado
                        </h4>
                    </div>
                </div>
            </div> -->

<?php if ($equipDetails["status_equipcomp"] == 2) : ?>
    <div class="col-md-3">
                <div class="row justify-content-center">
                    <div class="col-md-11 pt-4 pb-2 btnconf disabled" >
                        <h4 class="text-center text-btnconf disabled">
                        <i class="fas fa-chart-line"></i> Equipo dañado
                        </h4>
                    </div>
                </div>
            </div>
<?php else: ?> 
    <div class="col-md-3">
                <div class="row justify-content-center">
                    <div class="col-md-11 pt-4 pb-2 btnconf" data-toggle="modal" data-target="#asignEquipment">
                        <h4 class="text-center text-btnconf">
                        <i class="fas fa-chart-line"></i> Asignar Equipo
                        </h4>
                    </div>
                </div>
            </div>
<?php endif; ?> 

            

            <div class="col-md-3">
                <div class="row justify-content-center">
                <div class="col-md-11 pt-4 pb-2 btnconf">
                    <a href="<?php echo constant('URL')."admin/reportEquipDetails/".$equipDetails['id_equipcomp'];?>" target="blank">
                        <h4 class="text-center text-btnconf">
                           <i class="fas fa-file-pdf"></i> Descargar Información
                        </h4>
                    </a>
                       
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="row justify-content-center">
                

                <div class="col-md-11 pt-4 pb-2 btnconf">
                <a href="<?php echo constant('URL') . "public/images/qrcodes/" . $equipDetails['qrcode_equipcomp']; ?>"download="<?php echo"CODIGO-QR-". $equipDetails['qrcode_equipcomp']; ?>">
                        <h4 class="text-center text-btnconf">
                        <i class="fas fa-qrcode"></i> Descargar QR
                      </h4>
                    </div></a>
                </div>
                
            </div>

        </div>
    </div>




<?php endforeach; ?>






<style>
    .btnconf {
        transition: all .5s;
        background-color: #15283c;
        border-radius: 20px;
        box-shadow: 0px 0px 5px 0px #00000054;
       
    }

    .btnconf:hover {
        transition: all .5s;
        background-color: #ededed;
        border-radius: 20px;
        box-shadow: 0px 0px 5px 0px #00000054;
        cursor: pointer;
        color: white !important;
    }

    .text-btnconf{
        color: white !important;
    }.text-btnconf:hover{
        color: #15283c !important;
    }

</style>







    <!-- Modal 
    <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Estado del Equipo<br> <small> (Ej. activo, dañado, mantemiento...)</small></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="<?php echo constant('URL'); ?>admin/inventario" method="POST">

                            <div class="row justify-content-center">
                                    <div class="form-group  col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                            </div>

                                            <select class="form-control" id="exampleFormControlSelect1" name="type_equipcomp">
                                                <option selected disabled>
                                                    <?php  
                                                    echo strtoupper($this->equipDetails[0]['name_statusequip']);?>
                                                </option>

                                                <?php foreach ($this->StatusEquipment as $StatusEquipment) : ?>
                                                    <option value=" <?php echo $StatusEquipment['id_statusequip'] ?>"><?php echo strtoupper($StatusEquipment['name_statusequip']);?></option>
                                                <?php endforeach; ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center">

                                    <div class="form-group col-md-6">
                                        <div class="form-group ">
                                            <button type="submit" name="addForm" value="newtype" class="btn btn-corsetti btn-lg btn-block">Cambiar <i class="fas fa-location-arrow"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

     <!-- Modal -->
     <div class="modal fade" id="asignEquipment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asigne el Equipo a algun departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="<?php echo constant('URL'); ?>admin/setDepartament" method="POST">

                            <div class="row justify-content-center">
                                    <div class="form-group  col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-chart-line"></i></span>
                                            </div>

                                            <select class="form-control" id="exampleFormControlSelect1" name="dep">
                                                <option selected disabled>
                                                    <?php  
                                                    echo strtoupper($this->equipDetails[0]['name_dep']);?>
                                                </option>

                                                <?php foreach($this->departaments as $departaments):?>
                                                    <option value=" <?php echo $departaments['id_dep'] ?>"><?php echo strtoupper($departaments['name_dep']);?></option>
                                                <?php endforeach; ?>
<input type="hidden" name="id" value="<?php echo $this->equipDetails[0]['id_equipcomp'];?>">

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="form-group col-md-6">
                                        <div class="form-group ">
                                            <button type="submit" name="asig" value="asig" class="btn btn-corsetti btn-lg btn-block">Asignar <i class="fas fa-chart-line"></i></button>
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