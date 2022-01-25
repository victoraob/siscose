<?php $titulo = "DASHBOARD | EQUIPOS ASIGNADOS";
include_once "views/users/header.php"; ?>




<div class="container-fluid">


    <!-- row -->
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>
                            Listado

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
                                            <th>CODIGO</th>
                                            <th>EQUIPO</th>
                                            <th>MODELO</th>
                                            <th>MARCA</th>
                                            <th>DEPARTAMENTO</th>
                                            <th>ESTADO</th>
                                            <th>QR</th>

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
                                                <td><?php echo $equipmentComputer['name_statusequip']; ?></td>

                                                <td>
                                                    <img width="80" class="rounded" src="<?php echo constant('URL') . "public/images/qrcodes/" . $equipmentComputer['qrcode_equipcomp']; ?>" alt="#">
                                                </td>

                                                <!-- <td><a href="<?php echo constant('URL') . "admin/idetails/" . $equipmentComputer['id_equipcomp']; ?>" class="btn cur-p btn-outline-success">Detalles <i class="fa fa-newspaper"></i></a></td> -->
                                            <tr>
                                            <?php endforeach; ?>









                                            <?php if (empty($this->equipmentComputer)) : ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-info" role="alert">
                                                            <h4 class="text-center text-info">No hay equipos asignados</h4>
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









































    <?php include_once "views/users/footer.php"; ?>