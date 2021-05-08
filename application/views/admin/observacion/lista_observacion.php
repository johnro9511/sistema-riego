
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
       OBSERVACIONES
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
                        <a href="<?php echo base_url();?>mantenimiento/observacion/addHtml" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar observación</a>
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
                                    <th>Observación</th>
                                    <th>Fecha</th>
                                    <th>Hora Obs</th>
                                    <th>Evidencia</th>
                                    <th>Usuario</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($observacion)):?>
                                    <?php foreach($observacion as $comp):?>
                                        <tr>
                                            <td><?= $comp['id_obs']?></td>
                                            <td><?= $comp['nom_zona']?></td>
                                            <td><?= $comp['desc_ubi']?></td>
                                            <td><?= $comp['cultivo']?></td>
                                            <td><?= $comp['desc_obs']?></td>
                                            <td><?= $comp['fecha']?></td>
                                            <td><?= $comp['hora']?></td>
                                            <td style="width:300px;"><button type="button" class="btn btn-view-obs" data-toggle="modal" data-target="#modal-default" value="<?= $comp['id_obs']?>">
                                                <img src="<?=base_url()?>evidencias/<?= $comp['foto_zona']?>" style="width:20%"> </img>
                                            </button></td>
                                            <td><?= $comp['usuario']?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>mantenimiento/observacion/editHtml/<?= $comp['id_obs']?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <!--<a href="<//?php echo base_url();?>mantenimiento/observacion/eliminar/<?= $comp['id_obs']?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a> -->
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
        <h4 class="modal-title">EVIDENCIA DE LA OBSERVACIÓN</h4>
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
