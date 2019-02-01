<!DOCTYPE html>
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
<title>Google Maps Geoposicionamiento</title> 
<script src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<style> #map { width: 100%; height: 300px; border: 1px solid #d0d0d0; } </style> 
<script> 
function localize() { 
if (navigator.geolocation) { 
navigator.geolocation.getCurrentPosition(mapa,error); 
} else { 
alert('Tu navegador no soporta geolocalizacion.'); 
} 
} 
function mapa(pos) { /************************ Aqui están las variables que te interesan***********************************/ 
var latitud = pos.coords.latitude; 
var longitud = pos.coords.longitude; 
var precision = pos.coords.accuracy; 
var contenedor = document.getElementById("map") 
document.getElementById("lti").innerHTML=latitud;
document.getElementById("lgi").innerHTML=longitud;	
document.getElementById("psc").innerHTML=precision;	
var centro = new google.maps.LatLng(13.81,-89.14); 
var propiedades = { zoom: 15, center: centro, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
var map = new google.maps.Map(contenedor, propiedades); 
var marcador = new google.maps.Marker({ position: centro, map: map, title: "Tu posicion actual" }); 
document.cookie ='latcookie='+latitud; 
document.cookie ='loncookie='+longitud;
} 
function error(errorCode) { 
if(errorCode.code == 1) 
alert("No has permitido buscar tu localizacion") 
else if (errorCode.code==2) 
alert("Posicion no disponible") 
else 
alert("Ha ocurrido un error") 
} 
</script> 
</head> 
<body onLoad="localize()"> 
<h1>Google Maps Geoposicionamiento</h1>
<p>Latitud: <span id="lti"></span></p>

<?php 
	$latphp = $_COOKIE["latcookie"];
$lonphp = $_COOKIE["loncookie"];
	
	echo '<input type="text" id="latitude" name="latitude" value="'.$latphp.'">';
 ?>

<p>Longitud: <span id="lgi"></span></p>
<p>Presici&oacute;n: <span id="psc"></span></p>	
<div id="map" ></div>
<?php
    $src = 'https://maps.googleapis.com/maps/api/staticmap?center=40.714728,-73.998672&markers=color:red%7Clabel:C%7C40.718217,-73.998284&zoom=12&size=600x400&key=AIzaSyA-U6DYBUvslIEZRHLQYRZ1VF_CUv3YQP4';
    $time = time();
    $desFolder = 'fotos/';
    $imageName = 'google-map_'.$time.'.PNG';
    $imagePath = $desFolder.$imageName;
    file_put_contents($imagePath,file_get_contents($src));
?>
<img src="<?php echo $imagePath; ?>"/>
<img src="https://maps.googleapis.com/maps/api/staticmap?center=40.714728,-73.998672&markers=color:red%7Clabel:C%7C40.718217,-73.998284&zoom=12&size=600x400&key=AIzaSyA-U6DYBUvslIEZRHLQYRZ1VF_CUv3YQP4"/>
</body> 
</html>