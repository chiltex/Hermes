<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Geolocalización">
    <title>Geolocalización</title>
<script>
//<![CDATA[
var watchId;
/* Controlamos los tiempos de espera mínimo y máximo de nuestra geolocalización respecto a la petición anterior */
var PositionOptions = {
    timeout: 5000,
    maximumAge: 60000,
    enableHighAccurace: true // busca la mejor forma de geolocalización (GPS, tiangulación, ...)
};
/* Utiliza la geolocalalización solamente cuando se solicita.
Con PositionOptions aseguramos que la posición no corresponde a caché */
function initiate_geolocation() {
  if (navigator.geolocation) {
    browserSupportFlag = true;
    var watchId = navigator.geolocation.getCurrentPosition(successCallback, errorCallback, PositionOptions);
  } else {
    document.getElementById("mensaje").innerHTML = "Lo sentimos pero el API de Geolocalización de HTM5 no está disponible para su navegador";
  }
}
/* Reitera la geolocalización hasta que la detenemos */
function watch_geolocation() {
  if (navigator.geolocation) {
    browserSupportFlag = true;  // Para optimizarlo en los navegadores (mis dudas con IE)
    var watchId = navigator.geolocation.watchPosition(successCallback, errorCallback);
  } else {
    document.getElementById("mensaje").innerHTML = "Lo sentimos pero el API de Geolocalización de HTM5 no está disponible para su navegador";
  }
}
/* Detenemos la geolocalización reiterada */
function clear_watch_geolocation() {
  if (navigator.geolocation) {
    navigator.geolocation.clearWatch(watchId);
  } else {
    document.getElementById("mensaje").innerHTML = "Lo sentimos pero el API de Geolocalización de HTM5 no está disponible para su navegador";
  }
}
 
function successCallback(pos) {
  var timestamp = document.getElementById('timestamp');
  var date = new Date(pos.timestamp);
  /* Hacemos legible la fecha a nuestro léxico. 
  timestamp nos daría una lectura como ésta: Wed Jun 18 2014 09:46:21 GMT+0200  */
  var mes = date.getMonth() + 1;
  if (mes < 10) {
    mes = "0" + mes
  }
  var dia = date.getDate();
  if (dia < 10) {
    dia = "0" + dia
  }
  var anyo = date.getFullYear();
  var hora = date.getHours();
  if (hora < 10) {
    hora = "0" + hora
  }
  var minuto = date.getMinutes();
  if (minuto < 10) {
    minuto = "0" + minuto
  }
  var segundo = date.getSeconds();
  if (segundo < 10) {
    segundo = "0" + segundo
  }
  var timestamp = document.getElementById('timestamp');
  timestamp.innerHTML = dia + "/" + mes + "/" + anyo + ", " + hora + ":" + minuto + ":" + segundo;
  var latitude = document.getElementById('latitude');
  latitude.innerHTML = pos.coords.latitude.toFixed(6);  // Limito decimales de coordenadas a 6 
  var longitude = document.getElementById('longitude');
  longitude.innerHTML = pos.coords.longitude.toFixed(6);
  /* La altitud sobre la superficie (google maps dispone de medición "respecto a nivel de mar")
  Solo será medible desde avión, paramente ... */
  var altitude = document.getElementById('altitude');
  altitude.innerHTML = pos.coords.altitude.toFixed(6);
  var accuracy = document.getElementById('rangoerror');
  accuracy.innerHTML = pos.coords.accuracy;
  /* Sentido y velocidad si la medición se hace desde un dispositivo en movimiento */
  var heading = document.getElementById('sentido');
  heading.innerHTML = pos.coords.heading;
  var speed = document.getElementById('velocidad');
  speed.innerHTML = pos.coords.speed;
};
/* Posibles errores que se pueden producir en la geolocalización */
function errorCallback(error) {
  var appErrMessage = null;
  if (error.core == error.PERMISSION_DENIED) {
    appErrMessage = "El usuario no ha concedido los privilegios de geolocalización"
  } else if (error.core == error.POSITION_UNAVAILABLE) {
    appErrMessage = "Posicion no disponible"
  } else if (error.core == error.TIMEOUT) {
    appErrMessage = "Demasiado tiempo intentando obtener la localización del usuario."
  } else if (error.core == error.UNKNOWN) {
    appErrMessage = "Error desconocido"
  } else {
    appErrMessage = "Error insesperado"
  }
  document.getElementById("mensaje").innerHTML = appErrMessage
};
//]]>
</script>
  </head>
  <body>
    <section style="text-align:center;">
	<button type="button" class="button" onclick="initiate_geolocation();">Ver mi posición</button>
    <br>
	<button type="button" class="button" onclick="watch_geolocation();">Monitorizar mi posición</button>
	<br>
	<button type="button" class="button" onclick="clear_watch_geolocation();">Finalizar monitorización</button>
	<br>
	Fecha: <span style="color:#FF00AA;" id="timestamp"></span>
	<br>
	Latitud: <span style="color:#FF00AA;" id="latitude"></span>
  <input type="text" id="latitude" name="latitude">
	<br>
	Longitud: <span style="color:#FF00AA;" id="longitude"></span>
	<br>
	Altitud: <span style="color:#FF00AA;" id="altitude"></span> (Sobre nivel suelo: parapente, avión, ...)
	<br>
	Error máximo de geolocalización: <span style="color:#FF00AA;" id="rangoerror"></span> metros.
	<br>
	Dirección (0 => Norte en sentido agujas del reloj hasta 360º): <span style="color:#FF00AA;" id="sentido"></span>
	<br>
	Velocidad (metros/segundo si se detecta movimiento): <span style="color:#FF00AA;" id="velocidad"></span>
	<br>
      <div id="mensaje" style="color:#FF0000;"></div>
    </section>
  </body>
</html>