<?php $titulo = "DETALLES MANTENIMIENTO";
include_once "views/dashboard/header.php"; ?>



<div class="container">
    <div class="row py-5" style="background-color: #e7e7e7;">
        <div class="col-md-4">
            <h3 class="text-info">Descripcion Equipo: </h3>
            <ul>
            <li><h5 class="text-secondary"><strong>Equipo: </strong><?php echo $this->equipmentData[0]["name_equipmenttype"]." ".$this->equipmentData[0]["marca_equipcomp"]." ".$this->equipmentData[0]["model_equipcomp"]." ";?></h5></li>

            <li><h5 class="text-secondary"><strong>Color: </strong><?php echo $this->equipmentData[0]["color_equipcomp"];?></h5></li>

            <li><h5 class="text-secondary"><strong>Estado: </strong><?php echo $this->equipmentData[0]["name_statusequip"];?></h5></li>

            <li><h5 class="text-secondary"><strong>Departamento: </strong><?php echo $this->equipmentData[0]["name_dep"];?></h5></li>

            <li><h5 class="text-secondary"><strong>Tecnico: </strong><?php echo $this->tecnicoData[0]["name"]." ".$this->tecnicoData[0]["lastname"];?></h5></li>

            </ul>
        </div>
    
        <div class="col-md-5 my-auto">
            <ul>
            <li><h5 class="text-secondary"><strong>Descripcion de falla: </strong><?php echo $this->tecnicoData[0]["descri_maintenance"];?></h5></li>
            <li><h5 class="text-secondary"><strong>Progreso de la reparacion: </strong><?php echo $this->tecnicoData[0]["progress_maintenance"];?>%</h5></li>

            <li><h5 class="text-secondary"><strong>Fecha de envio de reparacion: </strong><?php echo $this->tecnicoData[0]["date_asignation"];?></h5></li>
            </ul>
        </div>

        <div class="col-md-3 my-auto">
                <img width="180" class="rounded" src="<?php echo constant('URL') . "public/images/qrcodes/" .$this->equipmentData[0]["qrcode_equipcomp"]; ?>" alt="#">
            </div>
    </div>
</div>


<?php include_once "views/dashboard/footer.php"; ?>