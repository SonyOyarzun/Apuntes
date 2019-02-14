function visibilidad(){
  var validar = document.getElementById('menu').checked;

if( validar === false){
  document.getElementById('menu').checked =true;
}else{
  document.getElementById('menu').checked =false;
}
}

function ref(local){
  if(local==0){
    location.href = "index.html";
  }
  if(local==1){
    location.href = "sonido.html";
  }
  if(local==2){
    location.href = "proyecto.html";
  }
 
}
