
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
       COMPUESTO
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
                        <a href="<?php echo base_url();?>mantenimiento/compuesto/addHtml" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar compuesto</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover nowrap" width="100%" data-scroll-x="true">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Reactivo 1</th>
                                    <th>Reactivo 2</th>
                                    <th>Reactivo 3</th>
                                    <th>Reactivo 4</th>
                                    <th>Reactivo 5</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($compuesto)):?>
                                    <?php foreach($compuesto as $comp):?>
                                        <tr>
                                            <td><?= $comp['id_comp']?></td>
                                            <td><?= $comp['nom_comp']?></td>
                                            <td><?= $comp['react1']?></td>
                                            <td><?= $comp['react2']?></td>
                                            <td><?= $comp['react3']?></td>
                                            <td><?= $comp['react4']?></td>
                                            <td><?= $comp['react5']?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>mantenimiento/compuesto/editHtml/<?= $comp['id_comp']?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/compuesto/eliminar/<?= $comp['id_comp']?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
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
        <h4 class="modal-title">Informacion de usuarios</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
