<!DOCTYPE html>
<html lang="en">
<?php include 'Vendor/Config.php';?>
<head>
    <title>Datta Able Free Bootstrap 4 Admin Template</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">


     <?php Configuration\Inicio::Style(); ?>


</head>

<body >
    <?php Configuration\Inicio::Modal(); ?>
    <!-- [ Pre-loader ] start -->
   <?php Configuration\Inicio::Loader(); ?>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
   <?php Configuration\Inicio::Sidebar(); ?>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
   <?php Configuration\Inicio::Navbar(); ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body" style="zoom:95%">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row context">




                                
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                        <!-- [ En Page-Wrapper ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

   
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <?php Configuration\Inicio::Javascript(); ?>
    <script>
        
        $(document).ready(function(){

      // alert('ok');


    
      
        Inicio01_Search_Comprobantes_INICIO();



        });



        /***********************************************************FELECTRONICA V1.0.0 ***********************************************/

function Inicio01_Search_Comprobantes(){

 $http="REQUEST";$finicio=$("#Inicio01-Finicio").val();$ffin=$("#Inicio01-Ffin").val();
 objDatosColumna= new Array();var DATA=[];
    item = {};
    item ["finicio"]=$finicio;
    item ["ffin"] =$ffin;   
    item ["REQUEST"] =$http;
    DATA.push(item);
      //Testeo 
   console.log(DATA);
   SEND_DATA =new FormData();
   INFO=JSON.stringify(DATA);
   SEND_DATA.append('JSON_SEARCH_COMPROBANTES_INICIO',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=Search_Comprobantes_Inicio",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
              $("#loader-bg").show();
              $("#preloader").show();
           },

         success:function(data){          
             $("#loader-bg").hide();
             $("#preloader").hide();
            

             //FELECTRONICA_CONSULTAR_DOCUMENTO();
             $(".context").html(data.trim());
                   
          }

         });

}



function Inicio01_Search_Comprobantes_INICIO(){

 $http="REQUEST";$finicio="<?php echo date('Y-m-d')  ?>";$ffin="<?php echo date('Y-m-d')  ?>";
 objDatosColumna= new Array();var DATA=[];
    item = {};
    item ["finicio"]=$finicio;
    item ["ffin"] =$ffin;   
    item ["REQUEST"] =$http;
    DATA.push(item);
      //Testeo 
   console.log(DATA);
   SEND_DATA =new FormData();
   INFO=JSON.stringify(DATA);
   SEND_DATA.append('JSON_SEARCH_COMPROBANTES_INICIO',INFO);


          $.ajax({
              async: true,
              type:"POST",
              url:"Controller/principal?p=Search_Comprobantes_Inicio",
              data:SEND_DATA,
              cache: false,
              processData:false,
              contentType:false,
                    

           beforeSend: function() {      
              $("#loader-bg").show();
              $("#preloader").show();
           },

         success:function(data){          
             $("#loader-bg").hide();
             $("#preloader").hide();
            

             //FELECTRONICA_CONSULTAR_DOCUMENTO();
             $(".context").html(data.trim());
                   
          }

         });

}


function enviar_sunat(){
    var total=0
    var cadena="";
    var c=0;
    var NuevaFila="";
    var validarvacio=false;
    var contadorcheck=0;
    var cantidadesc=0;
   objDatosColumna= new Array();
   var DATA=[];
   var finicio=$("#r-inicio").val();
   var ffinal= $("#r-final").val();
  for(var i=0; i<=5000;i++)
  {
       if($('#cuota'+i).is(':checked'))
       {
            //var cantidad_productos=document.getElementById('cuota-cantidad'+i).value;
           contadorcheck=1;
            var cadena=document.getElementById('cuota'+i).value;
            var elem=cadena.split('**');
            var referencia=elem[0];
            var tipo=elem[1];
            var id=elem[2];

            
             item = {};
             item ["REFERENCIA"] = referencia;
             item ["ID"]  = id;
             item ["TIPO"]  = tipo; 
             DATA.push(item);
             cantidadesc++;

      }

  
  }
  

if(contadorcheck==0){

  alert('No seleccionaste nada');
}else{
  //Testeo 
   console.log(DATA);
   SEND_DATA =new FormData();
   INFO=JSON.stringify(DATA);
   SEND_DATA.append('Comprobantes_Pendientes',INFO);
  alert('Listo');
//comprobar internet
                
                   $.ajax({
                    async: true,
                    type: "POST",
                    url: "Controller/principal?p=send_billings_pendientes",
                    data:SEND_DATA,
                    cache: false,
                    processData:false,
                    contentType:false,
                    beforeSend: function() {
                        $("#preloader").show();
                     },
                    success: function(data) {                             
                        $("#preloader").hide();
                        alert(data.trim());
                        Inicio01_Search_Comprobantes();
                        //buscar_reportes();
                          //toastr.success('Se envio a sunat', '', { positionClass: 'toast-bottom-right' });
                    }
            });



          
  
}// fin else

  
  
}// fin function 














 function check_todo(){
  if(document.getElementById('checkear_todo').checked==true){
     $('input[type=checkbox]').each(function(){
       this.checked=true;
     });
   }
  else
  {
     $('input[type=checkbox]').each(function(){
       this.checked=false;
     });

  }
}



function reporte_ver_pdf(valor){
 //var $ser = $(valor).parent().parent().find('td').eq(10).html();
  //var $cor = $(valor).parent().parent().find('td').eq(11).html();
  //var $tip = $(valor).parent().parent().find('td').eq(12).html();
  // var $estado = $(valor).parent().parent().find('td').eq(13).html();

  // var $ref=$(valor).parent().parent().find('td').eq(4).html();

  // alert($ref);
      // toastr.error('El Documento esta Eliminado', 'ERROR', { positionClass: 'toast-bottom-right' });



      // $("#pdf").attr("src","controller/facturacion?serie="+$ser+"&correlativo="+$cor+"&tipo="+$tip+"");

      $("#pdf").attr("src",valor);

                           // ?serie=0002&correlativo=00041875&tipo=01
                          $("#modal-mostrar-pdf").modal("show");


 




}  
    </script>

</body>
</html>
