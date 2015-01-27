<?php

class DataBase {

    private $_host;
    private $_dbname;
    private $_user;
    private $_passwd;

    private $_pdo;
    private $_stmt;


    public function __construct($host, $dbname, $user, $passwd){

        $this->_host   = $host;
        $this->_dbname = $dbname;
        $this->_user   = $user;
        $this->_passwd = $passwd; 
    
    }

    public function connect(){

        $dsn = "mysql:dbname=$this->_dbname;host=$this->_host;port=3306;charset=utf8;";     

        try{ 
            $this->_pdo = new PDO($dsn, $this->_user, $this->_passwd,
                array(PDO::ATTR_EMULATE_PREPARES => false)
            ); 

        }catch(PDOException $e){
            throw $e; 
        }

    }


    public function close(){
        $this->_pdo = null;
    } 

    
    public function prepare($sql){
        $this->_stmt = $this->_pdo->prepare($sql); 
    }


    public function bind($key, $value, $type = null){

        if(is_null($type)){

            switch(true){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type =PDO::PARAM_STR;
                    break;
            }

        }
        
        $this->_stmt->bindValue($key, $value, $type); 
    
    }


    public function execute(){
        $this->_stmt->execute(); 
    } 


    public function resultset(){

        $result = array();
        while($row = $this->_stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($result, $row); 
        }
        
        return $result;
    }


}
