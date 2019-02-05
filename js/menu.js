function visibilidad(){
  var validar = document.getElementById('menu').checked;

if( validar === false){
  document.getElementById('menu').checked =true;
}else{
  document.getElementById('menu').checked =false;
}
}

function ref(local){
  if(local==1){
    location.href = "https://www.google.com/";
  }
 
}
