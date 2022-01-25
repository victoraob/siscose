<?php $titulo = "DETALLE SOLICITUD";
include_once "views/users/header.php"; ?>




<div class="container">
    <div class="row">

        <!-- invoice section -->
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2><i class="fa fa-file"></i> Detalles</h2>
                        <!-- <?php echo "<pre>";var_dump($this->details); echo "</pre>";?>
                        <?php echo "<pre>";var_dump($this->tecnico); echo "</pre>";?> -->
                    </div>
                </div>
                <div class="full">
                    <div class="invoice_inner">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                    <h4>USUARIO</h4>
                                    <p><strong> <?php echo $this->details[0]['name']." ".$this->details[0]['lastname'];?></strong><br>
                                    <?php echo $this->details[0]["name_dep"];?><br>
                                        <strong>Phone : </strong><a href="tel:9876543210"> <?php echo $this->details[0]["phone"];?></a><br>
                                        <strong>Email : </strong><a href="mailto: <?php echo $this->details[0]["email"];?>"> <?php echo $this->details[0]["email"];?></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                    <h4>TECNICO</h4>
                                    <p><strong>Fabiana Herrera</strong><br>
                                        Departamento de RRHH<br>
                                        <strong>Phone : </strong><a href="tel:9876543210">123456789</a><br>
                                        <strong>Email : </strong><a href="mailto:yourmail@gmail.com">Fabiana@gmail.com</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                    <h4>Proceso N° - #<?php echo $this->details[0]['code_desk'];?> </h4>
                                    <p>
                                        <strong>Fecha: </strong> <?php echo $this->details[0]["create_desk"];?><br>
                                        <strong>SISCOSE : </strong>&copy; 2022
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="full padding_infor_info">
                    <div class="table_row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Product One</td>
                                        <td>005-475-321</td>
                                        <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                        <td>$20.00</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Product Two</td>
                                        <td>015-475-321</td>
                                        <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                        <td>$25.00</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Product Three</td>
                                        <td>025-475-321</td>
                                        <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                        <td>$20.00</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Product Four</td>
                                        <td>035-475-321</td>
                                        <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                        <td>$15.00</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Product Five</td>
                                        <td>045-475-321</td>
                                        <td>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                        <td>$25.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>



<?php include_once "views/users/footer.php"; ?>