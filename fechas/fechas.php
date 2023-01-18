<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Fechas</title>
	<style>
		body{
			background-color: #5276af;
			height: 100%;
		}
		#container{
			background: white;
			margin: 100px auto;
			padding: 100px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="container">
		<?php
		date_default_timezone_set("America/Lima");

		/*
		*	d - dia del mes (1-31)
		*	m - mes del año (1-12)
		*	Y - año (4 dígitos)
		*	l - día de la semana 
		*	
		*	h - hora en formato 1-12
		*	i - minutos 0-59
		*	s - segundos 0-59
		*	a - am-pm
		*/
		
		$mes = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
		$dia = array("domingo","lunes","martes","miercoles","jueves","sabado");
		echo "Fecha: " . $dia[date("w")] . " " . date("d") . " de " . $mes[date("m")-1] . " de " . date("Y") . "<br>";
		echo "Son las " . date("h:i:sa");
			
		?>
	</div>
</body>
</html>










