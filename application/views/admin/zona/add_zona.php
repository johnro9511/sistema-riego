<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ZONA
        <small>Nuevo</small>
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
                        
                        <form id="addZona"  method="POST">
                            <div class="form-group">
                                <label for="nom_zona">Descripción:</label>
                                <input type="text" class="form-control" id="nom_zona" name="nom_zona" required>
                            </div>
                            <div class="form-group">
                                <label for='ubicacion'>Ubicación: </label>
                                <select name='id_ubi' id='id_ubi' class="form-control" required>
                                  <option value="">--Seleciona ubicación--</option>
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
                                <select name='id_cultivo' id='id_cultivo' class="form-control" required>
                                  <option value="">--Seleciona cultivo--</option>
                                    <?php
                                          if (count($cultivo)) {
                                            foreach ($cultivo as $key => $list) {
                                                      echo '<option value="'. $list['id_cultivo'] . '">' . $list['desc_cultivo'] . '</option>';
                                            }
                                          }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for='suelo'>Suelo: </label>
                                <select name='id_suelo' id='id_suelo' class="form-control" required>
                                  <option value="">--Seleciona suelo--</option>
                                    <?php
                                          if (count($suelo)) {
                                            foreach ($suelo as $key => $list) {
                                                      echo '<option value="'. $list['id_suelo'] . '">' . $list['desc_suelo'] . '</option>';
                                            }
                                          }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for='compuesto'>Compuesto: </label>
                                <select name='id_comp' id='id_comp' class="form-control" required>
                                  <option value="">--Seleciona compuesto--</option>
                                    <?php
                                          if (count($compuesto)) {
                                            foreach ($compuesto as $key => $list) {
                                                      echo '<option value="'. $list['id_comp'] . '">' . $list['nom_comp'] . '</option>';
                                            }
                                          }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fec_inicio">Fecha de inicio:</label>
                                <input type="date" class="form-control" id="fec_inicio" name="fec_inicio" required>
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
<!-- /.content-wrapper -->
