
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        COMPUESTO
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
                        
                        <form id="editComp" method="POST">
                            <input type="hidden" value="<?php echo $compuesto->id_comp;?>" name="id_comp">
                            <div class="form-group">
                                <label for="nom_comp">Nombre del compuesto:</label>
                                <input type="text" class="form-control" id="nom_comp" name="nom_comp" value="<?php echo $compuesto->nom_comp; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="react1">Reactivo 1:</label>
                                <input type="text" class="form-control" id="react1" name="react1" value="<?php echo $compuesto->react1; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="react2">Reactivo 2:</label>
                                <input type="text" class="form-control" id="react2" name="react2" value="<?php echo $compuesto->react2; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="react3">Reactivo 3:</label>
                                <input type="text" class="form-control" id="react3" name="react3" value="<?php echo $compuesto->react3; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="react4">Reactivo 4:</label>
                                <input type="text" class="form-control" id="react4" name="react4" value="<?php echo $compuesto->react4; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="react5">Reactivo 5:</label>
                                <input type="text" class="form-control" id="react5" name="react5" value="<?php echo $compuesto->react5; ?>" required>
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
