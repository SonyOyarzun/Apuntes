 <?php
include './php/Conexion.php'; 
//https://malnuer.es/css/como-configurar-netbeans-para-usar-sass-en-windows/
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/main.js"></script>

    <script src="js/webcam.js"></script>

    <!-- Foto --->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/tomarFoto.js"></script>
    

     <!-- TRACKING -->
  <link rel="stylesheet" href="tracking.js-master/examples/assets/demo.css">
  <script src="tracking.js-master/build/tracking-min.js"></script>
  <script src="tracking.js-master/build/data/face-min.js"></script>
  <script src="dat.gui-master/build/dat.gui.min.js"></script>
  <script src="tracking.js-master/assets/stats.min.js"></script>

   
    
    
</head>
<body>
    <form id="form1"  class="exterior" method="POST" action="php/guardar_foto.php">
      
            <video autoplay="true" id="videobg" src="video/Estrellas.mp4"></video>
       <!--      <img src="imagenes/Sonido.gif" style="scale: .5"> --->  
            <input id="menu" type="checkbox" style="display: none">
        
        <div  class="barra">

               <button class="bubbly-button" onclick="visibilidad()">Menu</button> 
               
            <ul>
                <li onclick="ref(0)">Programacion</li>
                <li onclick="ref(1)">Sonido</li>
                <li onclick="ref(2)">Proyecto</li>    
            </ul> 
        </div>
                 

                
            
            <div class="hero">
                <div class="header">
                        <p>Proyecto</p>
                </div>

            </div>

            
     <div class="contenedor2">
   
         <!-- <img id="foto" src='data:image/jpeg;base64{binary data}'> -->
            <div class="item-1">
               <?php 
                $conexion = new Conexion();
                $tabla = 'tracking';
                $arreglo = $conexion->mostrarTop($tabla);
                 
                if(mysqli_num_rows($arreglo)!== 0){
                
                while($row = mysqli_fetch_array($arreglo)){  
                    
                ?>
                
                <div class='tarjeta'>   
                <label><?php echo $row['nombre'] ?></label>    
                <img id='foto' name='imagen' src='<?php echo $row['imagen'] ?>'>
                <div class='botones'>
                    
                <button type='button'>Buscar 1</button>
                <button type='button'>Buscar 2</button>
                <button type='button'>Buscar 3</button>
               
                </div>
                </div>
                   
           
            <?php
                }
 }
                ?>
                
            </div>

            <div class="item-2">

                <video id="video"  preload="" autoplay="" loop="" muted=""></video>
                <canvas id="canvas" width="40rem" height="20rem" ></canvas>

            </div>

     </div>   
     <div class="footer">
<div class="columna">
        <h6>Contacto</h6>
        <div class="elemento"> <img src="imagenes/facebook.jpg" alt=""> <p>Sony&nbsp;Oyarzun</p></div>
        <div class="elemento"> <img src="imagenes/whatsapp.jpg" alt=""> <p>9&nbsp;980&nbsp;194&nbsp;82</p></div> 
        <div class="elemento"> <img src="imagenes/correo.jpg" alt=""> <p>sony.oyarzun@gmail.com</p></div>
</div>
<div class="columna">
        <h6>Tutoriales Externos</h6>
        <div class="elemento"> <img src="imagenes/github.jpg" alt=""> <a href="http://rogerdudler.github.io/git-guide/index.es.html">Git&nbsp;Hub</a></div>
        <div class="elemento"> <img src="imagenes/IA.jpg" alt="">  <a href="https://github.com/cmusatyalab/openface">Open&nbsp;Face</a></div> 
        <div class="elemento"> <img src="imagenes/css.jpg" alt=""> <a href="https://developer.mozilla.org/es/docs/Web/CSS/CSS_Animations/Usando_animaciones_CSS">Animaciones&nbsp;Css</a></div>
</div>
    
     </div>
    </form>
</body>

</html>