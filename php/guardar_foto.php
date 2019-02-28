<?php 
include './Conexion.php';
//clase conectar
$link = new Conexion();
$conexion = $link->conectar();


$tabla = 'tracking';
$imagen = $_POST['imagen'];

//Guardamos los datos en un array
$datos = array();




if($conexion->connect_error){
    $datos['conexion'] = "Error de Conexion: " . $conexion->connect_error;
}

$query = $link->insertar($tabla, $imagen);


  if ($query === false){ 
    $datos['estado'] = 'Sentencia incorrecta llamado a tabla :'.$tabla;
    $datos['consulta'] = $query;
  }
  else {
      if(mysqli_affected_rows($conexion)<=1){
        $datos['estado'] = 'Registro Exitoso';
      } else {
        $datos['estado'] = 'Error al insertar'; 
      }
  }

  
mysqli_close($conexion);


//Devolvemos el array pasado a JSON como objeto
 echo json_encode($datos);
?>