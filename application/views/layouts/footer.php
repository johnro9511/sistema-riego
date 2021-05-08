    <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="">Sistema de Riego</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>

<script src="<?php echo base_url();?>assets/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url();?>assets/input-mask/jquery.inputmask.js"></script>

<!-- PARA LOS ALERTS-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Popper.js-->
<script  src="<?php echo base_url();?>assets/sw/js/sweetalert.min.js"></script>
<!--Graficas-->
<script src="<?php echo base_url();?>assets/template/hig/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/hig/highcharts.js"></script>

<!-- Plugin Sweet alert -->
<script  src="<?php echo base_url();?>assets/template/dist/js/show.js"></script>
<script src="<?php echo base_url();?>assets/datatable/js/dataTables.responsive.min.js"></script>
<!-- Plugins Alertify -->
<script src="<?php echo base_url();?>assets/dropify/dist/js/dropify.min.js"></script>

<script src="<?php echo base_url(); ?>assets/excel/dataTables.buttons.js"></script>
<script src="<?php echo base_url(); ?>assets/excel/buttons.flash.js"></script>
<script src="<?php echo base_url(); ?>assets/excel/jszip.js"></script>
<script src="<?php echo base_url(); ?>assets/excel/pdfmake.js"></script>
<script src="<?php echo base_url(); ?>assets/excel/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/excel/buttons.html5.js"></script>
<script src="<?php echo base_url(); ?>assets/excel/buttons.print.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>


<script>

//pdf
function printDiv() {

     var base_url= "<?php echo base_url();?>";

     var complemento= "articulos/blister";

     var contenido= document.getElementById('content').innerHTML;

     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     self.close();

     document.body.innerHTML = contenidoOriginal;

     location.href= base_url + complemento;

}

function printDiv2() {

     var base_url= "<?php echo base_url();?>";

     var complemento= "compras/ordenes";

     var contenido= document.getElementById('content').innerHTML;

     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     self.close();

     document.body.innerHTML = contenidoOriginal;

     location.href= base_url + complemento;

}

</script>

