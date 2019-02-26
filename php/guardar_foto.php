<?php 


//header('Content-Type: application/json');
$imagen = $_POST['imagen'];

//header('Content-Type: application/json');

//Guardamos los datos en un array
$datos = array();


// datos de Host
$HOST='localhost'; 
$USER='root';
$PASS='1234';
$DBNAME='captura';

//datos de la BD
$conexion = mysqli_connect($HOST, $USER, $PASS, $DBNAME);


if($conexion->connect_error){
    $datos['conexion'] = "Unable to connect database: " . $conexion->connect_error;
}

$tabla = 'tracking';
$datos['consulta'] = $sql ="INSERT INTO `$tabla`(`nombre`, `imagen`) VALUES (now(),'$imagen')";
$query = mysqli_query($conexion,$sql);





  if ($query === false){ 
    $datos['estado'] = 'Sentencia incorrecta llamado a tabla :'.$tabla;
  }
  else {
      if(mysqli_affected_rows($conexion)==1){
        $datos['estado'] = 'Registro Exitoso';
      } else {
        $datos['estado'] = 'error al insertar'; 
      }
  }

  
mysqli_close($conexion);


//Devolvemos el array pasado a JSON como objeto
 echo json_encode($datos);
?>