    
    
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
            context.clearRect(0, 0, canvas.width, canvas.height);
            event.data.forEach(function(rect) {
              context.strokeStyle = '#a64ceb';
              context.strokeRect(rect.x, rect.y, rect.width, rect.height);
              context.font = '11px Helvetica';
              context.fillStyle = "#fff";
              context.fillText('x: ' + rect.x + 'px', rect.x + rect.width + 5, rect.y + 11);
              context.fillText('y: ' + rect.y + 'px', rect.x + rect.width + 5, rect.y + 22);

              ////////////////////////////

              video.pause();
			        canvas.width = video.videoWidth;
				      canvas.height = video.videoHeight;
              context.drawImage(video, 0, 0, canvas.width, canvas.height);
              
              var foto = canvas.toDataURL(); //Esta es la foto, en base 64

           document.getElementById("foto").src = foto;
             

            
				//Pausar reproducción
			/*	video.pause();

				//Obtener contexto del canvas y dibujar sobre él
				var contexto = canvas.getContext("2d");
				canvas.width = video.videoWidth;
				canvas.height = video.videoHeight;
				contexto.drawImage(video, 0, 0, canvas.width, canvas.height);

				var foto = canvas.toDataURL(); //Esta es la foto, en base 64
				estado.innerHTML = "Enviando foto. Por favor, espera...";
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "./guardar_foto.php", true);
				xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhr.send(encodeURIComponent(foto)); //Codificar y enviar

				xhr.onreadystatechange = function() {
				    if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
				        console.log("La foto fue enviada correctamente");
				        console.log(xhr);
				        estado.innerHTML = "Foto guardada con éxito. Puedes verla <a target='_blank' href='./" + xhr.responseText + "'> aquí</a>";
				    }
				}

				//Reanudar reproducción
				video.play();
*/


              /////////////////////////////////////////////////
            });
          });


          var gui = new dat.GUI();
          gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
          gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
          gui.add(tracker, 'stepSize', 1, 5).step(0.1);
        };
      