<script>
$(document).ready(function () {
    var base_url= "<?php echo base_url();?>";
//graficar();
//
    $('[data-mask]').inputmask();
//
//
    $("#id_fam").change(function () {
                $("#id_fam option:selected").each(function () {
                    id_fam = $('#id_fam').val();
                    $.post("<?php echo base_url() ?>articulos/presupuesto/getCat", {
                          id_fam: id_fam
                    }, function (data) {
                            $("#id_categoria").html(data);
                    });
                });
    });

    $("#idrol").change(function() {

          if( $("#idrol").val()!="3"){
              $( "#broker" ).prop( "disabled", true );
          }else{
              $( "#broker" ).prop( "disabled", false );
          }

    });

    $("#idrol").trigger("change");


    $('#importar').on('submit', function(event){
          event.preventDefault();
          var dataString = new FormData(this);
          $.ajax({
                url: base_url + "articulos/blister/importar",
                method:"POST",
                data: dataString,
                contentType:false,
                processData:false,
                success: function(){
                    swal({
                        title: "¡Hecho!",
                        text: "Se ha importado correctamente.",
                        type: "success",    },
                    function(){
                        location.href = "/michelle/articulos/blister";
                        //dataTable.ajax.reload();
                    });
                },
                error:function(){
                      swal("Imposible","Error en la importacion.","error");
                }
          })
    });


    $('#importarord').on('submit', function(event){
          event.preventDefault();
          var dataString = new FormData(this);
          //alert(dataString);
          $.ajax({
                url: base_url + "compras/ordenes/importar",
                method:"POST",
                data: dataString,
                contentType:false,
                processData:false,
                success: function(){
                    swal({
                        title: "¡Hecho!",
                        text: "Se ha importado correctamente.",
                        type: "success",    },
                    function(){
                        location.href = "/michelle/compras/ordenes";
                        //dataTable.ajax.reload();
                    });
                },
                error:function(){
                      swal("Imposible","Error en la importacion.","error");
                }
          })
    });


    //PARAB ELIMINAR
    $(".btn-remove").on("click", function(e){
          e.preventDefault();
          var ruta = $(this).attr("href");
          //alert(ruta);
          swal({
                title: "¿Deseas Eliminar el registro?",
                text: "El registro sera eliminado permanentemente...",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "¡Claro!",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false },

          function(isConfirm){
                if (isConfirm) {
                      //ajax....
                      $.ajax({
                            url: ruta,
                            type:"POST",
                            success:function(resp){
                                  swal({
                                        title: "¡Eliminado!",
              		                      text: "Registro eliminado satisfactoriamente.",
              		                      type: "success", },
                            function(){
                                    location.reload();
                                    //window.location.href = base_url + resp;
                                    //dataTable.ajax.reload();
                            });
                            //http://localhost/ventas_ci/mantenimiento/productos
                            },
                            error:function(){
                                    swal("Imposible","Ocurrio un error en la cancelacion","error");
                            }
              });
          } else {
              swal("¡Cancelado!",
                   "Operacion cancelada",
                   "error");
          }
      });
    });


    //PARA PONER ESTADO EN FABRICACION
    $(".btn-fabrica").on("click", function(e){
          e.preventDefault();
          var ruta = $(this).attr("href");
          //alert(ruta);
          swal({
                title: "¿Deseas poner en fabricacion este registro?",
                text: "El registro sera modificado permanentemente...",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "¡Claro!",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false },

          function(isConfirm){
                if (isConfirm) {
                      //ajax....
                      $.ajax({
                            url: ruta,
                            type:"POST",
                            success:function(resp){
                                  swal({
                                        title: "Actualizado!",
              		                      text: "Registro modificado satisfactoriamente.",
              		                      type: "success", },
                            function(){
                                    location.reload();
                                    //window.location.href = base_url + resp;
                                    //dataTable.ajax.reload();
                            });
                            //http://localhost/ventas_ci/mantenimiento/productos
                            },
                            error:function(){
                                    swal("Imposible","Ocurrio un error en la cancelacion","error");
                            }
              });
          } else {
              swal("¡Cancelado!",
                   "Operacion cancelada",
                   "error");
          }
      });
    });

    //PARA PONER ESTADO EN TRANSITO
    $(".btn-transito").on("click", function(e){
          e.preventDefault();
          var ruta = $(this).attr("href");
          //alert(ruta);
          swal({
                title: "¿Deseas poner en transito este registro?",
                text: "El registro sera modificado permanentemente...",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "¡Claro!",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false },

          function(isConfirm){
                if (isConfirm) {
                      //ajax....
                      $.ajax({
                            url: ruta,
                            type:"POST",
                            success:function(resp){
                                  swal({
                                        title: "Actualizado!",
              		                      text: "Registro modificado satisfactoriamente.",
              		                      type: "success", },
                            function(){
                                    location.reload();
                                    //window.location.href = base_url + resp;
                                    //dataTable.ajax.reload();
                            });
                            //http://localhost/ventas_ci/mantenimiento/productos
                            },
                            error:function(){
                                    swal("Imposible","Ocurrio un error en la cancelacion","error");
                            }
              });
          } else {
              swal("¡Cancelado!",
                   "Operacion cancelada",
                   "error");
          }
      });
    });


    //PARA PONER ESTADO EN ALMACEN
    $(".btn-almacen").on("click", function(e){
          e.preventDefault();
          var ruta = $(this).attr("href");
          //alert(ruta);
          swal({
                title: "¿Deseas poner en almacen este registro?",
                text: "El registro sera modificado permanentemente...",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "¡Claro!",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false },

          function(isConfirm){
                if (isConfirm) {
                      //ajax....
                      $.ajax({
                            url: ruta,
                            type:"POST",
                            success:function(resp){
                                  swal({
                                        title: "Actualizado!",
              		                      text: "Registro modificado satisfactoriamente.",
              		                      type: "success", },
                            function(){
                                    location.reload();
                                    //window.location.href = base_url + resp;
                                    //dataTable.ajax.reload();
                            });
                            //http://localhost/ventas_ci/mantenimiento/productos
                            },
                            error:function(){
                                    swal("Imposible","Ocurrio un error en la cancelacion","error");
                            }
              });
          } else {
              swal("¡Cancelado!",
                   "Operacion cancelada",
                   "error");
          }
      });
    });

    //PARA SINCRONIZAR
    $(".btn-sincro").on("click", function(e){
          e.preventDefault();
          var ruta = $(this).attr("href");
          //alert(ruta);
          swal({
                title: "¿Deseas exportar datos al movil?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "¡Claro!",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false },

          function(isConfirm){
            if (isConfirm) {
                //ajax....
                $.ajax({
                    url: base_url + "dashboard/sincro",
                    type:"POST",
                    success:function(resp){
                        swal({
                              title: "CORRECTO!",
                  		        text: "La exportación se ha realizado con exito.",
                  		        type: "success", },
                        function(){
                              location.reload();
                              //window.location.href = base_url + resp;
                              //dataTable.ajax.reload();
                        });
                        //http://localhost/ventas_ci/mantenimiento/productos
                    },
                    error:function(){
                        swal("Imposible","Ocurrio un error en la exportación.","error");
                    }
                });
            } else {
                  swal("¡Cancelado!",
                       "Operacion cancelada",
                       "error");
            }
          });
    });


    //PARAB ELIMINAR orden
    $(".btn-remove1").on("click", function(e){
            e.preventDefault();
            var ruta = $(this).attr("href");
            //alert(ruta);
            swal({
                  title: "¿Deseas cancelar esta orden?",
                  text: "Se cancelaran todos los detalles de esta orden.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "¡Claro!",
                  cancelButtonText: "No",
                  closeOnConfirm: false,
                  closeOnCancel: false },

            function(isConfirm){
                  if (isConfirm) {
                        //ajax....
                        $.ajax({
                            url: ruta,
                            type:"POST",
                            success:function(resp){
                                  swal({
                                        title: "Cancelado!",
                  		                  text: "Registro cancelado satisfactoriamente.",
                  		                  type: "success",
                                  },
                                  function(){
                                        location.reload();
                                        //window.location.href = base_url + resp;
                                        //dataTable.ajax.reload();
                                  });
                                  //http://localhost/ventas_ci/mantenimiento/productos
                            },
                            error:function(){
                                  swal("Imposible","Registro relacionado","error");
                            }
                        });
                    } else{
                            swal("¡Error!",
                                 "Ocurrio un error en la cancelacion",
                                 "error");
                    }
              });
    });


    //PARAB AUTORIZAR orden
    $(".btn-remove2").on("click", function(e){
              e.preventDefault();
              var ruta = $(this).attr("href");
              //alert(ruta);
              swal({
                    title: "¿Deseas autorizar esta orden?",
                    text: "Se autorizaran todos los detalles de esta orden.",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "¡Claro!",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false },

              function(isConfirm){
                    if (isConfirm) {
                          //ajax....
                          $.ajax({
                                url: ruta,
                                type:"POST",
                                success:function(resp){
                                      swal({
                                          title: "¡Autorizado!",
                      		                text: "Registro se autorizo satisfactoriamente.",
                      		                type: "success", },
                                      function(){
                                          location.reload();
                                          //window.location.href = base_url + resp;
                                          //dataTable.ajax.reload();
                                      });
                                      //http://localhost/ventas_ci/mantenimiento/productos
                                },
                                error:function(){
                                      swal("Imposible","Ocurrio un error en la autorizacion","error");
                                }
                          });
                    } else {
                          swal("¡Cancelado!",
                               "Autorizacion cancelada",
                               "error");
                    }
              });
    });


    //PARAB activar registros
    $(".btn-remove3").on("click", function(e){
              e.preventDefault();
              var ruta = $(this).attr("href");
              //alert(ruta);
              swal({
                    title: "¿Deseas activar este registro?",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "¡Claro!",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false },

                    function(isConfirm){
                          if (isConfirm) {
                                  //ajax....
                                  $.ajax({
                                          url: ruta,
                                          type:"POST",
                                          success:function(resp){
                                                  swal({
                                                        title: "¡Autorizado!",
                          		                          text: "El registro se activo satisfactoriamente.",
                          		                          type: "success", },
                                                  function(){
                                                        location.reload();
                                                        //window.location.href = base_url + resp;
                                                        //dataTable.ajax.reload();
                                                  });
                                                  //http://localhost/ventas_ci/mantenimiento/productos
                                          },
                                          error:function(){
                                                  swal("Imposible","Ocurrio un error en la activacion.","error");
                                          }
                                  });

                          } else {
                                  swal("¡Cancelado!",
                                       "Autorizacion cancelada",
                                       "error");
                          }
                    });
    });

    ///AGREGAR
    ///AGREGAR VIAJE
    $("#addviaje").submit( function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            var self = this;
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/viajes/crear/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                            swal({
                                  title: "¡Hecho!",
         		                      text: "Viaje creado satisfactoriamente.",
         		                      type: "success",    },
                            function(){
                                  location.href = "/michelle/viajes/crear";
                                  //dataTable.ajax.reload();
                            });
                    },
                    error:function(){
                            swal("Imposible","ID duplicado","error");
                    }
            });
    });


    //AGREAGAR FAMILIA
    $("#addfam").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            var self = this;
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/articulos/familias/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Familia creada satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/michelle/articulos/familias";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                              swal("Imposible","ID duplicado","error");
                    }
            });
    });


    //AGREAGAR CATEGORIA
    $("#addcat").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            var self = this;
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/articulos/categorias/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Categoria creada satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/michelle/articulos/categorias";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","ID duplicado","error");
                    }
            });
    });


    ///AGREGAR Presupuesto
    ///AGREGAR
    $("#addpresu").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/articulos/presupuesto/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Presupuesto agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/michelle/articulos/presupuesto";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error 404","error");
                    }
            });
    });


    //AGREGAR BLISTER
    $('#formblis').submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/articulos/blister/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Blister agregado satisfactoriamente.",
                              type: "success",    },

                        function(){
                              location.href = "/michelle/articulos/blister";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","ID duplicado","error");
                    }
            });
    });


    //AGREGAR FOTO CEDIS
    $('#formcedis').submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/cedis/cedis/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Blister agregado satisfactoriamente.",
                              type: "success",    },

                        function(){
                              location.href = "/michelle/cedis/cedis";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","ID duplicado","error");
                    }
            });
    });

    //AGREGAR FACTOR
    $("#addfact").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/viajes/factor/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
         		                  text: "Articulo creado satisfactoriamente.",
         		                  type: "success",    },
                        function(){
                              location.href = "/michelle/viajes/factor";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("ERROR","Todos los campos deben estar llenos y los factores deben ser numeros.","error");
                    }
            });
    });


    //agregar broker
    $("#addbroker").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
          //  alert(dataString.length);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/viajes/brokers/store',
                    data: dataString,
                    processData: false,
                    contentType: false,

                    success: function(){

                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },

                        function(){
                              location.href = "/michelle/viajes/brokers";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });


    //PARA AGREGAR MOVIL
    $("#addmovil").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/viajes/movil/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/michelle/viajes/movil";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Llene correctamente los campos.","error");
                    }
            });
    });


    //AGREGAR PAISES
    $("#addpais").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/viajes/paises/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){

                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/michelle/viajes/paises";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

    //AGREGAR Ciudades
    $("#addcd").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/viajes/ciudades/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){

                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/michelle/viajes/ciudades";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

/////////////////////////////// AGREGAR //////////////////////////////////////////
    //AGREGAR USUARIOS
    $("#adduser").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/usuario/store',
                    data: dataString,
                    processData: false,
                    contentType: false,

                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/Usuario";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

    // AGREGAR UBICACION
    $("#addUbi").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/ubicacion/store',
                    data: dataString,
                    processData: false,
                    contentType: false,

                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/ubicacion";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

    //AGREGAR CULTIVO
    $("#addCult").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/cultivo/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/cultivo";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });
    
    //AGREGAR SUELO
    $("#addSuelo").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/suelo/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/suelo";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

     //AGREGAR COMPUESTO
    $("#addComp").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/compuesto/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/compuesto";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

    //AGREGAR ZONA
    $("#addZona").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/zona/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/zona";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });
    
    //AGREGAR OBSERVACION
    $("#addObs").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/observacion/store',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/observacion";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });
    
    
    //AGREGAR Rol
    $("#addrol").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/user/permisos/addrol',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/michelle/user/permisos";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

/////////////////////////// EDITAR /////////////////////////////////////////////

    //EDITAR| USUARIOS
    $("#edituser").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/usuario/edit',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/Usuario";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

    //EDITAR UBICACION
    $("#editUbi").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/ubicacion/edit',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/ubicacion";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

    ///// EDITAR CULTIVO
     $("#editCult").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/cultivo/edit',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/cultivo";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });
    
    ///// EDITAR SUELO
     $("#editSuelo").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/suelo/edit',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/suelo";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });
    
     ///// EDITAR COMPUESTO
     $("#editComp").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/compuesto/edit',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/compuesto";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });
    
    ///// EDITAR ZONA
     $("#editZona").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/zona/edit',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/zona";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });

     ///// EDITAR COSECHA EN ZONA
     $("#editfec_cos").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/zona/upd_fec_cos',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/zona";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });
    
    
    ///// EDITAR OBSERVACION
     $("#editObs").submit(function(e){
            e.preventDefault();
            var dataString = new FormData(this);
            //ajax....
            $.ajax({
                    type: "POST",
                    url:  base_url + '/mantenimiento/observacion/edit',
                    data: dataString,
                    processData: false,
                    contentType: false,
                    success: function(){
                        swal({
                              title: "¡Hecho!",
                              text: "Agregado satisfactoriamente.",
                              type: "success",    },
                        function(){
                              location.href = "/sistema-riego/mantenimiento/observacion";
                              //dataTable.ajax.reload();
                        });
                    },
                    error:function(){
                        swal("Imposible","Error inesperado","error");
                    }
            });
    });
    
    //////////////// VER CUADRO DE VISTA ///////////////////////
    
    //PARA VER DETALLE OBSERVACION
    $(".btn-view-obs").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "/mantenimiento/observacion/view/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });
    

    $(".btn-view-producto").on("click", function(){
            var producto = $(this).val();
            //alert(cliente);
            var infoproducto = producto.split("*");
            html = "<p><strong>Codigo:</strong>"+infoproducto[1]+"</p>"
            html += "<p><strong>Nombre:</strong>"+infoproducto[2]+"</p>"
            html += "<p><strong>Descripcion:</strong>"+infoproducto[3]+"</p>"
            html += "<p><strong>Precio:</strong>"+infoproducto[4]+"</p>"
            html += "<p><strong>Stock:</strong>"+infoproducto[5]+"</p>"
            html += "<p><strong>Categoria:</strong>"+infoproducto[6]+"</p>";
            $("#modal-default .modal-body").html(html);
    });


    $(".btn-view-cliente").on("click", function(){
            var cliente = $(this).val();
            //alert(cliente);
            var infocliente = cliente.split("*");
            html = "<p><strong>Nombres:</strong>"+infocliente[1]+"</p>"
            html += "<p><strong>Apellidos:</strong>"+infocliente[2]+"</p>"
            html += "<p><strong>Telefono:</strong>"+infocliente[3]+"</p>"
            html += "<p><strong>Direccion:</strong>"+infocliente[4]+"</p>"
            html += "<p><strong>RUC:</strong>"+infocliente[5]+"</p>"
            html += "<p><strong>Empresa:</strong>"+infocliente[6]+"</p>";
            $("#modal-default .modal-body").html(html);
    });


    //PARA VER DETALLE DE VIAJE
    $(".btn-view").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "viajes/crear/view/" + id,
                    type:"POST",
                    success: function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });


    //PARA VER DETALLE DE Familia
    $(".btn-view-familia").on("click", function(){
            var idfamilia = $(this).val();
            $.ajax({
                    url: base_url + "articulos/familias/view/" + idfamilia,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });

    //PARA VER DETALLE foto_articulo
    $(".btn-view-det").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "compras/ordenes/view/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });


    //PARA VER DETALLE ORDEN
    $(".btn-view-det_orden").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "compras/ordenes/view2/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }

            });
    });


    //PARA VER DETALLE DE Proveedor
    $(".btn-view-prove").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "proveedor/proveedor/view/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });


    //VER DETALLE DE CATEGORIA
    $(".btn-view-categoria").on("click", function(){
            var idcat = $(this).val();
            $.ajax({
                    url: base_url + "articulos/categorias/view/" + idcat,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });


    //DETALLE DE ARTICULO
    $(".btn-view-articulo").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "articulos/articulos/view/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });


    //DETALLE DE PRESUPUESTO
    $(".btn-view-presupuesto").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "articulos/presupuesto/view/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });


    //DETALLE DE ORDEN
    $(".btn-view-orden").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "compras/ordenes/view/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });


    //VER   USUARIO
    $(".btn-view-user").on("click", function(){
            var id = $(this).val();
            $.ajax({
                    url: base_url + "admin/usuarios/view/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#modal-default .modal-body").html(resp);
                        //alert(resp);
                    }
            });
    });
    

    $('#example1').DataTable({
            language: {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No se encontraron resultados en su busqueda",
                    "searchPlaceholder": "Buscar registros",
                    "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                    "infoEmpty": "No existen registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
            }
    });

	  $('.sidebar-menu').tree();
})

    $(document).on('click', '.add', function() {
            $('#modal-default').val();
    });

    
    ///////// INICIA GRAFICA 1 //////////////
    
    var base_url = "<?php echo base_url();?>";
    var viaje = 0;
    datagrafico(base_url, viaje);
    $("#viaje").on("change", function() {
            viaje = $(this).val();
            datagrafico(base_url, viaje);
    });

    function datagrafico(base_url, viaje) {
            $.ajax({
                    url: base_url + "Dashboard/getData",
                    type: "POST",
                    data: {
                        viaje: viaje
                    },
                    dataType: "json",
                    success: function(data) {
                        var nom = new Array();
                        var temp_amb = new Array();
                        var temp_suelo = new Array();
                        $.each(data, function(key, value) {
                              nom.push(value.hora);
                              valor = Number(value.temp_amb);
                              temp_amb.push(valor);
                              valor2 = Number(value.temp_suelo);
                              temp_suelo.push(valor2);
                        });
                        graficar(nom,temp_amb,temp_suelo,viaje);
                    }
            });
    }

    function graficar(nom,temp_amb,temp_suelo,viaje){
                Highcharts.chart('grafico', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'MONITOREO DE VARIABLES CLIMÁTICAS'
                    },
                    subtitle: {
                        text: 'TEMPERATURA/TIEMPO'
                    },
                    xAxis: {
                        categories: nom,
                        crosshair: true,
                        title: {
                              text: 'HORA DE CAPTURA'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                              text: 'INFORMACIÓN'
                        }
                    },
              /*      exporting: {
                        buttons:{
                            contextButton:{
                                menuItems: options
                            }
                        }
                    }, */
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                     '<td style="padding:0"><b>{point.y:.1f} °C</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                              pointPadding: 0.2,
                              borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'AMBIENTE',
                        data: temp_amb
                    },       
                    {
                        name: 'SUELO',
                        data: temp_suelo
                    }]
            });
        
      /*  $('#exportExcel').click(function(){
            var chart1 = $('#grafico').highcharts();
            var chart = Object.assign(chart1);
            
            chart.exportChartLocal({ type: 'application/vnd.ms-excel'});
        }); */
    }

    //////////// INICIA GRAFICA 2 /////////////////
    
    var base_url = "<?php echo base_url();?>";
    var viaje = 0;
    datagrafico2(base_url, viaje);
    $("#viaje2").on("change", function() {
            viaje = $(this).val();
            datagrafico2(base_url, viaje);
    });
    
    function datagrafico2(base_url, viaje) {
            $.ajax({
                    url: base_url + "Dashboard/getData2",
                    type: "POST",
                    data: {
                        viaje: viaje
                    },
                    dataType: "json",
                    success: function(data) {
                        var nom = new Array();
                        var hume_amb = new Array();
                        var hume_suelo = new Array();
                        $.each(data, function(key, value) {
                              nom.push(value.hora);
                              valor = Number(value.hume_amb);
                              hume_amb.push(valor);
                              valor2 = Number(value.hume_suelo);
                              hume_suelo.push(valor2);
                        });
                        graficar2(nom,hume_amb,hume_suelo,viaje);
                    }
            });
    }

    function graficar2(nom,hume_amb,hume_suelo,viaje){
            Highcharts.chart('grafico2', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'MONITOREO DE VARIABLES CLIMÁTICAS'
                    },
                    subtitle: {
                        text: 'HUMEDAD/TIEMPO'
                    },
                    xAxis: {
                        categories: nom,
                        crosshair: true,
                        title: {
                              text: 'HORA DE CAPTURA'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                              text: 'INFORMACIÓN'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                     '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                              pointPadding: 0.2,
                              borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'AMBIENTE',
                        data: hume_amb
                    },       
                    {
                        name: 'SUELO',
                        data: hume_suelo
                    }]
            });
    }
