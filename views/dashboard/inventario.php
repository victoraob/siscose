<?php $titulo = "DASHBOARD | INVENTARIO DE EQUIPOS";
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
                            Listado |

                            <button type="button" class="btn cur-p btn-primary" data-toggle="modal" data-target="#newequip"> <i class="fa fa-desktop blue_color"></i> Nuevo Equipo</button> |

                            <button type="button" class="btn cur-p btn-info" data-toggle="modal" data-target="#newtype"> <i class="fa fa-boxes blue_color"></i> Nuevo tipo</button>|

                            <a href="<?php echo constant('URL'); ?>admin/reportInventario" class="btn cur-p btn-danger" target="blank"> <i class="fas fa-file-pdf"></i> Generar Reporte</a>

                        </h2>
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
                                            <th>CODIGO</th>
                                            <th>EQUIPO</th>
                                            <th>MODELO</th>
                                            <th>MARCA</th>
                                            <th>DEPARTAMENTO</th>
                                            <th>ESTADO</th>
                                            <th>VER</th>
                                            <th>OPCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1;
                                        foreach ($this->equipmentComputer as $equipmentComputer) : ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $equipmentComputer['code_equipcomp']; ?></td>
                                                <td><?php echo $equipmentComputer['name_equipmenttype']; ?></td>
                                                <td><?php echo $equipmentComputer['model_equipcomp']; ?></td>
                                                <td><?php echo $equipmentComputer['marca_equipcomp']; ?></td>
                                                <td><?php echo $equipmentComputer['name_dep']; ?></td>
                                                <td>

                                                
    <?php

if ($equipmentComputer["id_statusequip"] == 1) {
    echo "<button class='btn btn-outline-success'>" .
        $equipmentComputer['name_statusequip'] . " <i class='fa fa-check-circle'></i></button>";
}
if ($equipmentComputer["id_statusequip"] == 2) {
    echo "<button class='btn btn-outline-danger'>" .
        $equipmentComputer['name_statusequip'] . " <i class='fa fa-clock'></i></button>";
}
if ($equipmentComputer["id_statusequip"] == 3) {
    echo "<button class='btn btn-outline-warning'>" .
        $equipmentComputer['name_statusequip'] . " <i class='fa fa-clock'></i></button>";
}

?>

                                                </td>

                                                <td><a href="<?php echo constant('URL') . "admin/idetails/" . $equipmentComputer['id_equipcomp']; ?>" class="btn cur-p btn-outline-success">Detalles <i class="fa fa-newspaper"></i></a></td>

                                                <td><a href="<?php echo constant('URL') . "admin/editarequipo/" . $equipmentComputer['id_equipcomp']; ?>" class="btn cur-p btn-warning">Editar <i class="fa fa-newspaper"></i></a></td>


                                            <tr>
                                            <?php endforeach; ?>


                                            <?php if (empty($this->equipmentComputer)) : ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-info" role="alert">
                                                            <h4 class="text-center text-info">No hay equipos registrados</h4>
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





































    <!-- Modal -->
    <div class="modal fade" id="newtype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Tipo de Equipos <br> <small> (Ej. monitor, cpu, laptop, mouse, teclado, impresora)</small></h5>
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
                                                <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nombre" name="name_equipmenttype">
                                        </div>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <div class="form-group ">
                                            <button type="submit" name="addForm" value="newtype" class="btn btn-corsetti btn-lg btn-block">agregar <i class="fas fa-location-arrow"></i></button>
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
    <div class="modal fade" id="newequip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Equipos <br> <small> (especifica los detalles)</small></h5>
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
                                                <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                            </div>

                                            <select class="form-control" id="exampleFormControlSelect1" name="type_equipcomp">
                                                <option selected disabled>Equipo</option>

                                                <?php foreach ($this->equipmentType as $equipmentType) : ?>
                                                    <option value=" <?php echo $equipmentType['id_equipmenttype'] ?>"><?php echo $equipmentType['name_equipmenttype'] ?></option>
                                                <?php endforeach; ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Codigo" name="code_equipcomp">
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-bookmark"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Modelo" name="model_equipcomp">
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Marca" name="marca_equipcomp">
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-palette"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Color" name="color_equipcomp">
                                        </div>
                                    </div>


                                </div>


                                <!-- <div class="row justify-content-start">
                                <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Precio" name="precio_equipcomp">
                                        </div>
                                    </div>
                                </div> -->







                                <div class="row justify-content-center">
                                    <div class="form-group col-md-6">
                                        <div class="form-group ">
                                            <button type="submit" name="addForm" value="newequip" class="btn btn-corsetti btn-lg btn-block">agregar <i class="fas fa-location-arrow"></i></button>
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