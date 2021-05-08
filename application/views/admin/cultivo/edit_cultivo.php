
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        CULTIVO
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
                        
                        <form id="editCult" method="POST">
                            <input type="hidden" value="<?php echo $cultivo->id_cultivo;?>" name="id_cultivo">
                            <div class="form-group">
                                <label for="desc_cultivo">cultivo:</label>
                                <input type="text" class="form-control" id="desc_cultivo" name="desc_cultivo" value="<?php echo $cultivo->desc_cultivo; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="duracion">Duración:</label>
                                <input type="text" class="form-control" id="duracion" name="duracion" value="<?php echo $cultivo->duracion;?>" required>
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