</script>

<script>
$(document).ready(function() {
    // Basic
    $('.dropify').dropify({
            messages: {
                    default: 'Seleccione la imagen',
                    replace: 'De click para reemplazar',
                    remove: 'Eliminar',
                    error: 'Ups, ocurrio un error'
            },
            error: {
                    'fileSize': 'La imagen es muy pesada ({{ value }} max).',
                    'minWidth': 'The image width is too small ({{ value }}}px min).',
                    'maxWidth': 'The image width is too big ({{ value }}}px max).',
                    'minHeight': 'The image height is too small ({{ value }}}px min).',
                    'maxHeight': 'The image height is too big ({{ value }}px max).',
                    'imageFormat': 'El formato de imagen no está permitido ({{ value }} only).',
                    'fileExtension': 'La extension de la imagen no está permitido ({{ value }}).',
            }
    });

    $('.dropify2').dropify({
            messages: {
                    default: 'Seleccione un archivo XLS',
                    replace: 'De click para reemplazar',
                    remove: 'Eliminar',
                    error: 'Ups, ocurrio un error'
            },
            error: {
                    'fileSize': 'La imagen es muy pesada ({{ value }} max).',
                    'minWidth': 'The image width is too small ({{ value }}}px min).',
                    'maxWidth': 'The image width is too big ({{ value }}}px max).',
                    'minHeight': 'The image height is too small ({{ value }}}px min).',
                    'maxHeight': 'The image height is too big ({{ value }}px max).',
                    'imageFormat': 'El formato de imagen no está permitido ({{ value }} only).',
                    'fileExtension': 'La extension del archivo no está permitido ({{ value }}).',
            }
    });

});
</script>

