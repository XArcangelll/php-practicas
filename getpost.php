<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get Post</title>


<style>
    form{
			background-color: white;
			border-radius: 3px;
			color: #999;
			font-size: 0.8em;
			padding: 20px;
			margin: 0 auto;
			width: 300px;
		}

		input, textarea{
			border: 0;
			outline: none;

			width: 280px;
		}

		.field{
			border: solid 1px #ccc;
			padding: 10px;

			
		}

		.field:focus{
			border-color: #18A383;
		}

		.center-content{
			text-align: center;
		}
</style>

</head>
<body>
    
<form action="">
	<p>Nombre:</p>
	<input type="text" class="field"> <br/>

	<p>Correo electrónico:</p>
	<input type="text" class="field"> <br/>

	<p>Asunto:</p>
	<input type="text" class="field"> <br/>

	<p>Mensaje:</p>
	<textarea class="field"></textarea> <br/>

	<p class="center-content">
		<input type="submit" class="btn btn-green" value="Enviar Datos">
	</p>

</form>

</body>
</html>
