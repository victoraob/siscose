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



















<div class="container-fluid">
   

    <!-- row -->
    <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>
                        REPORTE | EQUIPOS EN INVENTARIO

                            

                        </h2>
                        <?php if (isset($this->mensajeerror)) { ?>
                            <div class="alert  <?php echo $this->claseStyle; ?>" role="alert">
                                <?php echo $this->mensajeerror; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="full price_table padding_infor_info text-dark">
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
                                                <td><button class="btn btn-dark"><?php echo $equipmentComputer['name_statusequip']; ?></button></td>
                                                
                                            <tr>
                                                
                                            <?php endforeach; ?>










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