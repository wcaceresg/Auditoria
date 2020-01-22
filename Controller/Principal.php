<?php 
require __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('America/Lima');
session_name('ACTUALIZAR_APLICATIVO') ;
session_start();
if(!isset($_SESSION["idusuario"])){
echo "<script>$('#SesionExpirada').modal('show');</script>";
exit;
}


$instruccion=isset($_GET['p'])?$_GET['p']:'';
//use ProjectWCG\Model\Basic\Conection;
//use ProjectWCG\Model\Inicio\General;
use ProjectWCG\View\Basic\Inicio;
//sleep(3);
/*MANTENIMIENTO  CATEGORIA */
if($instruccion=='Search_Comprobantes_Inicio'){

      if(isset($_POST['JSON_SEARCH_COMPROBANTES_INICIO']) )
      {           
           $datos = json_decode($_POST['JSON_SEARCH_COMPROBANTES_INICIO']);


           $Model_Inicio->getTableInicio($datos); 
      }else{

      }
   
 }



else if($instruccion=='Get_Edicion'){

      if(isset($_POST['APPEND_LOAD_EDICION']) )
      {           
           $datos = json_decode($_POST['APPEND_LOAD_EDICION']);


           $Model_Inicio->getEdicion($datos); 
      }else{

      }
   
 }


 else if($instruccion=='Get_Grupo'){

      if(isset($_POST['APPEND_LOAD_GRUPO']) )
      {           
           $datos = json_decode($_POST['APPEND_LOAD_GRUPO']);


           $Model_Inicio->Get_Grupo($datos); 
      }else{

      }
   
 }



else if($instruccion=='CREATE_PREGUNTA'){

      if(isset($_POST['CREATE_PREGUNTA']) )
      {           
           $datos = json_decode($_POST['CREATE_PREGUNTA']);


           $Model_Inicio->Create_pregunta($datos); 
      }else{

      }
   
 }


  else if($instruccion=='Get_Last_Pregunta'){

      if(isset($_POST['APPEND_LOAD_LAST_PREGUNTA']) )
      {           
           $datos = json_decode($_POST['APPEND_LOAD_LAST_PREGUNTA']);


           $Model_Inicio->Get_LAST_PREGUNTA($datos); 
      }else{

      }
   
 }




else if($instruccion=='Search_Inicio_evaluacion'){

      if(isset($_POST['JSON_SEARCH_EVALUACION_INICIO']) )
      {           
           $datos = json_decode($_POST['JSON_SEARCH_EVALUACION_INICIO']);


           $Model_Evaluar->getTableEvaluacion($datos); 
      }else{

      }
   
 }











































else if($instruccion=='Get_Canales'){

      if(isset($_POST['APPEND_LOAD_CANALES']) )
      {           
           $datos = json_decode($_POST['APPEND_LOAD_CANALES']);


           $Model_Inicio->getCanalVenta($datos); 
      }else{

      }
   
 }


else if($instruccion=='CREATE_PEDIDO'){

      if(isset($_POST['CREATE_PEDIDO']) )
      {           
           $datos = json_decode($_POST['CREATE_PEDIDO']);


           $Model_Inicio->Create_pedido($datos); 
      }else{

      }
   
 }

else if($instruccion=='CONFIRMAR_PEDIDO'){

      if(isset($_POST['CONFIRMAR_PEDIDO']) )
      {           
           $datos = json_decode($_POST['CONFIRMAR_PEDIDO']);


           $Model_Inicio->Confirmar_Pedido($datos); 
      }else{

      }
   
 }


else if($instruccion=='CANCELAR_PEDIDO'){

      if(isset($_POST['CANCELAR_PEDIDO']) )
      {           
           $datos = json_decode($_POST['CANCELAR_PEDIDO']);


           $Model_Inicio->Cancelar_Pedido($datos); 
      }else{

      }
   
 }


else if($instruccion=='send_billings_pendientes'){

      if(isset($_POST['Comprobantes_Pendientes']) )
      {           
           $datos = json_decode($_POST['Comprobantes_Pendientes']);


           $Model_Inicio->enviar_troncal_sunat_pendientes($datos); 
      }else{

      }
   
 }





 ?>