<script>
    var base_url= "<?php echo base_url();?>";
    jQuery(document).ready(function() {
		          var data = {viaje:"0", dispositivo:"0", prove: "0"};
		          generateOrderTable(data);
	  });

	  // render date datewise
	  jQuery(document).on('click','#filtro', function(){
		          var viaje = jQuery('#viaje').val();
		          var dispositivo = jQuery('#dispositivo').val();
		          var prove = jQuery('#prove').val();
		          var data = {viaje:viaje, dispositivo:dispositivo, prove:prove};
		          generateOrderTable(data);
	  });


    $(".btn-buscar1").on("click", function(){
            var data = {viaje:"0", dispositivo:"0", prove: "0"};
            generateOrderTable(data);
    });
    
	   // generate Order Table
	   function generateOrderTable(element){
		          $.ajax({
                    url:  base_url + '/compras/ordenes/buscador',
			              data: {'viaje' : element.viaje , 'dispositivo' : element.dispositivo, 'prove' : element.prove},
			              type: 'POST',
			              dataType: 'json',
                    beforeSend: function () {
				                    jQuery('#render-list-of-order').html('<div class="text-center mrgA padA"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
			              },
			              success: function (registros) {
                    dataset1 = new Array(registros.length);
                    for (var i = 0; i < registros.length; i++) {
		                      dataset1[i] = new Array(14);
		                      for (var j = 0; j < 14; j++) {
                              if (j == 0) {
                                  dataset1[i][j] = registros[i]['id_orden'];
                              }else if (j == 1) {
                                  dataset1[i][j] = registros[i]['descripcion'];
                              }else if (j == 2) {
                                  dataset1[i][j] = registros[i]['fecha'];
                              }else if (j == 3) {
                                  dataset1[i][j] = registros[i]['ubi'];
                              }else if (j == 4) {
                                  /*if (registros[i]['id_prove'] === null) {
                                      dataset1[i][j] = registros[i]['nombre_prove']+"  "+"<a href='<?php echo base_url()?>proveedor/proveedor/edit/"+registros[i]['id_proveedor']+"a"+registros[i]['id_dispositivo']+"' class='btn btn-primary'><span class='fa fa-pencil'></span></a>";
                                  }else {
                                      dataset1[i][j] = registros[i]['nombre_prove'];
                                  }*/
                                  dataset1[i][j] = registros[i]['cant_art'];
                              }else if (j == 5) {
                                  dataset1[i][j] = registros[i]['pzs_tot'];
                              }else if (j == 6) {
                                  dataset1[i][j] = registros[i]['cost_tot'];
                              }else if (j == 7) {
                                  dataset1[i][j] = registros[i]['tiempo_entrega']+" días";
                              }else if (j == 8) {
                                  dataset1[i][j] = registros[i]['fecha_contrato'];
                              }else if (j == 9) {
                                if (registros[i]['estado'] === '1') {
                                    var estado = "<span class='label label-success'>Autorizada</span>";
                                }else if (registros[i]['estado'] === '2'){
                                    var estado = "<span class='label label-warning'>Pendiente</span>";
                                }else if (registros[i]['estado'] === '3'){
                                    var estado = "<span class='label label-primary'>En fabricación</span>";
                                }else if (registros[i]['estado'] === '4'){
                                    var estado = "<span class='label' style='background: #828282;'>Recepcionado</span>";
                                }else if (registros[i]['estado'] === '5'){
                                    var estado = "<span class='label' style='background: #EC7C26;'>En transito</span>";
                                }else if (registros[i]['estado'] === '6'){
                                    var estado = "<span class='label label-success'>En almacen</span>";
                                }else {
                                    var estado = "<span class='label label-danger'>Cancelada</span>";
                                }
                                dataset1[i][j] = estado;
                              }else if (j == 10) {
                                dataset1[i][j] = registros[i]['fecha_entrega'];
                              }else if (j == 11) {
                                if (registros[i]['histo'] > '1') {
                                    var estado2 = "<span class='label label-success'>SI</span>";
                                }else {
                                    var estado2 = "<span class='label label-danger'>NO</span>";
                                }
                                  dataset1[i][j] = estado2;
                              }else if (j == 12) {
                                var a = '"btn btn-success btn-remove2"';
                                dataset1[i][j] = "<div class='btn-group'><a href='<?php echo base_url()?>compras/ordenes/fecord/"+registros[i]['id_orden']+"a"+registros[i]['id_dispositivo']+"a"+registros[i]['id_viaje']+"' class='btn btn-warning'><span class='fa fa-pencil'></span></a><a href='<?php echo base_url()?>compras/ordenes/detalle/"+registros[i]['id_orden']+"a"+registros[i]['id_dispositivo']+"a"+registros[i]['id_viaje']+"' class='btn btn-primary'><span class='fa fa-eye'></span></a><a href='<?php echo base_url()?>compras/ordenes/check/"+registros[i]['id_orden']+"a"+registros[i]['id_dispositivo']+"a"+registros[i]['id_viaje']+"' class="+a+"><span class='fa fa-check'></span></a><a href='<?php echo base_url()?>compras/ordenes/delete/"+registros[i]['id_orden']+"a"+registros[i]['id_dispositivo']+"a"+registros[i]['id_viaje']+"' class='btn btn-danger btn-remove1'><span class='fa fa-remove'></span></a></div>";

                                //<a href='<//?php echo base_url()?>compras/ordenes/fecord/"+registros[i]['id_orden']+"a"+registros[i]['id_dispositivo']+"a"+registros[i]['id_viaje']+"' class='btn btn-warning'><span class='fa fa-pencil'></span></a>
                                //<button type='button' class='btn btn-view-ord' data-toggle='modal' data-target='#modal-default' value='"+registros[i]['id_orden']+"a"+registros[i]['id_dispositivo']+"a"+registros[i]['id_viaje']+"'><span class='fa fa-pencil'></span></button>
                              }
		                      }
                    }

				            var dataTable='<table id="example" class="table display nowrap responsive" width="100%" data-scroll-x="true"><thead><tr><th>#</th><th>Descrip.</th><th>Fecha</th><th>Proveedor</th><th>#Art.</th><th>Pzs_tot</th><th>MontoT</th><th>Entrega</th><th>FecCont</th><th>Status</th><th>FecEnt</th><th>Ant</th><th>Opciones</th></tr></thead></table>';
				            jQuery('#render-list-of-order').html(dataTable);
			              $('#example').DataTable({
                        //data: html.data,
                        language: {
                              "lengthMenu": "Mostrar _MENU_ registros por pagina",
                              "zeroRecords": "No se encontraron resultados en su busqueda",
                              "searchPlaceholder": "Buscar registros",
                              "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                              "infoEmpty": "No existen registros",
                              "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                              "search": "Buscar:",
                              "paginate": {
                                  "first": "Primero",
                                  "last": "Último",
                                  "next": "Siguiente",
                                  "previous": "Anterior"
                              },
                        },
                        data: dataset1,
					              "bPaginate": true,
					              "bLengthChange": true,
					              "bFilter": true,
					              "bInfo": true,
					              "bAutoWidth": true,

                        columns: [
                              { "title": "#" },
                              { "title": "Descrip." },
                              { "title": "Fecha" },
                              { "title": "Proveedor" },
                              { "title": "#Art." },
                              { "title": "Pzs_tot" },
                              { "title": "MontoT" },
                              { "title": "Entrega" },
                              { "title": "FecCont" },
                              { "title": "Status" },
                              { "title": "FecEnt" },
                              { "title": "Ant" },
                              { "title": "Opciones" },

                        ],

                        "order": [[ 0, "desc" ]]
				            });

			              },error:function(){
                        <?php if ($this->session->userdata("rol") == 1): ?>
                              swal("ERROR","Es necesario seleccionar viaje","error");
                        <?php endif; ?>
                        var data = {viaje:"0", dispositivo:"0", prove: "0"};
                        generateOrderTable(data);
                    }
		          });
	   }

</script>

</body>
</html>
