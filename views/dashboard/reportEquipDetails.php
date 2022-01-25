<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>REPORTE | INVENTARIO</title>
   <!-- site icon -->
  
   <!-- bootstrap css -->
   <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/bootstrap.min.css" />
   <!-- site css -->
   <link rel="stylesheet" href="<?php echo constant('URL') ?>public/style.css" />
   <!-- responsive css -->
   <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/responsive.css" />
   <!-- color css -->
   <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/colors.css" />
   <!-- select bootstrap -->
   <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/bootstrap-select.css" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/perfect-scrollbar.css" />
   <!-- custom css -->
   <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/custom.css" />

   <script src="<?php echo constant('URL') ?>public/fontawesome/all.js"></script>

 
</head>
















<?php $titulo = "Detalles | " . $this->equipDetails[0]['name_equipmenttype'] . " " . $this->equipDetails[0]['model_equipcomp'] . " " . $this->equipDetails[0]['marca_equipcomp'];

?>





<div class="container mt-5">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2> <img width="30" class="rounded" src="<?php echo constant('URL'); ?>public/images/equipment.png" alt="#"> Reporte | <?php echo $titulo ;?></h2>
                </div>
            </div>
        </div>
    </div>


<?php $no = 1;
foreach ($this->equipDetails as $equipDetails) : ?>



    <div class="container">


        <div class="row bg-light py-5" style="background-color: white !important;box-shadow: 0px 1px 12px 1px #0000003d;">
           

            <div class="col-md-3 my-auto">
                <img width="180" class="rounded" src="<?php echo constant('URL') . "public/images/qrcodes/" . $equipDetails['qrcode_equipcomp']; ?>" alt="#">
            </div>
        <div class="col-md-8 my-auto">
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

                            <li>
                                <h4 class="text-dark"><i class="fa fa-dollar-sign"></i> Precio: <small><?php echo $equipDetails['precio_equipcomp']; ?>$</small> </h4>
                            </li>

                            <li>
                                <h4 class="text-dark"><i class="fa fa-palette"></i> Color: <small><?php echo $equipDetails['color_equipcomp']; ?></small> </h4>
                            </li>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
            

           
      






    </div> <!-- fin de container  -->





    <?php endforeach; ?>




    








































 <!-- jQuery -->
 <script src="<?php echo constant('URL') ?>public/js/jquery.min.js"></script>
      <script src="<?php echo constant('URL') ?>public/js/popper.min.js"></script>
      <script src="<?php echo constant('URL') ?>public/js/bootstrap.min.js"></script>
      
      <script>
	setTimeout(() => {
		window.print()
		window.close()
	},500)
</script>
</body>

</html>