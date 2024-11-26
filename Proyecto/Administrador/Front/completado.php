<?php

session_start();

require "../Funciones/conecta.php";
$con = conecta();


$sql = "UPDATE empresa.cliente SET carrito = 0 WHERE id = " . $_SESSION['idC'];
$resultados = $con->query($sql);







?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedido Completado</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            text-align: center;
            padding-top: 100px;
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
    <script>
        setTimeout(function() {
            window.location.href = "home.php"; // Cambia "nueva_pagina.php" por la URL a la que deseas redirigir
        }, 4000); 
    </script>
</head>
<body>
    <h1>Gracias, pedido completado exitosamente</h1>
</body>
</html>
