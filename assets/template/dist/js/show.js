//PARA AGREGAR UN VIAJE NUEVO

function(){
$('#add').submit(function(ev){
  ev.preventDefault();
  //var id = $(this).parents('tr').find('td:first').text();
  //var id = $(this).attr('data-id');
var id = (document.getElementById("id").value);
var fecsalida = (document.getElementById("fecsalida").value);
var fecentrada = (document.getElementById("fecentrada").value);
var descripcion = (document.getElementById("descripcion").value);

  var self = this;
        //ajax....
        $.ajax({
         type: "POST",
         url:  '/michelle/viajes/crear/store',
         data: {'id':id,'fecsalida':fecsalida,'fecentrada':fecentrada,'descripcion':descripcion},
         success: function(){

           swal({
            title: "¡Hecho!",
         		text: "Viaje creado satisfactoriament.",
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
})
})
();
