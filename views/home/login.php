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
   <title>SISCOSE | LOGIN</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="<?php echo constant('URL') ?>public/images/fevicon.png" type="image/png" />
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
   <!-- calendar file css -->
   <link rel="stylesheet" href="<?php echo constant('URL') ?>public/js/semantic.min.css" />
   <!--[if lt IE 9]>
      <script src="<?php echo constant('URL') ?>public/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="<?php echo constant('URL') ?>public/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="inner_page login">
   
   <div class="full_container">
      <div class="container">
         <div class="center verticle_center full_height">
            <div class="login_section">
               <!-- <div class="logo_login">
                     <div class="center">
                        
                        <h2 class="text-center text-white" style="line-height: 40px;">SISCOSE</h2>
                        </div>
                        <div class="center">
                        <h5 class="text-center text-white" style="line-height: auto; margin-top:-5px;">Sistema de Informacion para el Registro, Control y Seguimiento <br> de los Bienes Informáticos del Consejo del Municipio Zamora - Villa de Cura - Edo. Aragua</h5>
                        </div>
                  </div> -->
               <div class="login_form" style="padding:100px 50px;">

                  <div class="row justify-content-center mb-5">
                     <div class="col-md-4">
                        <p class="text-center">
                           <img src="<?php echo constant('URL'); ?>public/images/logoconcejo.jpg" class="rounded img-fluid" alt="">
                        </p>
                     </div>

                     <div class="col-md-8 my-auto">
                     <h2 class="text-center text-danger">SISCOSE</h2>
                       
                        <h6 class="text-center text-dark mt-3" >Sistema de Informacion para el Registro, Control y Seguimiento  de los Bienes Informáticos del Consejo del Municipio Zamora - Villa de Cura - Edo. Aragua</h6>
                     </div>
                  </div>


<hr>

                  <form action="<?php echo constant('URL') ?>home/render" method="POST">
                     <?php if (isset($this->mensajeerror)) { ?>
                        <div class="alert alert-danger" role="alert">
                           <?php echo $this->mensajeerror; ?>
                        </div>
                     <?php } ?>
                     <fieldset>
                        <div class="field">
                           <label class="label_field">Usuario</label>
                           <input type="email" name="email" placeholder="example@ex.com" />
                        </div>
                        <div class="field">
                           <label class="label_field">Contraseña</label>
                           <input type="password" name="password" placeholder="***********" />
                        </div>

                        <!-- <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="<?php echo constant('URL') ?>public/">Forgotten Password?</a>
                           </div> -->
                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt" type="submit" name="iniciosesion">Entrar! </button>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="<?php echo constant('URL') ?>public/js/jquery.min.js"></script>
   <script src="<?php echo constant('URL') ?>public/js/popper.min.js"></script>
   <script src="<?php echo constant('URL') ?>public/js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="<?php echo constant('URL') ?>public/js/animate.js"></script>
   <!-- select country -->
   <script src="<?php echo constant('URL') ?>public/js/bootstrap-select.js"></script>
   <!-- nice scrollbar -->
   <script src="<?php echo constant('URL') ?>public/js/perfect-scrollbar.min.js"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="<?php echo constant('URL') ?>public/js/custom.js"></script>
</body>

</html>