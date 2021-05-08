
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        USUARIO
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
                        
                        <form id="edituser" method="POST">
                            <input type="hidden" value="<?php echo $usuarios->id_user;?>" name="id_user">
                            <div class="form-group">
                                <label for="nombre">Nombre(s):</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $usuarios->nombres; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tam">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuarios->apellidos;?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tam">Telefono:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" id="telefono" name="telefono" data-inputmask='"mask": "(999) 999-9999"' data-mask value="<?php echo $usuarios->telefono;?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tam">Login:</label>
                                <input type="text" class="form-control" id="login" name="login" value="<?php echo $usuarios->login;?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tam">Password:</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $usuarios->password;?>" required>
                            </div>
                            <div class="form-group">
                                <label for='roles'>Rol: </label>
                                <select name='id_rol' id='id_rol' class="form-control" required>
                                      <option value="<?php echo $usuarios->id_rol;?>"> <?php echo $usuarios->desc_rol;?> </option>
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
