<?php $titulo = "Editar Equipo";
include_once "views/dashboard/header.php"; ?>

<?php //echo "<pre>"; //var_dump($this->equipo); echo "</pre>";?>




<div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="<?php echo constant('URL'); ?>admin/updateEquipo" method="POST">

                            
<input type="hidden" name="id" value="<?php echo $this->equipo[0]["id_equipcomp"];?>">

                                <div class="row justify-content-center">
                                    <div class="form-group  col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                            </div>

                                            <select class="form-control" id="exampleFormControlSelect1" name="type_equipcomp">
                                                <option selected value="<?php echo $this->equipo[0]["id_equipmenttype"];?>"><?php echo $this->equipo[0]["name_equipmenttype"];?></option>

                                                <?php foreach ($this->equipmentType as $equipmentType) : ?>
                                                    <option value=" <?php echo $equipmentType['id_equipmenttype'] ?>"><?php echo $equipmentType['name_equipmenttype'] ?></option>
                                                <?php endforeach; ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Codigo" name="code_equipcomp" value="<?php echo $this->equipo[0]["code_equipcomp"];?>">
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-bookmark"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Modelo" name="model_equipcomp" value="<?php echo $this->equipo[0]["model_equipcomp"];?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Marca" name="marca_equipcomp"  value="<?php echo $this->equipo[0]["marca_equipcomp"];?>">
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-palette"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Color" name="color_equipcomp" value="<?php echo $this->equipo[0]["color_equipcomp"];?>">
                                        </div>
                                    </div>


                                </div>


                                <!-- <div class="row justify-content-start">
                                <div class="form-group  col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Precio" name="precio_equipcomp">
                                        </div>
                                    </div>
                                </div> -->







                                <div class="row justify-content-center mt-3">
                                    <div class="form-group col-md-6">
                                        <div class="form-group ">
                                            <button type="submit" name="update" value="newequip" class="btn btn-success btn-lg btn-block">Actualizar <i class="fas fa-location-arrow"></i></button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

<?php include_once "views/dashboard/footer.php"; ?>