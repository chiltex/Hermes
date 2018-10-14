<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo canvas mano alzada</title>
</head>
<body>

<!-- creamos el camvas -->
<canvas id='canvas' width="400" height="200" style='border: 1px solid #CCC;'>
    <p>Tu navegador no soporta canvas</p>
</canvas>
<canvas id='canvas2' width="400" height="200" style='border: 1px solid #CCC;'>
    <p>Tu navegador no soporta canvas</p>
</canvas>
<!-- creamos el form para el envio -->
<form id='formCanvas' method='post' action='#' ENCTYPE='multipart/form-data'>
  <input type="text" name="cliente" id="cliente">
    <button type='button' onclick='LimpiarTrazado()'>Borrar</button>
    <button type='button' onclick='GuardarTrazado()'>Guardar</button>
    <input type="checkbox" name="operacion"  value="1">Obtener la potencia de a elevado a b <br/>
    <input type='hidden' name='imagen' id='imagen' />
    <input type='hidden' name='imagen2' id='imagen2' />
</form>

<script type="text/javascript">
    /* Variables de Configuracion */
    var idCanvas='canvas';
       var idCanvas2='canvas2';
    var idForm='formCanvas';
    var inputImagen='imagen';
    var inputImagen2='imagen2';
    var cliente='cliente';
    var estiloDelCursor='crosshair';
    var colorDelTrazo='#555';
    var colorDeFondo='#fff';
    var grosorDelTrazo=2;

    /* Variables necesarias */
    var contexto=null;
    var valX=0;
    var valY=0;
    var flag=false;
    var imagen=document.getElementById(inputImagen); 
    var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
    var altoCanvas=document.getElementById(idCanvas).offsetHeight;
    var pizarraCanvas=document.getElementById(idCanvas);

    var imagen2=document.getElementById(inputImagen2); 
    var anchoCanvas2=document.getElementById(idCanvas2).offsetWidth;
    var altoCanvas2=document.getElementById(idCanvas2).offsetHeight;
    var pizarraCanvas2=document.getElementById(idCanvas2);

     

    /* Esperamos el evento load */
    window.addEventListener('load',IniciarDibujo,false);

    function IniciarDibujo(){
      
      /* Creamos la pizarra */
      pizarraCanvas.style.cursor=estiloDelCursor;
      contexto=pizarraCanvas.getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
      contexto.strokeStyle=colorDelTrazo;
      contexto.lineWidth=grosorDelTrazo;
      contexto.lineJoin='round';
      contexto.lineCap='round';
      contexto.font = "40px Calibri, Arial";
        // Fuente para el texto
      contexto.fillText("hola",0,0);
      /* Capturamos los diferentes eventos */
      pizarraCanvas.addEventListener('mousedown',MouseDown,false);// Click pc
      pizarraCanvas.addEventListener('mouseup',MouseUp,false);// fin click pc
      pizarraCanvas.addEventListener('mousemove',MouseMove,false);// arrastrar pc

      pizarraCanvas.addEventListener('touchstart',TouchStart,false);// tocar pantalla tactil
      pizarraCanvas.addEventListener('touchmove',TouchMove,false);// arrastras pantalla tactil
      pizarraCanvas.addEventListener('touchend',TouchEnd,false);// fin tocar pantalla dentro de la pizarra
      pizarraCanvas.addEventListener('touchleave',TouchEnd,false);// fin tocar pantalla fuera de la pizarra

      /* Creamos la pizarra2 */
      pizarraCanvas2.style.cursor=estiloDelCursor;
      contexto2=pizarraCanvas2.getContext('2d');
      contexto2.fillStyle=colorDeFondo;
      contexto2.fillRect(0,0,anchoCanvas2,altoCanvas2);
      contexto2.strokeStyle=colorDelTrazo;
      contexto2.lineWidth=grosorDelTrazo;
      contexto2.lineJoin='round';
      contexto2.lineCap='round';
      contexto2.font = "40px Calibri, Arial";
        // Fuente para el texto
      contexto2.fillText("hola",0,0);
      /* Capturamos los diferentes eventos */
      pizarraCanvas2.addEventListener('mousedown',MouseDown2,false);// Click pc
      pizarraCanvas2.addEventListener('mouseup',MouseUp2,false);// fin click pc
      pizarraCanvas2.addEventListener('mousemove',MouseMove2,false);// arrastrar pc

      pizarraCanvas2.addEventListener('touchstart',TouchStart2,false);// tocar pantalla tactil
      pizarraCanvas2.addEventListener('touchmove',TouchMove2,false);// arrastras pantalla tactil
      pizarraCanvas2.addEventListener('touchend',TouchEnd2,false);// fin tocar pantalla dentro de la pizarra
      pizarraCanvas2.addEventListener('touchleave',TouchEnd2,false);// fin tocar pantalla fuera de la pizarra
    }

    function MouseDown(e){
      flag=true;
      contexto.beginPath();
      valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
      contexto.moveTo(valX,valY);
    }

    function MouseUp(e){
      contexto.closePath();
      flag=false;
    }

    function MouseMove(e){
      if(flag){
        contexto.beginPath();
        contexto.moveTo(valX,valY);
        valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
        contexto.lineTo(valX,valY);
        contexto.closePath();
        contexto.stroke();
      }
    }

    function TouchMove(e){
      e.preventDefault();
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseMove(touch);
      }
    }

    function TouchStart(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseDown(touch);
      }
    }

    function TouchEnd(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseUp(touch);
      }
    }

    function posicionY(obj) {
      var valor = obj.offsetTop;
      if (obj.offsetParent) valor += posicionY(obj.offsetParent);
      return valor;
    }

    function posicionX(obj) {
      var valor = obj.offsetLeft;
      if (obj.offsetParent) valor += posicionX(obj.offsetParent);
      return valor;
    }

