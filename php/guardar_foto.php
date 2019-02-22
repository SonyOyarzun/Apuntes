<?php
$_POST['imagen']

echo "hola";

/*
    protected $conexion;
    protected $db;
    
// datos de Host
    protected $HOST='localhost'; 
    protected $USER='root';
    protected $PASS='';
    protected $DBNAME='captura';

    public function conectar()
    {
        $this->conexion = mysqli_connect($this->HOST, $this->USER, $this->PASS);
        if ($this->conexion === 0) DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysqli_error());
        $this->db = mysqli_select_db($this->conexion,$this->DBNAME);
        if ($this->db == 0) DIE("Lo sentimos, no se ha podido conectar con la base datos: " . DBNAME);

        return true;

    }

    public function desconectar()
    {
        if ($this->conectar()) {
            mysqli_close($this->conexion);
            echo '<br> FIN';
        }
    }


    


    
   
      $codigo="09";
  

        $this->conectar();
        $tabla = "prueba";
        $sql="INSERT INTO $tabla VALUES ('$codigo')";
        $query = mysqli_query($this->conexion,$sql);

        if ($query === false){ 
            echo "<br>Sentencia incorrecta llamado a tabla: $tabla.";
        }
        else {
            if(mysqli_affected_rows($this->conexion)==1){
            echo '<br>Registro Exitoso';
            } else {
              echo '<br>error al insertar'; 
            }
        }
        $this->desconectar();
      

        */



