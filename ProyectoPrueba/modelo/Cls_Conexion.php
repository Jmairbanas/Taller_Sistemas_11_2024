<?php

    class clsConexion{
        private $server='localhost';
        private $user='root';
        private $password='';
        private $database='bd_proyecto';

        public function __construct()
        {
            try
            {
                $connect = new PDO("mysql:host=".$this->server.";dbname=".$this->database,$this->user,$this->password);  
                return $connect;
            }
            catch(PDOException $error)
            {
                return "Error al conectar: ".$error;
            }
        }
    }

?>