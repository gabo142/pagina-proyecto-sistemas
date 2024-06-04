<?php
    class db{
        private $host= "localhost:3306"; // Cambiado de "localhost3306" a "localhost:3306"
        private $dbname="prueba";
        private $user="root";
        private $password="";
        public function conexion(){
            try{
                $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
                return $PDO;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }
    
?>