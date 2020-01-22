<?php 
 session_name('ACTUALIZAR_APLICATIVO') ;
 session_start();
 date_default_timezone_set('America/Lima');
  if(!isset($_SESSION["idusuario"])){
  echo "NO TIENE PERMITIDO EL ACCESO";
  header("location:.");
  exit;
 }
 else{
  $idusuario=$_SESSION["idusuario"];
  $nombre_usuario=$_SESSION["usuario"];
  $idrol=$_SESSION["idrol"];
  $nombre_rol=$_SESSION['Nombre_rol'];
  $idtienda=$_SESSION['idtienda'];


 }


 ?>





<!DOCTYPE html>
<html lang="en">
<?php include 'Vendor/Config.php';?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aplicativos</title>
<?php Configuration\Inicio::Style(); ?>
</head>
<body>
<?php Configuration\Inicio::Modal(); ?>	
<?php Configuration\Inicio::Loader(); ?>








    <div class="container">


        <div class="table-wrapper">
         <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Encuestas Evaluacion </h2>
          </div>
           <div class="col-sm-6">
             

                <a href="Controller/Logout" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Cerrar Sesion</span></a>            
           </div>
                 </div>
          </div>        

        </div>



<!--
   <section class="row">
      <div class="col-md-12">
        <h1 class="text-center">Formato de Encuesta de Satisfacción.</h1>
        <p class="text-center">ESE Hospital San Rafael de Girardota.</p>
      </div>
    </section>
    <hr><br />
    <section class="row">
      <section class="col-md-12">
        <h3>Datos basicos</h3>
        <p></p>
      </section>
    </section>
    <section class="row">
      <section class="col-md-12">
        <section class="row">
          <div class="col-md-4">
            <label for="tipoAtencion">Tipo de Atención: *</label>
            <select class="form-control" id="tipoAtencion">
            <option value="ce">Consulta Externa</option>
            <option value="farm">Farmacia</option>
            <option value="fisi">Fisioterapia</option>
            <option value="fo">Fo</option>
            <option value="hosp">Hospitalizació</option>
            <option value="odon">Odontologia</option>
            <option value="pyp">Promoción y Prevención</option>
            <option value="rx">Rayos X</option>
            <option value="urge">Urgencias</option>
          </select>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="fechaActual">Fecha Actual: *</label>
              <input type="date" class="form-control" id="fechaActual" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="fechaActencion">Fecha Atención: *</label>
              <input type="date" class="form-control" id="fechaAtencion" required>
            </div>
          </div>
        </section>
        <section class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="nombreCompleto">Nombre Compelto: *</label>
              <input type="text" class="form-control" id="nombreCompleto" maxlength="128" placeholder="Nombre Compelto" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form_group">
              <label for="edadEncuestado">Edad: *</label>
              <input type="number" class="form-control" id="edadEncuestado" placeholder="Edad" maxlength="3" required/>
            </div>
          </div>
        </section>
        <section class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="idIdentificacion">Identificación: *</label>
              <input type="number" id="idIdentificacion" class="form-control" placeholder="Numero de Identificación" maxlength="15" required/>
            </div>
          </div>
          <div class="col-md-4">
            <label for="telefono">Telefono: *</label>
            <input type="text" class="form-control" id="telefono" placeholder="Numero Telefonico" maxlength="12" required/>
          </div>
          <div class="col-md-4">
            <label for="epsPaciente">EPS: *</label>
            <input type="text" class="form-control" id="epsPaciente" placeholder "EPS del Paciente" required />
          </div>
        </section>
      </section>
    </section>
    <hr />
-->

    	       
        <div class="table-wrapper context">
            

        </div>
    </div>
<?php Configuration\Inicio::Javascript(); ?>
</body>
<script>	

$(document).ready(function(){
Load_Data_Inicio();
//Load_Canales();
//Load_EDICION();
//Load_Grupo();




});


function Load_Data_Inicio(){

    $http="REQUEST";$finicio="<?php echo date('Y-m-d')  ?>";
    $ffin="<?php echo date('Y-m-d')  ?>";
      objDatosColumna= new Array();var DATA=[];
      item = {};
      item ["finicio"]=$finicio;
     item ["ffin"] =$ffin;
     item ["TIENDA"] ="<?php echo $idtienda  ?>";   
    item ["REQUEST"] =$http;
    DATA.push(item);
      //Testeo 
   console.log(DATA);
   SEND_DATA =new FormData();
   INFO=JSON.stringify(DATA);
   SEND_DATA.append('JSON_SEARCH_EVALUACION_INICIO',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=Search_Inicio_evaluacion",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
              //$("#loader-bg").show();
              $("#preloader").show();
           },

         success:function(data){          
             //$("#loader-bg").hide();
             $("#preloader").hide();
            // alert(data.trim());
            

             //FELECTRONICA_CONSULTAR_DOCUMENTO();
             $(".context").html(data.trim());
                   
          }

         });

}





