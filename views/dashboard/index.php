<?php $titulo = "DASHBOARD";
include_once "views/dashboard/header.php"; ?>



<div class="container">
   <div class="row column4 graph">

      <div class="col-md-4 margin_bottom_30">
         <div class="dash_blog" style="min-height: 0px;">
            <div class="dash_blog_inner">
               <div class="dash_head">
                  <h3><span><i class="fa fa-user"></i> USUARIOS </span><span class="plus_green_bt"><a href="<?php echo constant('URL'); ?>admin/users"><i class="fa fa-share"></i></a></span></h3>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-4 margin_bottom_30">
         <div class="dash_blog" style="min-height: 0px;">
            <div class="dash_blog_inner">
               <div class="dash_head">
                  <h3><span><i class="fa fa-desktop"></i> INVENTARIO</span><span class="plus_green_bt"><a href="<?php echo constant('URL'); ?>admin/inventario"><i class="fa fa-share"></i></a></span></h3>
               </div>
            </div>
         </div>
      </div>

   </div>


   <div class="row">
   <div class="col-md-4 margin_bottom_30">
         <div class="dash_blog" style="min-height: 0px;">
            <div class="dash_blog_inner">
               <div class="dash_head">
                  <h3><span><i class="fa fa-envelope"></i> SOLICITUDES 

                  <span class="badge badge-info rounded-circle">
                      <?php echo $this->SolicitudesPending[0]["COUNT(request_equipment.id_request)"];?> 
                  </span> 
               
               </span><span class="plus_green_bt"><a href="<?php echo constant('URL'); ?>admin/solicitudes"><i class="fa fa-share"></i></a></span></h3>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-4 margin_bottom_30">
         <div class="dash_blog" style="min-height: 0px;">
            <div class="dash_blog_inner">
               <div class="dash_head">
                  <h3><span><i class="fa fa-wrench"></i> MANTENIMIENTOS</span><span class="plus_green_bt"><a href="<?php echo constant('URL'); ?>admin/mantenimiento"><i class="fa fa-share"></i></a></span></h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<?php include_once "views/dashboard/footer.php"; ?>