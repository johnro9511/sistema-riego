
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        REGISTROS
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
               <!-- <div class="row">
                    <div class="col-md-12">
                        <a href="<?//php echo base_url();?>mantenimiento/zona/addHtml" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar zona</a>
                    </div>
                </div> -->
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
                                    <th>Fecha</th>
                                    <th>Hora Reg</th>
                                    <th>Temp Amb °C</th>
                                    <th>Hume Amb (%)</th>
                                    <th>Iluminación (%)</th>
                                    <th>Temp Suelo °C</th>
                                    <th>Hume Suelo(%)</th>
                                    <th>PH</th>
                                    <th>CO2</th>
                                   <th></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($registros)):?>
                                    <?php foreach($registros as $reg):?>
                                        <tr>
                                            <td><?= $reg['id_reg']?></td>
                                            <td><?= $reg['nom_zona']?></td>
                                            <td><?= $reg['desc_ubi']?></td>
                                            <td><?= $reg['cultivo']?></td>
                                            <td><?= $reg['fecha']?></td> 
                                            <td><?= $reg['hora']?></td> 
                                            <td><?= $reg['temp_amb']?></td>
                                            <td><?= $reg['hume_amb']?></td>
                                            <td><?= $reg['iluminacion']?></td>
                                            <td><?= $reg['temp_suelo']?></td>
                                            <td><?= $reg['hume_suelo']?></td>
                                            <td><?= $reg['ph']?></td>
                                            <td><?= $reg['co2']?></td>
                                            <td>
                                                <!--<div class="btn-group">
                                                    <a href="<//?php echo base_url()?>mantenimiento/registros/editHtml/<//?= $reg['id_reg']?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<//?php echo base_url();?>mantenimiento/registros/eliminar/<//?= $reg['id_reg']?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
                                                </div> -->
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
