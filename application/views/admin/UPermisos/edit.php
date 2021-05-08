
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Editar Permisos
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
                        <form action="<?php echo base_url();?>user/permisos/update" id="store" method="POST">
                            <input type="hidden" value="<?php echo $permiso->idpermiso;?>" name="idpermiso">
                            <div class="form-group">
                              <label for='menus'>Menus: </label>
                              <select name='idmenu' id='menu' class="form-control">
                                        <option value="<?php echo $permiso->idmenu;?>"><?php echo $permiso->menu;?></option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for='roles'>Rol: </label>
                                <select name='id_rol' id='id_rol' class="form-control">
                                          <option value="<?php echo $permiso->id_rol;?>"><?php echo $permiso->rol;?></option>                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="read">Leer:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="read" value="1" <?php echo $permiso->reader == 1 ? "checked":"";?>>si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="read" value="0" <?php echo $permiso->reader == 0 ? "checked":"";?>>no
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="insert">Insertar:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="insert" value="1" <?php echo $permiso->inserter == 1 ? "checked":"";?>>si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="insert" value="0" <?php echo $permiso->inserter == 0 ? "checked":"";?>>no
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="update">Actualizar:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="update" value="1" <?php echo $permiso->updater == 1 ? "checked":"";?>>si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="update" value="0" <?php echo $permiso->updater == 0 ? "checked":"";?>>no
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="delete">Eliminar:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="delete" value="1" <?php echo $permiso->deleter == 1 ? "checked":"";?>>si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="delete" value="0" <?php echo $permiso->deleter == 0 ? "checked":"";?>>no
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Editar</button>
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
