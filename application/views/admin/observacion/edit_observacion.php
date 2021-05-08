<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        OBSERVACIÓN
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                             </div>
                        <?php endif;?>
                        
                        <form id="editObs"  method="POST">
                            <input type="hidden" value="<?php echo $observacion->id_obs;?>" name="id_obs">
                            <div class="form-group">
                                <label for='zona'>Zona: </label>
                                <select name='id_zona' id='id_zona' class="form-control" required>
                                  <option value="<?php echo $observacion->id_zona;?>"> <?php echo $observacion->nom_zona;?> </option>
                                    <?php
                                          if (count($zona)) {
                                            foreach ($zona as $key => $list) {
                                                      echo '<option value="'. $list['id_zona'] . '">' . $list['nom_zona'] . '</option>';
                                            }
                                          }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for='ubicacion'>Ubicación: </label>
                                <select name='id_ubi' id='id_ubi' class="form-control" required>
                                  <option value="<?php echo $observacion->id_ubi;?>"> <?php echo $observacion->desc_ubi;?> </option>
                                    <?php
                                          if (count($ubicacion)) {
                                            foreach ($ubicacion as $key => $list) {
                                                      echo '<option value="'. $list['id_ubi'] . '">' . $list['desc_ubi'] . '</option>';
                                            }
                                          }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for='cultivo'>Cultivo: </label>
                                <select name='cultivo' id='cultivo' class="form-control" required>
                                  <option value="<?php echo $observacion->cultivo;?>"> <?php echo $observacion->cultivo;?> </option>
                                    <?php
                                          if (count($cultivo)) {
                                            foreach ($cultivo as $key => $list) {
                                                      echo '<option value="'. $list['desc_cultivo'] . '">' . $list['desc_cultivo'] . '</option>';
                                            }
                                          }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desc_obs">Detalle Observación:</label>
                                <input type="text" class="form-control" id="desc_obs" name="desc_obs" value="<?php echo $observacion->desc_obs;?>" required>
                            </div>
                            <div class="form-group">
                                <label for="foto_zona">Evidencia:</label>
                                <input type="file" id="foto_zona" name="foto_zona" class="dropify" data-default-file="<?=base_url()?>/evidencias/<?php echo $observacion->foto_zona; ?>" data-allowed-file-extensions = " jpg png jpeg gif bmp" data-max-file-size="15M" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wraCULTIVO