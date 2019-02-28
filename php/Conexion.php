<?php

class Conexion {
   
    function conectar(){
    // datos de Host
    $HOST='localhost'; 
    $USER='root';
    $PASS='1234';
    $DBNAME='captura';

    //datos de la BD
    $conexion = mysqli_connect($HOST, $USER, $PASS, $DBNAME);

    return $conexion;

    }
    
    

    public function desconectar()
    {
        if ($this->conectar()) {
            mysqli_close($this->conectar());
            return "fin de conexion";
        }
    }

    function insertar($tabla,$imagen){
  
    $sql ="INSERT INTO `$tabla`(`nombre`, `imagen`) VALUES (now(),'$imagen')";
    $query = mysqli_query($this->conectar(),$sql);
    $this->desconectar();
    return $query;
    
    }
    
    function mostrarTop($tabla){
     
    $sql ="Select * From `$tabla` limit 10 ";
    $query = mysqli_query($this->conectar(),$sql);
    $this->desconectar();
    
    if ($query === false){ 
            return null;
    }
    
    return $query;
    
    }
}
