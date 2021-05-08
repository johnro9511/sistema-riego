
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ZONA
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
                        <a href="<?php echo base_url();?>mantenimiento/zona/addHtml" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar zona</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover nowrap" width="100%" data-scroll-x="true">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Zona</th>
                                    <th>Ubicación</th>
                                    <th>Cultivo</th>
                                    <th>Suelo</th>
                                    <th>Compuesto</th>
                                    <th>Siembra</th>
                                    <th>Cosecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($zona)):?>
                                    <?php foreach($zona as $zon):?>
                                        <tr>
                                            <td><?= $zon['id_zona']?></td>
                                            <td><?= $zon['nom_zona']?></td>
                                            <td><?= $zon['desc_ubi']?></td>
                                            <td><?= $zon['desc_cultivo']?></td>
                                            <td><?= $zon['desc_suelo']?></td>
                                            <td><?= $zon['nom_comp']?></td>
                                            <td><?= $zon['fec_inicio']?></td>
                                            <td><?= $zon['fec_cosecha']?></td>
                                            <td>
                                                <div class="btn-group">
                                                   <a href="<?php echo base_url()?>mantenimiento/zona/fec_cos_edit/<?= $zon['id_zona']?>" class="btn btn-success">
                                                    <span class="fa fa-calendar"></span>&nbsp; COSECHAR</a>
                                                    <a href="<?php echo base_url()?>mantenimiento/zona/editHtml/<?= $zon['id_zona']?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/zona/eliminar/<?= $zon['id_zona']?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
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
        <h4 class="modal-title">AGREGAR FECHA DE COSECHA</h4>
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
