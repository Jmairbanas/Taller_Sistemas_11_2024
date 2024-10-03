<?php

    class clsConexion{
        private $host='localhost';
        private $db_name='lapicarra';
        private $username='root';
        private $password='';
        private $conn;

        public function __construct()
        {
            try
            {
                $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);  
                $this->conn->exec("set names utf8");
                return $this->conn;
                echo ("Conexión Realizada");
            }
            catch(PDOException $error)
            {
                return "Error al conectar: ".$error->getMessage();
            }
        }
    }

?>