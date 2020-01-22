<?php 
require __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('America/Lima');
$instruccion=isset($_GET['p'])?$_GET['p']:'';
use ProjectWCG\View\Basic\Inicio;

session_name('ACTUALIZAR_APLICATIVO') ;
SESSION_START();

$errores = array();

if(isset($_POST['user']) && isset($_POST['password']) )
{
   if(empty($_POST['user'])  || empty($_POST['password']))
   {

      $errores[] = "El Usuario y Password no deben ser vacios <br>";
   }
   else
   { 
         $REQ_USER=$_POST['user'];
         $REQ_PASS=$_POST['password'];

          // Queremos que el nombre de usuario sólo tenga letras
        if (!preg_match("/^[a-zA-Z]+/", $REQ_USER) && !preg_match("/^[a-zA-Z]+/", $REQ_PASS) ) {

               $errores[] = "No se admiten caracteres <br>";

        }
      

   }





    if(empty($errores)){  

    	$ACCION=$_REQUEST['ingresar'];

    	$REQ_USER=$_POST['user'];
         $REQ_PASS=$_POST['password'];
          

         $Model_Inicio->ingresar($REQ_USER,$REQ_PASS,$ACCION); 
    	

              
   

    
    }// fin empty errores
    
    else{
      foreach ($errores as $key) {
        echo "".$key."</br>";

        //echo "ok";
        # code...
      }
      //var_dump($errores);
    }




}















  
   







 ?>