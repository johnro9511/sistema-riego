
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
              Permisos de Usuario
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
                        <form action="<?php echo base_url();?>user/permisos/store" method="POST">
                          <div class="form-group">
                              <label for='menus'>Menus: </label>
                              <select name='idmenu' id='idmenu' class="form-control" required>
                                  <?php foreach ($menus as $menu):?>
                                    <option value="<?php echo $menu->idmenu;?>">
                                      <?php echo $menu->nombre;?>
                                    </option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for='roles'>Rol: </label>
                              <select name='id_rol' id='id_rol' class="form-control" required>
                                <?php
                                      if (count($roles)) {
                                          foreach ($roles as $key => $list) {
                                              echo '<option value="'. $list['id_rol'] . '">' . $list['desc_rol'] . '</option>';
                                          }
                                      }
                                ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="read">Leer:</label>
                              <label class="radio-inline">
                                  <input type="radio" name="read" value="1" checked="checked">si
                              </label>
                              <label class="radio-inline">
                                  <input type="radio" name="read" value="0">no
                              </label>
                          </div>
                          <div class="form-group">
                              <label for="insert">Insertar:</label>
                              <label class="radio-inline">
                                  <input type="radio" name="insert" value="1" checked="checked">si
                              </label>
                              <label class="radio-inline">
                                  <input type="radio" name="insert" value="0">no
                              </label>
                          </div>
                          <div class="form-group">
                              <label for="update">Actualizar:</label>
                              <label class="radio-inline">
                                  <input type="radio" name="update" value="1" checked="checked">si
                              </label>
                              <label class="radio-inline">
                                  <input type="radio" name="update" value="0">no
                              </label>
                          </div>
                          <div class="form-group">
                              <label for="delete">Eliminar:</label>
                              <label class="radio-inline">
                                  <input type="radio" name="delete" value="1" checked="checked">si
                              </label>
                              <label class="radio-inline">
                                  <input type="radio" name="delete" value="0">no
                              </label>
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
