<?php 


protected $conexion;
protected $db;

// datos de Host
protected $HOST='localhost'; 
protected $USER='root';
protected $PASS='1234';

protected $DBNAME='captura';


$this->conexion = mysqli_connect($this->HOST, $this->USER, $this->PASS);

$sql= "INSERT INTO `prueba`(`nombre`) VALUES ('22')";

$query = mysqli_query($this->conexion,$sql);


  if ($query === false){ 
      echo "<br>Sentencia incorrecta llamado a tabla";
  }
  else {
      if(mysqli_affected_rows($this->conexion)==1){
      echo '<br>Registro Exitoso';
      } else {
        echo '<br>error al insertar'; 
      }
  }

  
  mysqli_close($this->conexion);