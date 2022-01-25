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
   <title><?php echo $titulo;?></title>
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

   <script src="<?php echo constant('URL') ?>public/fontawesome/all.js"></script>

   <!--[if lt IE 9]>
      <script src="<?php echo constant('URL') ?>public/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="<?php echo constant('URL') ?>public/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar_blog_1">
            <div class="sidebar-header">
                  <div class="logo_section">
                     <a href="#"><img class="logo_icon img-responsive" src="<?php echo constant('URL') ?>public/images/user.png" alt="#" /></a>
                  </div>
               </div>
               <div class="sidebar_user_info">
                  <div class="icon_setting"></div>
                  <div class="user_profle_side">
                  <div class="user_img">
                     <img class="img-responsive" src="<?php echo constant('URL') ?>public/images/user.png" alt="#" />
                  </div>

                     <div class="user_info">
                        <h6><?php echo ucfirst($_SESSION['usuario'][0]['name_rols']);?></h6>
                        <p><span class="online_animation"></span> Online</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sidebar_blog_2">
               <h4>General</h4>
               <ul class="list-unstyled components">
               <li><a href="<?php echo constant('URL') ?>tech"><i class="fa fa-home blue_color"></i> <span> &nbsp;Inicio</span></a></li>
                  
               <li><a href="<?php echo constant('URL') ?>tech/asignations"><i class="fa fa-spinner"></i> <span> &nbsp;Asignaciones</span></a></li>
               </ul>
            </div>
         </nav>
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <div class="topbar">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <div class="full">
                     <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                     <div class="logo_section">
                        <!-- <a href="<?php echo constant('URL') ?>public/index.html"><img class="img-responsive" src="<?php echo constant('URL') ?>public/images/logo/logo.png" alt="#" /></a> -->
                     </div>
                     <div class="right_topbar">
                        <div class="icon_info">

                           <ul class="user_profile_dd">
                              <li>
                                 <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="<?php echo constant('URL') ?>public/images/user.png" alt="#" /><span class="name_user"><?php echo $_SESSION['usuario'][0]['name'];?></span></a>
                                 <div class="dropdown-menu">
                                    
                                 <a class="dropdown-item" href="<?php echo constant('URL') ?>home/logout"><span>Salir</span> <i class="fa fa-sign-out-alt"></i></a>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <!-- HEADER -->
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2><?php echo $titulo;?></h2>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- HEADER -->
               <!-- MAQUETAR AQUI ABAJO -->
