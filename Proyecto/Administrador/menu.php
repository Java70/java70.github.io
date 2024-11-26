<?php

//session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            background-color: #909090;
            max-width: 80%;
            margin: auto;
            padding: 15px 0;
            box-sizing: border-box;
        }

        nav a {
            color: white;
            text-align: center;
            padding: 5px 10px;
            text-decoration: none;
            font-size: 15px;
            flex: 1; /* Autoajuste de ancho */
            min-width: 80px; /* Ancho mínimo para que no se colapsen */
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        nav a.active {
            background-color: #4CAF50;
            color: white;
        }

        nav a.cerrar {
            background-color: #EB1F1F;
            color: white;
        }

        /* Para pantallas pequeñas */
        @media (max-width: 600px) {
            nav {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<nav>
		<!--<a class="active" href="" <?php // echo "Bienvenido " . $_SESSION['nombre'] . " " . $_SESSION['apellido'];?> </a>-->
		<a href="empleados-lista.php">Lista de Empleados</a>
		<a href="cliente-lista.php">Lista de Clientes</a>
		<a href="Productos/productos-lista.php">Lista de Productos </a>
		<a href="Pedidos/pedidos-lista.php">Lista de Pedidos</a>
		<a href="Banners/banner-lista.php">Lista de Banners</a>
        <a href="bienvenido.php">Inicio</a>
        <a  class="cerrar" href="cerrar-sesion.php">Cerrar sesion</a>
	</nav>



	



</body>
</html>