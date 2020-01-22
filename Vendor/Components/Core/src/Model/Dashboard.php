<?php 
/**
 * Created by WCaceres.
 * User: Wcaceres
 * Date: 07/08/2019
 * Time: 11:01.
 */
//namespace ProjectWCG\Model\Inicio;
use ProjectWCG\View\Basic\Inicio;
class General extends Conection{
  public $conexion;
  public $ruta1 = "../dist/RECURSOS/CATEGORIAS/";
  public $oficial = "dist/RECURSOS/CATEGORIAS/";   
  function __construct()
  {
     parent::__construct();
     $cn= new Conection();
     $this->conexion=$cn->getConnection();
   }


function Ingresar($usu,$pass,$accion){
if($accion =="ingresar"){
     $usuario=sha1($usu);
     $password=sha1($pass);
     $query_usuario="select u.idusuario,u.idrol,u.nombres,u.password,u.idtienda,r.descripcion as Nombre_rol from   Usuario u 
inner join Roles r on r.IdRol=u.idrol
 where u.usuario= ? and u.password=? and  u.estado=1
";

     $query=$this->conexion->prepare($query_usuario,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $query->bindParam(1,$usuario, PDO::PARAM_STR);
     $query->bindParam(2,$password, PDO::PARAM_STR);
     $query->execute();
     $query = $query->fetchAll();
    if(sizeof($query)>0){    
      foreach($query as $row){    
            $this->registrar_log($row['idusuario']); 
              //SESSION_START();
            $_SESSION['idusuario']=$row['idusuario'];
            $_SESSION['usuario']=$row['nombres'];
            $_SESSION['idrol']=$row['idrol'];
            $_SESSION['password']=$row['password'];
            $_SESSION['idtienda']=$row['idtienda'];
            $_SESSION['Nombre_rol']=$row['Nombre_rol'];
            echo "principal";
    }
  }else{
      echo "Credenciales Incorrectas";
    }
  
}


}
function registrar_log($idusuario){
    $ip=$this->obtener_client_usuario_reporte();
    $query_usuario="insert into User_log values (?,?,getdate(),1)";
     $query=$this->conexion->prepare($query_usuario,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $query->bindParam(1,$idusuario, PDO::PARAM_INT);
     $query->bindParam(2,$ip, PDO::PARAM_STR);  
     $query->execute();


}

function obtener_client_usuario_reporte() {
               $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }





 function getTableInicio($datos){
 


     $salida="";
     $query="

select E.Op,T.Tienda AS TIENDA ,EI.Descripcion as EDICION,E.Descripcion AS PREGUNTA,
CASE E.estado WHEN 0 THEN 'ANULADO' WHEN 1 then 'HABILITADO'  end as ESTADO_NOMBRE,
e.Estado as ESTADO,EG.Descripcion AS GRUPO
 from ENCUESTA_PREGUNTAS E
INNER JOIN ENCUESTA_EDICION EI  ON EI.IdEdicion=E.IdEdicion
INNER JOIN Tienda T ON T.idtienda=E.IdTienda
INNER JOIN ENCUESTA_GRUPO EG ON EG.IdGrupo=E.IdGrupo



 ";
     $this->conexion->beginTransaction();
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     //$ejecutar->bindParam(1, $datos['0']->TIENDA, PDO::PARAM_INT);
     //$ejecutar->bindParam(2, $datos['0']->finicio, PDO::PARAM_STR);
     //$ejecutar->bindParam(3, $datos['0']->ffin, PDO::PARAM_STR);
     

     $salida.=Inicio::HEADER($datos);
     $salida.=Inicio::PRE_TABLE();
     if($ejecutar->execute()){
          $DATA=$ejecutar->fetchall();
          $filas=$ejecutar->rowCount();
          if($filas>0){
               $C=1;
              foreach ($DATA as $key) {

                $salida.=Inicio::FILES_TABLE($key,$C);
               $C++; 
            }

          }else{
                //$salida.="No Existe Ninguna Categoria";
          }

          $salida.=Inicio::Transform_Table();

    $this->conexion->commit();
      
     }else{
               $salida.="No se Puede Conectar A La BD";
     }
  //$salida.=VIEW_MANTENIANCE_CATEGORIA\CATEGORY::GET_MODAL();   

   echo $salida;   

 }


function getCanalVenta($val){
     $salida="";
     $query="select * from CANAL_VENTA WHERE Estado=1 ";
     $this->conexion->beginTransaction();
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     //$ejecutar->bindParam(1, $val, PDO::PARAM_STR);
     if($ejecutar->execute()){
          $filas=$ejecutar->rowCount();
          if($filas>0){
              foreach ($ejecutar as $key) {
              $salida.=" <option value=".$key['IdCanal'].">".$key['Descripcion']."</option>";



              //$salida.="el nombre es".$key['idCategoria'];
               
            }

                

          }else{
                $salida.="No Existe Ninguna Categoria";
          }
     }else{
               $salida.="No se Puede Conectar A La BD";
     }


   $this->conexion->commit();
   echo $salida;   

 }


 function getEdicion($val){
     $salida="";
     $query="select * from ENCUESTA_EDICION WHERE Estado=1 ";
     $this->conexion->beginTransaction();
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     //$ejecutar->bindParam(1, $val, PDO::PARAM_STR);
     if($ejecutar->execute()){
          $filas=$ejecutar->rowCount();
          if($filas>0){
              foreach ($ejecutar as $key) {
              $salida.=" <option value=".$key['IdEdicion'].">".$key['Descripcion']."</option>";



              //$salida.="el nombre es".$key['idCategoria'];
               
            }

                

          }else{
                $salida.="No Existe Ninguna Categoria";
          }
     }else{
               $salida.="No se Puede Conectar A La BD";
     }


   $this->conexion->commit();
   echo $salida;   

 }


  function Get_Grupo($val){
     $salida="";
     $query="select * from ENCUESTA_GRUPO WHERE Estado=1 ";
     $this->conexion->beginTransaction();
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     //$ejecutar->bindParam(1, $val, PDO::PARAM_STR);
     if($ejecutar->execute()){
          $filas=$ejecutar->rowCount();
          if($filas>0){
              foreach ($ejecutar as $key) {
              $salida.=" <option value=".$key['IdGrupo'].">".$key['Descripcion']."</option>";



              //$salida.="el nombre es".$key['idCategoria'];
               
            }

                

          }else{
                $salida.="No Existe Ninguna Categoria";
          }
     }else{
               $salida.="No se Puede Conectar A La BD";
     }


   $this->conexion->commit();
   echo $salida;   

 }

function Create_pedido($datos){

 
     $salida="";
     $this->conexion->beginTransaction();
     $query="

IF NOT EXISTS(
Select IdAplicativo from APLICATIVOS_PEDIDOS where Nro_Pedido='".$datos['0']->NPEDIDO."' and IdTienda=".$datos['0']->TIENDA." AND Usuario_Creacion=".$datos['0']->USER." and Estado=1
 )

INSERT INTO APLICATIVOS_PEDIDOS(IdTienda,IdCanal,Nro_Pedido,Observaciones,Fecha_Creacion,Usuario_Creacion,Fecha_Modificacion,Usuario_Modificacion,Estado)
Values (?,?,?,NULL,GETDATE(),?,NULL,NULL,1)";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $ejecutar->bindParam(1, $datos['0']->TIENDA, PDO::PARAM_INT);  
      $ejecutar->bindParam(2, $datos['0']->CANAL, PDO::PARAM_INT);
      $ejecutar->bindParam(3, $datos['0']->NPEDIDO, PDO::PARAM_STR);
      $ejecutar->bindParam(4, $datos['0']->USER, PDO::PARAM_INT);
     //$ejecutar->bindParam(3, $datos['DESCRIPCION'], PDO::PARAM_STR);
     //$ejecutar->bindParam(4, $this->oficial, PDO::PARAM_STR);
     if($ejecutar->execute()){
               $salida.="SUCESSFULL";
     }else{
               $salida.="No se pudo Registrar La Categoria";
     }
     $this->conexion->commit();

   echo $salida;   

 }





function Create_pregunta($datos){

 
     $salida="";
     $this->conexion->beginTransaction();
     $query="

INSERT INTO ENCUESTA_PREGUNTAS(IdTienda,IdGrupo,IdEdicion,Descripcion,Observacion,Fecha_Creacion,Usuario_Creacion,Fecha_Modificacion,Usuario_Modificacion,Estado)

VALUES (?,?,?,?,NULL,GETDATE(),?,NULL,NULL,1)
";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $ejecutar->bindParam(1, $datos['0']->TIENDA, PDO::PARAM_INT);
      $ejecutar->bindParam(2, $datos['0']->GRUPO, PDO::PARAM_INT); 
      $ejecutar->bindParam(3, $datos['0']->EDICION, PDO::PARAM_INT);
      $ejecutar->bindParam(4, $datos['0']->PREGUNTA, PDO::PARAM_STR); 
      $ejecutar->bindParam(5, $datos['0']->USER, PDO::PARAM_INT);

    

     if($ejecutar->execute()){

        $OP=$this->conexion->lastInsertId();
        $this->conexion->commit();
        //echo  $OP;

         $this->Create_pregunta_DETALLE($OP); 


               $salida.="SUCESSFULL";
     }else{
               $salida.="No se pudo Registrar La Categoria";
     }
     //$this->conexion->commit();

   echo $salida;   

 }




 function Create_pregunta_DETALLE($op){

     $this->conexion->beginTransaction();
     $query="

insert INTO  ENCUESTA_PREGUNTAS_DETALLE

select ?,IdRespuesta,1 from ENCUESTA_REPUESTAS
";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $ejecutar->bindParam(1, $op, PDO::PARAM_INT);

     if($ejecutar->execute()){

        $OP=$this->conexion->lastInsertId(); 
     }else{    
     }
     $this->conexion->commit();
 }



  function Get_LAST_PREGUNTA($datos){
   

     $salida="";
     $query="select COUNT(*)+1 AS CONTADOR from ENCUESTA_PREGUNTAS WHERE IdGrupo=?";
     $this->conexion->beginTransaction();
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $datos['0']->GRUPO, PDO::PARAM_INT);
     if($ejecutar->execute()){
          $filas=$ejecutar->rowCount();
          if($filas>0){
              foreach ($ejecutar as $key) {
                        $salida.=$key['CONTADOR'];



              //$salida.="el nombre es".$key['idCategoria'];
               
            }

                

          }else{
                $salida.="No Existe Ninguna Categoria";
          }
     }else{
               $salida.="No se Puede Conectar A La BD";
     }


   $this->conexion->commit();
   echo $salida;   

 }




 function Cancelar_Pedido($datos){

 echo $datos['0']->PEDIDO;
     $salida="";
     $this->conexion->beginTransaction();
     $query="
UPDATE APLICATIVOS_PEDIDOS SET Fecha_Modificacion=GETDATE(),Estado=0,Usuario_Modificacion=?,Observaciones=? where IdAplicativo in (?)";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $ejecutar->bindParam(1, $datos['0']->USER, PDO::PARAM_INT);
      $ejecutar->bindParam(2, $datos['0']->MOTIVO, PDO::PARAM_STR);  
      $ejecutar->bindParam(3, $datos['0']->PEDIDO, PDO::PARAM_INT);

     //$ejecutar->bindParam(3, $datos['DESCRIPCION'], PDO::PARAM_STR);
     //$ejecutar->bindParam(4, $this->oficial, PDO::PARAM_STR);
     if($ejecutar->execute()){
               $salida.="SUCESSFULL";
     }else{
               $salida.="No se pudo Actualizar el Pedido";
     }
     $this->conexion->commit();

   echo $salida;   

 }


  function Confirmar_Pedido($datos){

 echo $datos['0']->PEDIDO;
     $salida="";
     $this->conexion->beginTransaction();
     $query="

IF NOT EXISTS(
Select IdAplicativo from APLICATIVOS_PEDIDOS where Referencia='".$datos['0']->REFERENCIA."' and IdTienda=".$datos['0']->TIENDA." AND Usuario_Creacion=".$datos['0']->USER." 
 )

UPDATE APLICATIVOS_PEDIDOS SET Referencia=?,Fecha_Aceptacion=GETDATE(),Estado=2,Usuario_Aceptacion=? where IdAplicativo in (?)";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $ejecutar->bindParam(1, $datos['0']->REFERENCIA, PDO::PARAM_STR);
      $ejecutar->bindParam(2, $datos['0']->USER, PDO::PARAM_INT);
      //$ejecutar->bindParam(2, $datos['0']->MOTIVO, PDO::PARAM_STR);  
      $ejecutar->bindParam(3, $datos['0']->PEDIDO, PDO::PARAM_INT);

     //$ejecutar->bindParam(3, $datos['DESCRIPCION'], PDO::PARAM_STR);
     //$ejecutar->bindParam(4, $this->oficial, PDO::PARAM_STR);
     if($ejecutar->execute()){
               $salida.="SUCESSFULL";
     }else{
               $salida.="No se pudo Actualizar el Pedido";
     }
     $this->conexion->commit();

   echo $salida;   

 }


























































 function CREAR_CATEGORIA($datos){
     $salida="";
     $nombre_imagen = uniqid()."-".$datos['IMAGEN_NOMBRE'];
     $this->ruta1 = "../dist/RECURSOS/CATEGORIAS/";
     $this->oficial="dist/RECURSOS/CATEGORIAS/".$nombre_imagen;
        if (!file_exists($this->ruta1)) {
            mkdir($this->ruta1, 0777, true);
        }  
         
        if ($datos['IMAGEN_TIPO'] ==="image/jpg" || $datos['IMAGEN_TIPO']==="image/jpeg" || $datos['IMAGEN_TIPO']==="image/png") {
             move_uploaded_file($datos['IMAGEN_CONTENIDO'], $this->ruta1.$nombre_imagen);
           
         }



     $query="INSERT INTO BOTONERA_Categorias(IdFamilia,nomCategoria,desCategoria,imagen,estado) values(?,?,?,?,1) ";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $datos['FAMILIA'], PDO::PARAM_STR);
     $ejecutar->bindParam(2, $datos['NOMBRE_CATEGORIA'], PDO::PARAM_STR);
     $ejecutar->bindParam(3, $datos['DESCRIPCION'], PDO::PARAM_STR);
     $ejecutar->bindParam(4, $this->oficial, PDO::PARAM_STR);

  
     if($ejecutar->execute()){
               $salida.="SUCESSFULL";
     }else{
               $salida.="No se pudo Registrar La Categoria";
     }
 

   echo $salida;   

 }


function enviar_troncal_sunat_pendientes($datos){

for ($i=0; $i < count($datos); $i++) {

    $tip="";
   if($datos[$i]->TIPO==01){
      $tip="01";
    }else if ($datos[$i]->TIPO==03){
      $tip="03";
    }else if ($datos[$i]->TIPO==07){
      $tip="07";
    }else{
      $tip="";
    }

     echo $tip;
     echo $datos[$i]->ID;
   $this->send_bill_sunat($datos[$i]->REFERENCIA,$tip,$datos[$i]->ID);

}// FIN FOREACH


}


function send_bill_sunat($referencia,$tipo,$idtienda){

 echo strval($tipo);
//API URL
$url = 'http://192.168.245:8080/SUIT/API/REST2?p=comprobantes_electronicos';
$ch = curl_init($url);
$array_cabezera = array
  (
    "TOKEN" =>"Q2hpY2tlbkJyYXNhdmFsaWRvSGFzdGFKdW5pbzIwMTk=", 
  "IDPEDIDO" => $referencia,
  "SERVIDOR" => "2", // 2  PRUEBAS 1 PRODUCCION  
  "IDDOCUMENTO" =>$tipo, // 01 Factura 03 Boleta 07 NOTA DE CREDITO
  "IDTIENDA" => $idtienda, // IMPPORTANTE PARA EL MATCH
  "IPUSUARIO" => "192.168.1.20",  
  );

$payload = json_encode($array_cabezera);

//var_dump($data);

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);

//close cURL resource
curl_close($ch);

echo $result;



}




  function EDITAR_CATEGORIA($datos){
     $salida="";
     $query="";
     $bdimg=$datos['IMG_BD'];
     $nombre_imagen = uniqid()."-".$datos['IMAGEN_NOMBRE'];
     $this->ruta1 = "../dist/RECURSOS/CATEGORIAS/";
     $this->oficial="dist/RECURSOS/CATEGORIAS/".$nombre_imagen;

     
        if (!file_exists($this->ruta1)) {
            mkdir($this->ruta1, 0777, true);
        }  
         
        if ($datos['IMAGEN_TIPO'] ==="image/jpg" || $datos['IMAGEN_TIPO']==="image/jpeg" || $datos['IMAGEN_TIPO']==="image/png") {
            

             if(filesize($datos['IMAGEN_CONTENIDO'])>0){
              $bdimg=$this->oficial;
             }

          move_uploaded_file($datos['IMAGEN_CONTENIDO'], $this->ruta1.$nombre_imagen);  



           
         }



     $query="update BOTONERA_categorias set nomCategoria=?,desCategoria=?,imagen=?,IdFamilia=? where idCategoria in (?)";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $datos['NOMBRE_CATEGORIA'], PDO::PARAM_STR);
     $ejecutar->bindParam(2, $datos['DESCRIPCION'], PDO::PARAM_STR);
     $ejecutar->bindParam(3, $bdimg, PDO::PARAM_STR);
     $ejecutar->bindParam(4, $datos['FAMILIA'] , PDO::PARAM_INT);
     $ejecutar->bindParam(5, $datos['ID_CATEGORIA'] , PDO::PARAM_STR);

  
     if($ejecutar->execute()){
               $salida.="SUCESSFULL";
     }else{
               $salida.="No se pudo Registrar La Categoria";
     }
 

   echo $salida;   

 }



 function GET_MANTENIANCE_CATEGORIA($val){
     $salida="";
     $query="SELECT * FROM BOTONERA_categorias where idCategoria in (?) ";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $val, PDO::PARAM_STR);
     
     if($ejecutar->execute()){
          $filas=$ejecutar->rowCount();
          if($filas>0){
              foreach ($ejecutar as $key) {
              $salida.="<script>
                         
                         $('form[name=FORM_CATEGORY] input[name=nombre]').val('".$key['nomCategoria']."');
                         $('form[name=FORM_CATEGORY] input[name=descripcion]').val('".$key['desCategoria']."');
                         $('form[name=FORM_CATEGORY] input[name=idcat]').val('".$key['idCategoria']."');
                         $('form[name=FORM_CATEGORY] input[name=img]').val('".$key['imagen']."');
                         $('form[name=FORM_CATEGORY] #select-familia').val('".$key['IdFamilia']."');

                         

                        </script>
                       ";



              //$salida.="el nombre es".$key['idCategoria'];
               
            }

                

          }else{
                $salida.="No Existe Ninguna Categoria";
          }
     }else{
               $salida.="No se Puede Conectar A La BD";
     }


   echo $salida;   

 }

  function GET_MANTENIANCE_CATEGORIA_SELECT_FAMILIA(){
     $salida="";
     $query="select * from BOTONERA_familias where estado=1 ";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $val, PDO::PARAM_STR);     
     if($ejecutar->execute()){
          $filas=$ejecutar->rowCount();
          if($filas>0){
              foreach ($ejecutar as $key) {
              $salida.="
                         <option value='".$key['idFamilia']."'>".$key['nomFamilia']."</option>
                       ";
              //$salida.="el nombre es".$key['idCategoria'];
               
            }

                

          }else{
                $salida.="No Existe Ninguna Categoria";
          }
     }else{
               $salida.="No se Puede Conectar A La BD";
     }


   echo $salida;   

 }


 function DELETE_CATEGORIA($val){
     $salida="";
     //$query="delete from categorias where idCategoria in (?) ";
     $query="update BOTONERA_categorias set estado=2 where idCategoria in (?) ";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $val, PDO::PARAM_STR);
     
     if($ejecutar->execute()){
               $salida.="SUCESSFULL";
     }else{
               $salida.="No se pudo Eliminar";
     }


   echo $salida;   

 }

 function HABILITAR_CATEGORIA($val){
     $salida="";
     //$query="delete from categorias where idCategoria in (?) ";
     $query="update BOTONERA_categorias set estado=1 where idCategoria in (?) ";
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $val, PDO::PARAM_STR);
     
     if($ejecutar->execute()){
               $salida.="SUCESSFULL";
     }else{
               $salida.="No se pudo Eliminar";
     }


   echo $salida;   

 }




























}



 ?>
  

