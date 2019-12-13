<?php


    class ConexionBD
    {
        private $con;

        private $host="localhost:3306";
        private $usuario = "root";
        private $contraseña = "";
        private $bd = "escuela_web";

        public function __construct(){
            $this->con = mysqli_connect($this->host, $this->usuario, $this->contraseña, $this->bd);

            if($this->con){
               
            }else{
                die("ERROR de Conexion" . 
                mysqli_connect_error() .
                mysqli_connect_errno());
            }
        }//constructor

        public function getConexion() {
            return $this->con;
        }

    }
    

?>