<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>paint</title>
		<meta name="description" content="">
		<meta name="author" content="satur">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>
	<style type="text/css">
		canvas {
			border : solid 0.5px;
			cursor : url('lapizcursor.gif'), default;
		}
		.herramientas {
			width: 100px;
		}
		.herramientas div {
			background-color: black;
		}
		.herramientas div:hover{
			border: solid red 1px;
		}
		.herramientas img:hover{
			border: solid red 1px;
		}
	</style>
	<script>
	var color = "#000000";
	var tamano = 5;
	var pintura = false;
	function pintar(event){
		var canvas = document.getElementById("canvas");
		var ctx = canvas.getContext("2d");
		var x = event.clientX-15;
		var y = event.clientY+20;
		if(pintura){
			ctx.fillStyle = color;
			ctx.fillRect(x,y,tamano, tamano);
		}
	}
	function activar(){
		pintura = true;
	}
	function desactivar(){
		pintura = false;
	}
	
	function borrador(){
		document.getElementById("canvas").style.cursor = "url('borradorcursor.png'), default";
		color = "#FFFFFF";
		document.getElementById("colores").setAttribute("disabled", "");
	}
	
	function lapiz(){
		document.getElementById("canvas").style.cursor = "url('lapizcursor.gif'), default";
		color = document.getElementById("colores").value;
		document.getElementById("colores").removeAttribute("disabled");
	}
	function scolor(){
		color = document.getElementById("colores").value;
	}
	function stamano(numero) {
		tamano = numero;
	}
	
	function guardari(){
		var canvas = document.getElementById("canvas");
		var imagen = canvas.toDataURL("image/png");
		this.href = imagen;
	}
	</script>
	<body>
		<table>
			<tr>
				<td><canvas width="500" height="500" id="canvas" onmousemove="pintar(event);" onmousedown="activar();" onmouseup="desactivar();"></canvas></td>
				<td class="herramientas">
					<a href="#" onclick="lapiz();"><img src="lapiz.png" /></a>
					<a href="#" onclick="borrador();"><img src="borrador.png" /></a>
					<div style="width: 5px; height: 5px;" onclick="stamano(5);"></div><br />
					<div style="width: 20px; height: 20px;" onclick="stamano(20);"></div><br />
					<div style="width: 30px; height: 30px;" onclick="stamano(30);"></div><br />
					<div style="width: 40px; height: 40px;" onclick="stamano(40);"></div><br />
					<input type="color" id="colores" onchange="scolor();"/>
					<a href="#" download="canvas.png" id="guardarimagen" >Guardar como imagen</a>
				</td>
			</tr>
		</table>
		<script>
			document.getElementById("guardarimagen").addEventListener("click", guardari, false);
		</script>
	</body>
</html>