function seleccionar_radio($val){

  $ok=$($val).val().split("-");

// alert($ok[0]);
// return;
 
  if($ok[0]!=5){

$('#observacion-'+$ok[1]).show();
  }else{
 $('#observacion-'+$ok[1]).hide();   
  }
  


//$('#observacion-'+$val).collapse();

 //$('#observacion-'+$val).collapse({ 'toggle': false }).collapse('hide');
  //var isExpanded = !$('#observacion-'+$val).hasClass("Aparecer");
  /*
  $('#observacion-'+$val).toggleClass("Aparecer", isExpanded);
        if (!isExpanded) {
            $("div.inbox").collapse("hide");
        }

*/
 }

































function Open_Modal_New_Pedido(){

	$("#addNewPedido").modal("show");
}
function Cancelar_Pedido(ok){
  $("#Flag_force").val(ok);
  $("#Cancelar_Pedido").modal("show");

}

function Atender_Pedido(ok){
  $("#Flag_force").val(ok);
  $("#Confirmar_Atencion").modal("show");

}




$( "#Npedido-Inicio" ).keypress(function( event ) {
  if ( event.which == 13 ) {
     Crear_Pedido();
  }
  
});
$( "#Select-Canal-Venta-Inicio" ).keypress(function( event ) {
  if ( event.which == 13 ) {
     Crear_Pedido();
  }
  
});

    function convertir_numero(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}



function Crear_PREGUNTA(){


      $http="REQUEST";
      $String=$("#Encuesta-Descripcion").val();
if($String.length>0){

      $edicion=$("#Select-Encuesta-Edicion").val();
      $grupo=$("#Select-Encuesta-Grupo").val();



      objDatosColumna= new Array();
      var DATA=[];
      item = {};
      item ["REQUEST"] =$http;
      item ["PREGUNTA"] =$String;
      item ["EDICION"] =$edicion
      item ["GRUPO"] =$grupo;
      item ["USER"] ="<?php echo $idusuario  ?>";
      item ["TIENDA"] ="<?php echo $idtienda  ?>";
      DATA.push(item);
        //Testeo 
       //console.log(DATA);
     
     SEND_DATA =new FormData();
     INFO=JSON.stringify(DATA);
     SEND_DATA.append('CREATE_PREGUNTA',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=CREATE_PREGUNTA",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
            
              $("#preloader").show();
           },

         success:function(data){          
           
             $("#preloader").hide();

            // alert(data.trim());

             Load_Data_Inicio();
             $("#Npedido-Inicio").val("");
             $("#Npedido-Inicio").focus();

            

     
          }

         });

  }else{
    alert('No se Permite Campo Vacio');
}

}





function Eliminar_Pedido(){


      $http="REQUEST";
      $String=$("#Cancelar_Motivo").val();
if($String.length>0){

      $Pedido=$("#Flag_force").val();
      //alert($String);
      //return;
      objDatosColumna= new Array();
      var DATA=[];
      item = {};
      item ["REQUEST"] =$http;
      item ["PEDIDO"] =$Pedido;
      item ["MOTIVO"] =$String;
      item ["USER"] ="<?php echo $idusuario  ?>";
      item ["TIENDA"] ="<?php echo $idtienda  ?>";
      DATA.push(item);
        //Testeo 
       //console.log(DATA);
     
     SEND_DATA =new FormData();
     INFO=JSON.stringify(DATA);
     SEND_DATA.append('CANCELAR_PEDIDO',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=CANCELAR_PEDIDO",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
            
              $("#preloader").show();
           },

         success:function(data){          
           
             $("#preloader").hide();
             $("#Cancelar_Pedido").modal("hide");
             //alert(data.trim());
             Load_Data_Inicio();
             

            

     
          }

         });

  }else{
    alert('No se Permite Campo Vacio');
}

}





