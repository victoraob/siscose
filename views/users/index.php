<?php $titulo = "INICIO | USUARIO";
include_once "views/users/header.php"; ?>





<div class="container mt-5">
   <div class="row ">


      <div class="col-md-3 margin_bottom_30">
         <div class="dash_blog" style="min-height: 0px;">
            <div class="dash_blog_inner">
               <div class="dash_head">
                  <h3><span><i class="fa fa-desktop"></i> Equipos</span><span class="plus_green_bt"><a href="<?php echo constant('URL'); ?>user/equipos"><i class="fa fa-share"></i></a></span></h3>
               </div>
            </div>
         </div>
      </div>



      <div class="col-md-3 margin_bottom_30">
         <div class="dash_blog" style="min-height: 0px;">
            <div class="dash_blog_inner">
               <div class="dash_head">
                  <h3><span><i class="fa fa-spinner"></i> Solicitudes </span><span class="plus_green_bt"><a href="<?php echo constant('URL'); ?>user/solicitudes"><i class="fa fa-share"></i></a></span></h3>
               </div>
            </div>
         </div>
      </div>

   </div>
   <div class="row">
      <div class="col-md-6 margin_bottom_30">
         <div class="dash_blog" style="min-height: 0px;">
            <div class="dash_blog_inner">
               <div class="dash_head">
                  <h3><span><i class="fa fa-wrench"></i> Mantenimiento de Equipos</span><span class="plus_green_bt"><a href="<?php echo constant('URL'); ?>user/mantenimiento"><i class="fa fa-share"></i></a></span></h3>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>






<!-- The Modal -->
<div class="modal fade" id="myModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-body">

            <h1 class="text-secondary text-left">Bienvenido <span class="text-info"><strong><?php echo ucfirst($_SESSION['usuario'][0]['name']);?>,</strong></span> </h1>
            <h4 class="text-secondary">al departamento de <?php echo ucfirst($_SESSION['usuario'][0]['name_dep']);?> <i class="fa fa-rocket"></i></h4>
            <h6 class="text-dark mt-2 text-left">Desde aqui podras realizar solicitudes de equipos para tu departamento, ver que equipos tienes asignados, incluso enviar tus equipos tecnologicos a mantenimiento, empieza ahora mismo!</h6>

         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-info" data-dismiss="modal">Entendido <i class="fa fa-check"></i></button>
         </div>
      </div>
   </div>
</div>
<!-- end model popup -->




<?php include_once "views/users/footer.php"; ?>