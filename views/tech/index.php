<?php $titulo = "DASHBOARD | TECNICO";
include_once "views/tech/header.php"; ?>



<div class="container">
    <div class="row column4 graph">
        <div class="col-md-4 margin_bottom_30">
            <div class="dash_blog" style="min-height: 0px;">
                <div class="dash_blog_inner">
                    <div class="dash_head">
                        <h3><span><i class="fa fa-spinner"></i> Asignaciones </span><span class="plus_green_bt"><a href="<?php echo constant('URL'); ?>tech/asignations"><i class="fa fa-share"></i></a></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "views/tech/footer.php"; ?>