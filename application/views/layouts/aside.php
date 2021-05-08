        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU PRINCIPAL</li>
                    <a href="#">&nbsp;<i class="fa fa-circle text-success"> </i>&nbsp;&nbsp;<?php echo $this->session->userdata("rol")?></a>
                        <li>
                            <a href="<?php echo base_url();?>dashboard" onclick="graficar()">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tree"></i> <span>Plantación</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/ubicacion"><i class="fa  fa-map-marker"></i> Ubicación</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/cultivo"><i class="fa fa-leaf"></i>Cultivo</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/suelo"><i class="fa fa-minus"></i>Suelo</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/compuesto"><i class="fa  fa-eyedropper"></i>Compuesto</a></li>
                          </ul>
                    </li>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-paper-plane-o"></i> <span>Zona de Plantío</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>mantenimiento/zona"><i class="fa fa-map-pin"></i>Zona</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i> <span>Registros</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/registros"><i class="fa  fa-line-chart"></i>Lecturas</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa  fa-eye"></i> <span>Observaciones</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
            
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/observacion"><i class="fa  fa-thumb-tack"></i>observación</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/Usuario"><i class="fa  fa-users"></i>Usuarios</a></li>
                            <li><a href="<?php echo base_url();?>user/permisos"><i class="fa fa-star-o"></i>Permisos</a></li>
                        </ul>
                    </li>
                    
                   <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa  fa-tags"></i> <span>Cedis</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">  
                            <li><a href="<//?php echo base_url(); ?>cedis/cedis"><i class="fa  fa-tag"></i>Agregar Foto</a></li>
                        </ul>
                    </li> -->
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