function Confirmar_Pedido(ok){
      $http="REQUEST";
      objDatosColumna= new Array();

      $String=$("#NREFERENCIA-Inicio").val();
if($String.length>0){

      var DATA=[];
      item = {};
      item ["REQUEST"] =$http;
      item ["PEDIDO"] =$("#Flag_force").val();
      item ["REFERENCIA"] =$String;
      item ["USER"] ="<?php echo $idusuario  ?>";
      item ["TIENDA"] ="<?php echo $idtienda  ?>";
      DATA.push(item);
        //Testeo 
       //console.log(DATA);
     SEND_DATA =new FormData();
     INFO=JSON.stringify(DATA);
     SEND_DATA.append('CONFIRMAR_PEDIDO',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=CONFIRMAR_PEDIDO",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
            
              $("#preloader").show();
           },

         success:function(data){          
           
             $("#preloader").hide();
             $("#Confirmar_Atencion").modal("hide");
             //alert(data.trim());
             Load_Data_Inicio();
             

            

     
          }

         });

 
 }
else{
  alert('No se Permite Campo Vacio');
}

}




function Load_Canales(){

      $http="REQUEST";
      objDatosColumna= new Array();var DATA=[];
      item = {};
      item ["REQUEST"] =$http;
      item ["TIENDA"] ="<?php echo $idtienda  ?>";
      DATA.push(item);
     
     SEND_DATA =new FormData();
     INFO=JSON.stringify(DATA);
     SEND_DATA.append('APPEND_LOAD_CANALES',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=Get_Canales",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
              //$("#loader-bg").show();
              $("#preloader").show();
           },

         success:function(data){          
             //$("#loader-bg").hide();
             $("#preloader").hide();
            // alert(data.trim());

             $("#Select-Canal-Venta-Inicio").html(data.trim());
             $("#addNewPedido").modal("show");
          
                   
          }

         });


}














function Load_EDICION(){

      $http="REQUEST";
      objDatosColumna= new Array();var DATA=[];
      item = {};
      item ["REQUEST"] =$http;
      item ["TIENDA"] ="<?php echo $idtienda  ?>";
      DATA.push(item);
     
     SEND_DATA =new FormData();
     INFO=JSON.stringify(DATA);
     SEND_DATA.append('APPEND_LOAD_EDICION',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=Get_Edicion",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
              //$("#loader-bg").show();
              $("#preloader").show();
           },

         success:function(data){          
             //$("#loader-bg").hide();
             $("#preloader").hide();
            // alert(data.trim());

             $("#Select-Encuesta-Edicion").html(data.trim());
             $("#addNewPedido").modal("show");
          
                   
          }

         });


}

function Load_Grupo(){

      $http="REQUEST";
      objDatosColumna= new Array();var DATA=[];
      item = {};
      item ["REQUEST"] =$http;
      item ["TIENDA"] ="<?php echo $idtienda  ?>";
      DATA.push(item);
     
     SEND_DATA =new FormData();
     INFO=JSON.stringify(DATA);
     SEND_DATA.append('APPEND_LOAD_GRUPO',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=Get_Grupo",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
              //$("#loader-bg").show();
              $("#preloader").show();
           },

         success:function(data){          
             //$("#loader-bg").hide();
             $("#preloader").hide();
            // alert(data.trim());

             $("#Select-Encuesta-Grupo").html(data.trim());
             $("#addNewPedido").modal("show");

             Load_Ultima_Pregunta();
          
                   
          }

         });


}









function Load_Ultima_Pregunta(){

      $http="REQUEST";
      $grupo=$("#Select-Encuesta-Grupo").val();
      objDatosColumna= new Array();var DATA=[];
      item = {};
      item ["REQUEST"] =$http;
      item ["TIENDA"] ="<?php echo $idtienda  ?>";
      item ["GRUPO"] =$grupo;
      DATA.push(item);
     
     SEND_DATA =new FormData();
     INFO=JSON.stringify(DATA);
     SEND_DATA.append('APPEND_LOAD_LAST_PREGUNTA',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=Get_Last_Pregunta",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
              //$("#loader-bg").show();
              $("#preloader").show();
           },

         success:function(data){          
             //$("#loader-bg").hide();
             $("#preloader").hide();
             //alert(data.trim());
              $('#MOSTRAR-ULTIMA-PREGUNTA').html(data.trim());

             //$("#Select-Encuesta-Edicion").html(data.trim());
             //$("#addNewPedido").modal("show");
          
                   
          }

         });


}


</script>
</html>                                		                            