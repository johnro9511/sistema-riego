<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Estadisticas
            <small>Editar</small>
        </h1>
    </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $registros?></h3>
                            <p>REGISTROS</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <a href="<?php echo base_url();?>mantenimiento/registros" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                    </div> 
                </div>
                <!-- ./col -->
                <!-- <div class="col-lg-3 col-xs-6">
                    <!-- small box ->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $observacion?></h3>
                            <p>OBSERVACIONES</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-eye"></i>
                        </div>
                          <a href="<?php echo base_url();?>mantenimiento/observacion" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div> -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $cultivo?></h3>
                            <p>CULTIVOS</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <a href="<?php echo base_url();?>mantenimiento/cultivo" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $zona?></h3>
                            <p>ZONAS</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-paper-plane-o"></i>
                        </div>
                        <a href="<?php echo base_url();?>mantenimiento/zona" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $observacion?></h3>
                            <p>ACCIONES</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-eye"></i>
                        </div>
                          <a href="<?php echo base_url();?>acciones.php" class="small-box-footer" target="_blank">Más información <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

                <div class="row">
                      <!-- /.box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">TEMPERATURA AMBIENTAL Y DEL SUELO</h3>
                                <div class="box-tools pull-right">
                                  <select name="viaje" id="viaje" class="form-control">
                                      <option value="">--Seleciona --</option>
                                      <?php foreach($viaje as $vi):?>
                                      <option value="<?php echo $vi->id_zona;?>"><?php echo $vi->nom_zona;?></option>
                                      <?php endforeach;?>
                                  </select>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <div id="grafico" style="min-width: 310px; height: 400px; margin: 0 auto">

                              </div>
                            </div>
                            <!-- ./box-body -->
                        </div>
                        <!-- /.box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">HUMEDAD AMBIENTAL Y DEL SUELO</h3>
                                <div class="box-tools pull-right">
                                  <select name="viaje2" id="viaje2" class="form-control">
                                      <option value="">--Seleciona--</option>
                                      <?php foreach($viaje as $vi):?>
                                      <option value="<?php echo $vi->id_zona;?>"><?php echo $vi->nom_zona;?></option>
                                      <?php endforeach;?>
                                  </select>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <div id="grafico2" style="min-width: 310px; height: 400px; margin: 0 auto">

                              </div>
                            </div>
                            <!-- ./box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
