<?php
session_start();

require "validacion-usuario.php"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienvenidos a mi página</title>
	<style>
		body {
			
			background-image: url('background.png');
            background-size: cover;
			font-family: sans-serif;
		}
		.container {
			background-color: rgba(255, 255, 255, 0.7);
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,.2);
			padding: 20px;
			max-width: 80%;
			width: 500px;
			margin: 0 auto;
			margin-top: 50px;
		}
		h1 {
			font-size: 4em;
			margin-bottom: 0;
			text-align: center;
			color: #fff;
		}
		p {
			font-size: 1.5em;
			margin-top: 0;
			font-style: italic;
			color: #000;
		}
		.letras {
			margin-top: 20px;
			text-align: center;
		}
		
	</style>
</head>
<body>
	<div class="menu">
		<?php require "menu.php"; ?>
	</div>
	<h1>Bienvenidos</h1>
	<div class="container">
		<p class="letras">Hoy es <?php echo date('d/m/Y'); ?></p>
	</div>
</body>
</html>
