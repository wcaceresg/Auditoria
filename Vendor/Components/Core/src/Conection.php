<?php 
/**
 * Created by WCaceres.
 * User: Wcaceres
 * Date: 10/01/2020
 * Time: 11:01.
 */
//namespace ProjectWCG\Model\Basic;
class Conection
{        
    public $_connection;
    private static $_instance; //The single instance
    private  $servidor="192.168.1.200";
    private $usuario="sa";
    private $password="Villachicken2016";
    //private $bd="WC_VILLA_ELECTRONICA";
    private $bd="REPORTES";
    
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







 ?>