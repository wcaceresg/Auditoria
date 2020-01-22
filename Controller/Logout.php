<?php 
date_default_timezone_set('America/Lima');
session_name('ACTUALIZAR_APLICATIVO') ;
session_start();
session_destroy();
header("location:../");
 ?>