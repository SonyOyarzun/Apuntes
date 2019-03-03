/*
window.onload = function() {
    
const video = document.getElementById('video');    
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
const tracker = new tracking.ObjectTracker('face');
const flowerCrownButton = document.getElementById('flower-crown');
const bunnyEarsButton = document.getElementById('bunny-ears');

const img = new Image()
let filterX = 0
let filterY = 0
let filterWidth = 0
let filterHeight = 0


function changePic (x, y, width, height, src) {
  img.src = src
  filterX = x
  filterY = y
  filterWidth = width
  filterHeight = height
}

function flowerCrown () {
  changePic(0, -0.5, 1, 1, 'flower-crown.png')
}

flowerCrown();


          var gui = new dat.GUI();
          gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
          gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
          gui.add(tracker, 'stepSize', 1, 5).step(0.1);

tracking.track('#video', tracker, { camera: true })

tracker.on('track', event => {
    
  context.clearRect(0, 0, canvas.width, canvas.height)
  
  event.data.forEach(rect => {
      
    context.drawImage(img, rect.x + (filterX * rect.width),
    rect.y + (filterY * rect.height),
    rect.width * filterWidth,
    rect.height * filterHeight
  )
  
  })
  
})



}
*/




window.onload = function() {

          var video = document.getElementById('video');
          var canvas = document.getElementById('canvas');
          var context = canvas.getContext('2d');
          var tracker = new tracking.ObjectTracker('face');

          tracker.setInitialScale(4);//4
          tracker.setStepSize(2);
          tracker.setEdgesDensity(0.1);
          
          tracking.track('#video', tracker, { camera: true });
          

          tracker.on('track', function(event) {
            //si encuentra cara...
            
            
            //context dibuja un rectangulo
            context.clearRect(0, 0, canvas.width, canvas.height);
            
            event.data.forEach(function(rect) {
              //capturamos el canvas mientras se marca el track
              capturar(canvas,context,video);
                
              context.strokeStyle = '#5e4beb';
              context.strokeRect(rect.x, rect.y, rect.width, rect.height);
              context.font = '11px Helvetica';
              context.fillStyle = "#fff";
              context.fillText('x: ' + rect.x + 'px', rect.x + rect.width + 5, rect.y + 11);
              context.fillText('y: ' + rect.y + 'px', rect.x + rect.width + 5, rect.y + 22);

            });
  
            
          });

          // gui es una interfaz para controlar el reconocimiento
          var gui = new dat.GUI();
          gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
          gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
          gui.add(tracker, 'stepSize', 1, 5).step(0.1);
};
      
    



function capturar(canvas,context,video){
  console.log('capturando imagen');
//  video.pause();
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  context.drawImage(video, 0, 0, canvas.width, canvas.height);
  var foto = canvas.toDataURL(); //Esta es la foto, en base 64

 //se envia la imagen por ajax a controlador php
  enviar(foto);

}
        
function enviar(foto){

  // si usamos el metodo POST provoca error 405 Method Not Allowed asi usaremos GET
  // fuente https://airbrake.io/blog/http-errors/405-method-not-allowed
    
    $.ajax({
    type: 'POST',
    url: 'php/guardar_foto.php',
    data: {
        imagen: foto
    },
     
      success: function(msg){ 
        console.log(msg);
        
    }  


});


}

