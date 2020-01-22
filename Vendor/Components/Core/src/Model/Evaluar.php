<?php 
/**
 * Created by WCaceres.
 * User: Wcaceres
 * Date: 07/08/2019
 * Time: 11:01.
 */
//namespace ProjectWCG\Model\Inicio;
use ProjectWCG\View\ENCUESTA\Evaluacion;
class Evaluar extends Conection{
  public $conexion;
  public $ruta1 = "../dist/RECURSOS/CATEGORIAS/";
  public $oficial = "dist/RECURSOS/CATEGORIAS/";   
  function __construct()
  {
     parent::__construct();
     $cn= new Conection();
     $this->conexion=$cn->getConnection();
   }




function getTableEvaluacion($datos){
 


     $salida="";
     $query="

 select * from AUDITORIA_ENCUESTA_GRUPO WHERE Estado=1

 ";
     $this->conexion->beginTransaction();
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
   
     

   //  $salida.=Evaluacion::HEADER($datos);
    // $salida.=Evaluacion::PRE_TABLE();
     if($ejecutar->execute()){
          $DATA=$ejecutar->fetchall();
          $filas=$ejecutar->rowCount();
          if($filas>0){
               $C=1;


                $salida.=Evaluacion::TRAER_CABECERA();
              foreach ($DATA as $key) {

                $salida.='<section class="row">';

                $salida.=Evaluacion::TRAER_GRUPOS($key,$C);
                $salida.=$this->Get_Preguntas_Grupo($key['IdGrupo'],$C,$key['Nota']);   
                $salida.='</section>';




               $C++; 
            }

          }else{
                //$salida.="No Existe Ninguna Categoria";
          }

          //$salida.=Evaluacion::Transform_Table();

    $this->conexion->commit();
      
     }else{
               $salida.="No se Puede Conectar A La BD";
     }
  //$salida.=VIEW_MANTENIANCE_CATEGORIA\CATEGORY::GET_MODAL();   

   echo $salida;   

 }






function Get_Preguntas_Grupo($val,$count,$Nota){
     $salida="";
     $query="  SELECT * FROM AUDITORIA_ENCUESTA_PREGUNTAS WHERE IdGrupo IN (?) AND Estado=1 ";
     //$this->conexion->beginTransaction();
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $val, PDO::PARAM_INT);
     if($ejecutar->execute()){
          $filas=$ejecutar->rowCount();
          if($filas>0){
               
           $salida.='<div class="col-md-6" style="border-left: 1px solid black;border-right: 1px solid black;">';
            $salida.='<div class="row">';
                      
              foreach ($ejecutar as $key) 
              { 
                       $salida.='<div class="col-md-1" style="border-bottom: 1px solid black;border-right: 1px solid black;">';
                         $salida.='<p>'.$key['Nota'].'</p>';
                       $salida.='</div>';

                       $salida.='<div class="col-md-1" style="border-bottom: 1px solid black;">';
                         $salida.='<p>'.$key['Prefijo'].'</p>';
                       $salida.='</div>';  

                       $salida.='<div class="col-md-10" style="border-bottom: 1px solid black;border-left: 1px solid black;">';
                        $salida.='<p>'.$key['Descripcion'].'</p>'; 
                        $salida.='</div>'; 
                                   
             }
             $salida.='</div>'; 
           $salida.='</div>'; 
             
             $salida.=$this->Get_Respuestas_Input($count,$val,$Nota);
             $salida.=$this->Get_Observaciones($count,$val,$Nota);  
            
            //$salida.=$this->Get_Preguntas_Grupo_Respuestas($key['Op']);     

                

          }else{
               // $salida.="No Existe Ninguna Categoria";
          }
     }else{
               //$salida.="No se Puede Conectar A La BD";
     }


  // $this->conexion->commit();
  return $salida;   

 }


function Get_Respuestas_Input($c,$idgrupo,$Nota){
 return '<div class="col-md-1">
            <input type="number" class="form-control" id="cuota'.$c.'" class="cuota'.$c.'" value="'.intval($Nota).'" style="text-align: center;    margin-top: 20px;" >
         </div>   ';

}
function Get_Observaciones($c,$idgrupo,$Nota){
  return '<div class="col-md-5">
                            <textarea name="" style="width:100%;    margin-top: 20px;" placeholder="Ingrese Observaciones"></textarea>
          </div>';
}



function Get_Preguntas_Grupo_Respuestas($val){
     $salida="";
     $query="   SELECT ED.IdRespuesta,ED.Op,ED.IdEleccion,ER.Descripcion AS RESPUESTA FROM AUDITORIA_PREGUNTAS_DETALLE ED
 INNER JOIN AUDITORIA_ENCUESTA_REPUESTAS ER ON ER.IdRespuesta=ED.IdEleccion
  where ED.Op=? ";
     //$this->conexion->beginTransaction();
     $ejecutar=$this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $ejecutar->bindParam(1, $val, PDO::PARAM_INT);
     if($ejecutar->execute()){
          $filas=$ejecutar->rowCount();
          if($filas>0){
              foreach ($ejecutar as $key) {
              $salida.=' <div class="col-md-1">
        <label class="radio">
        <input type="radio" name="'.$val.'" id="'.$val.'" value="'.$key['IdEleccion'].'-'.$val.'" onclick=seleccionar_radio(this); >'.$key['RESPUESTA'].' 
      </label>
      </div>';


              //$salida.="el nombre es".$key['idCategoria'];
               
            }

                

          }else{
               // $salida.="No Existe Ninguna Categoria";
          }
     }else{
               //$salida.="No se Puede Conectar A La BD";
     }


  // $this->conexion->commit();
  return $salida;   

 }


















}



 ?>
  

