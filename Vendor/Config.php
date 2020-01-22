<?php 
//Rutas Principales
namespace Configuration;
class Inicio{ 
    static function Navbar() {
     return include('View/Components/Navbar.php');
    }  
    static function Sidebar() {
     return include('View/Components/Sidebar.php');
    }
    static function Modals() {
     return include('View/Components/Modal.php');
    }
    static function Loader() {
     return include('View/Components/Loader.php');
    }

    static function Modal() {
     return include('View/Components/Modal.php');
    }
    static function Javascript() {
     return include('View/Components/Javascript.php');
    }
     static function Style() {
     return include('View/Components/Style.php');
    }   

}






class Navbar{ 
   static function MODULOS() {

      echo '<li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#MODAL-TOMA-PEDIDOS-VER-MESAS" onclick="MODULO_TOMA_PEDIDOS_MESAS();">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title" >MESAS</span>
            </a>
          </li>';


      echo '<li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#MODAL-TOMA-DE-PEDIDOS" onclick="MODULO_TOMA_PEDIDOS_CARGAR_FAMILIAS();">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title" >TOMA DE PEDIDOS SALON</span>
            </a>
          </li>';


     echo '
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-manteniance" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">MANTENIMIENTO</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-manteniance">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#" onclick="SIDEBAR_MANTENIANCE_FAMILIA();">FAMILIAS</a>

                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#" onclick="SIDEBAR_MANTENIANCE_CATEGORIA();">CATEGORIAS</a>

                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#" onclick="SIDEBAR_MANTENIANCE_MEDIDA();">MEDIDAS</a>

                </li>


                <li class="nav-item">
                  <a class="nav-link" href="#" onclick="SIDEBAR_MANTENIANCE_PRODUCTO();">Productos</a>

                </li>



                <li class="nav-item">
                  <a class="nav-link" href="#" onclick="SIDEBAR_MANTENIANCE_PAQUETE();">Paquetes</a>

                </li>



              </ul>
            </div>
          </li>
              ';
    }  



}

class REACT{ 
   static function MODULES() {
   	echo '<script src="dist/modules/jquery.min.js"></script>';
    echo '<script src="dist/js/MODULOS/MANTENIMIENTO/familia.js"></script>';
    echo '<script src="dist/js/MODULOS/MANTENIMIENTO/categoria.js"></script>';
    echo '<script src="dist/js/MODULOS/MANTENIMIENTO/medida.js"></script>';
    echo '<script src="dist/js/MODULOS/MANTENIMIENTO/producto.js"></script>';
    echo '<script src="dist/js/MODULOS/MANTENIMIENTO/paquete.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>';
    echo '<script src="dist/js/MODULOS/TOMAPEDIDOS/tomapedidos.js"></script>';
    echo '<script src="dist/js/MODULOS/FELECTRONICA/inicio.js"></script>';
    }

   static function STYLESCSS(){
    	//Datatables	
   	echo '<link rel="stylesheet" href="dist/css/CORE/DATATABLES/dataTables.bootstrap4.min.css">';
    echo '<link rel="stylesheet" href="dist/css/CORE/DATATABLES/buttons.bootstrap4.min.css">';
       //SWEETALERT
    echo '<link rel="stylesheet" href="dist/css/CORE/SWEETALERT/sweetalert.css">';
    //datepicker
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">';

   }    

   static function LIBRERIASJS(){
    //datepciker
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>';
 	  //Datatables
   	echo ' <script src="dist/js/CORE/DATATABLES/jquery.dataTables.min.js"></script>
           <script src="dist/js/CORE/DATATABLES/dataTables.bootstrap4.min.js"></script>
            <!--botones DataTables--> 
            <script src="dist/js/CORE/DATATABLES/dataTables.buttons.min.js"></script>
            <script src="dist/js/CORE/DATATABLES/buttons.bootstrap4.js"></script>
            <!--Libreria para exportar Excel-->
            <script src="dist/js/CORE/DATATABLES/jszip.min.js"></script>
            <!--Librerias para exportar PDF-->
            <script src="dist/js/CORE/DATATABLES/pdfmake.min.js"></script>
            <script src="dist/js/CORE/DATATABLES/vfs_fonts.js"></script>
            <!--Librerias para botones de exportación-->
            <script src="dist/js/CORE/DATATABLES/buttons.html5.min.js"></script>
            <script src="dist/js/CORE/DATATABLES/buttons.print.min.js"></script>
            <script src="dist/js/CORE/DATATABLES/buttons.colVis.min.js"></script>
            <script src="dist/js/CORE/DATATABLES/dataTables.fixedColumns.min.js"></script>';
    //HighCharts
   echo '<script src="dist/js/CORE/REPORTES/highcharts.js"></script>
          <script src="dist/js/CORE/REPORTES/exporting.js"></script>
          <script src="dist/js/CORE/REPORTES/data.js"></script>
          <script src="dist/js/CORE/REPORTES/drilldown.js"></script>';
   //SWEETALERT
   
   echo '<script src="dist/js/CORE/SWEETALERT/sweetalert.js"></script>';                


   }    



}








define("RUTA_NAVBAR","Vista/COMPONENTS/navbar.php");
define("RUTA_SIDEBAR","Vista/COMPONENTS/sidebar.php");
define("PASSWORD_SVR_CENTRAL","Villachicken2016");
define("BD_SVR_CENTRAL","VILLACHICKEN_CALLCENTER");



//CONEXION  CENTRAL DE FACTURACION
define("IP_SVR_FAC","192.168.1.100");
define("USUARIO_SVR_FAC","sa");
define("PASSWORD_SVR_FAC","Villachicken2016");
define("BD_SVR_FAC","tgCallCenter");



 ?>