function MouseDown2(e){
      flag=true;
      contexto2.beginPath();
      valX=e.pageX-posicionX(pizarraCanvas2); valY=e.pageY-posicionY(pizarraCanvas2);
      contexto2.moveTo(valX,valY);
    }

    function MouseUp2(e){
      contexto2.closePath();
      flag=false;
    }

    function MouseMove2(e){
      if(flag){
        contexto2.beginPath();
        contexto2.moveTo(valX,valY);
        valX=e.pageX-posicionX(pizarraCanvas2); valY=e.pageY-posicionY(pizarraCanvas2);
        contexto2.lineTo(valX,valY);
        contexto2.closePath();
        contexto2.stroke();
      }
    }

    function TouchMove2(e){
      e.preventDefault();
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseMove(touch);
      }
    }

    function TouchStart2(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseDown(touch);
      }
    }

    function TouchEnd2(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseUp(touch);
      }
    }

    /* Limpiar pizarra */
    function LimpiarTrazado(){
      contexto=document.getElementById(idCanvas).getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
    }

    /* Enviar el trazado */
    function GuardarTrazado(){
      cliente.value=document.getElementById(cliente);
      imagen.value=document.getElementById(idCanvas).toDataURL('image/png');
      imagen2.value=document.getElementById(idCanvas2).toDataURL('image/png');
      document.forms[idForm].submit();
    }
</script>


<?php 
// comprovamos si se envió la imagen
if (isset($_POST['imagen'])&&isset($_POST['cliente'])) { 

    // mostrar la imagen
    echo '<img src="'.$_POST['imagen'].'" border="1">
          <img src="'.$_POST['imagen2'].'" border="1">
            cliente='.$_POST['cliente'].'
            ';

    // funcion para gusrfdar la imagen base64 en el servidor
    // el nombre debe tener la extension
    function uploadImgBase64 ($base64, $name){
        // decodificamos el base64
        $datosBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        // definimos la ruta donde se guardara en el server
        $path= $_SERVER['DOCUMENT_ROOT'].'/Hermes/firmas/'.$name;
        // guardamos la imagen en el server
        if(!file_put_contents($path, $datosBase64)){
            // retorno si falla
            return false;
        }
        else{
            // retorno si todo fue bien
            return true;
        }
    }

    // llamamos a la funcion uploadImgBase64( img_base64, nombre_fina.png) 
    uploadImgBase64($_POST['imagen'], 'mi_imagen_'.$_POST['cliente'].'.png' );

    uploadImgBase64($_POST['imagen2'], 'mi_imagen_'.$_POST['cliente'].'.png' );
}
?>
</body>
</html>