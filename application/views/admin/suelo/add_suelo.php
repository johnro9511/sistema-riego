<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        SUELO
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
                        
                        <form id="addSuelo"  method="POST">
                            <div class="form-group">
                                <label for="desc_suelo">Descripción:</label>
                                <input type="text" class="form-control" id="desc_suelo" name="desc_suelo" required>
                            </div>
                            <div class="form-group">
                                <label for="densidad">Densidad (%):</label>
                                <input type="number" class="form-control" id="densidad" name="densidad" required>
                            </div>
                            <div class="form-group">
                                <label for="materia_org">Materia orgánica (%):</label>
                                <input type="number" class="form-control" id="materia_org" name="materia_org" required>
                            </div>
                            <div class="form-group">
                                <label for="arcilla">Arcilla (%):</label>
                                <input type="number" class="form-control" id="arcilla" name="arcilla" required>
                            </div>
                            <div class="form-group">
                                <label for="arena">Arena (%):</label>
                                <input type="number" class="form-control" id="arena" name="arena" required>
                            </div>
                            <div class="form-group">
                                <label for="limo">Limo (%):</label>
                                <input type="number" class="form-control" id="limo" name="limo" required>
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
<!-- /.content-wraCULTIVO