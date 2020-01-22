<?php 
class Conection
{        
    public $_connection;
    private static $_instance; //The single instance
    private  $servidor="192.168.1.247";
    private $usuario="sa";
    private $password="Villachicken2016";
    //private $bd="WC_VILLA_ELECTRONICA";
    private $bd="ELPASO";
    
    // Constructor
    public function __construct()
    {
        //$this->_connection = new mysqli($this->_host, $this->_username,$this->_password, $this->_database);
        $this->_connection =new PDO("sqlsrv:Server=".$this->servidor .";DataBase=".$this->bd."","".$this->usuario ."","".$this->password."");
        // Error handling
        $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->_connection->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
    }
     public function getConnection()
    {
        return $this->_connection;
    }
  


}


     $cn= new Conection();
     $conexion=$cn->getConnection();




     $query_usuario="select * from sistema_disponibles";
     $query=$conexion->prepare($query_usuario,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
     $query->bindParam(1,$usuario, PDO::PARAM_STR);
     $query->bindParam(2,$password, PDO::PARAM_STR);
     $query->execute();
     $query = $query->fetchAll();
    if(sizeof($query)>0){    
      foreach($query as $row){

            var_dump($row);    
            

            echo "principal";
       }
     }else{
      echo "Credenciales Incorrectas";
    }












 ?>