<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        COMPUESTO
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
                        
                        <form id="addComp"  method="POST">
                            <div class="form-group">
                                <label for="nom_comp">Nombre del compuesto:</label>
                                <input type="text" class="form-control" id="nom_comp" name="nom_comp" required>
                            </div>
                            <div class="form-group">
                                <label for="react1">Reactivo 1:</label>
                                <input type="text" class="form-control" id="react1" name="react1" required>
                            </div>
                            <div class="form-group">
                                <label for="react2">Reactivo 2:</label>
                                <input type="text" class="form-control" id="react2" name="react2" required>
                            </div>
                            <div class="form-group">
                                <label for="react3">Reactivo 3:</label>
                                <input type="text" class="form-control" id="react3" name="react3" required>
                            </div>
                            <div class="form-group">
                                <label for="react4">Reactivo 4:</label>
                                <input type="text" class="form-control" id="react4" name="react4" required>
                            </div>
                            <div class="form-group">
                                <label for="react5">Reactivo 5:</label>
                                <input type="text" class="form-control" id="react5" name="react5" required>
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