<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		nav {
			background-color: white;
			height: 50px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 20px;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			position: fixed;
			width: 100%;
			top: 0;
		}

		.img1 {
			height: 50px;

		}

		nav a {
			text-decoration: none;
			color: black;
			font-size: 20px;
			margin: 0 20px;
			transition: color 0.3s ease-in-out;
		}

		nav a:hover {
			color: red;
		}

		nav ul {
			display: flex;
			list-style: none;
			margin: 0;
			padding: 0;
			align-items: center;
		}

		nav ul li {
			margin: 0 10px;
		}

		nav ul li:last-child {
			margin-right: 0;
		}

		.navbar {
			color: black;
			transition: color 0.3s ease-in-out;
		}


		.rojo{
			background-color: red;
			color: white;
			padding: 5px 25px;
			border-radius: 5px;
			
		}

		@media screen and (max-width: 768px) {
			nav ul {
				display: none;
			}

			nav ul:last-child {
				display: flex;
			}

 
		}
		          
		.img{

		}
	</style>
</head>
<body>
	<nav>
		<img  class="img1" src="logo.png" alt="Logo">
		<ul class="menu">
			<li class="navbar"><a href="home.php">Home</a></li>
			<li class="navbar"><a href="productos.php">Productos</a></li>
			<li class="navbar"><a href="comentarios.php">Contacto</a></li>
			<li class="navbar"><a href="../Clientes/clientes-login.php">Iniciar sesion</a></li>
			<li class="navbar"><a href="../Clientes/cerrar-sesion.php"> <?php echo "Bienvenido " . $_SESSION['nombre'] . " " . $_SESSION['apellido'];?> </a></li>
		</ul>
        <ul class="pading">
		<li ><a class="rojo"  href="mostrar-carrito.php">Carrito</a></li>
			
    </ul>
	</nav>
	<br><br><br>
</body>
</html>
