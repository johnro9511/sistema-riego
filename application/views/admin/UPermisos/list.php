
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        PERMISOS
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>user/permisos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Permiso</a>
                        <button type="button" class="btn btn-success edit" data-toggle="modal" data-target="#modal-default"><span class="fa fa-plus"></span> Agregar Rol  </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover nowrap" width="100%" data-scroll-x="true">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Menu</th>
                                    <th>Rol</th>
                                    <th>Leer</th>
                                    <th>Insertar</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($permisos)):?>
                                    <?php foreach($permisos as $permiso):?>
                                        <tr>
                                            <th><?php echo $permiso->idpermiso;?></th>
                                            <td><?php echo $permiso->menu;?></td>
                                            <td><?php echo $permiso->roles;?></td>
                                            <td>
                                              <?php if($permiso->reader == 0):?>
                                                <span class="fa fa-times"></span>
                                              <?php else:?>
                                                <span class="fa fa-check"></span>
                                              <?php endif;?>
                                            </td>
                                            <td>
                                              <?php if($permiso->inserter == 0):?>
                                                <span class="fa fa-times"></span>
                                              <?php else:?>
                                                <span class="fa fa-check"></span>
                                              <?php endif;?>
                                            </td>
                                            <td>
                                              <?php if($permiso->updater == 0):?>
                                                <span class="fa fa-times"></span>
                                              <?php else:?>
                                                <span class="fa fa-check"></span>
                                              <?php endif;?>
                                            </td>
                                            <td>
                                              <?php if($permiso->deleter == 0):?>
                                                <span class="fa fa-times"></span>
                                              <?php else:?>
                                                <span class="fa fa-check"></span>
                                              <?php endif;?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>user/permisos/edit/<?php echo $permiso->idpermiso;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url()?>user/permisos/delete/<?php echo $permiso->idpermiso;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
                                                </div>
                                           </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Rol</h4>
      </div>
      <div class="modal-body">
        <form id="addrol" method="POST" autocomplete="off">

                <div class="form-row">
                    <label>Nombre: </label>
                    <input type="text" name="rol" required>
                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>

            <div class="form-row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
