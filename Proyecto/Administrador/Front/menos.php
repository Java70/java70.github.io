<?php
session_start();

require "../Funciones/conecta.php";
$con = conecta();


$cantidad = $_REQUEST['cantidad'];
$id = $_REQUEST['id'];

 
 $sql = "SELECT id_producto, cantidad FROM empresa.pedidos_productos WHERE id_pedido = {$_SESSION['pedido']} AND id_producto = $id";
 $result = $con->query($sql);

 if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
     $cantidad_actual = $row['cantidad'];

     // Incrementar la cantidad en 1
     $nueva_cantidad = $cantidad_actual - 1;

     // Actualizar la cantidad del producto en la tabla de pedidos_productos
     $sql = "UPDATE empresa.pedidos_productos SET cantidad = $nueva_cantidad WHERE id_pedido = {$_SESSION['pedido']} AND id_producto = $id";
     if ($con->query($sql) === TRUE) {
         echo "El producto se ha agregado al pedido correctamente.";
     } else {
         echo "Error al actualizar la cantidad del producto: " . $con->error;
     }


 header("Location:mostrar-carrito.php");
    }
    header("Location:mostrar-carrito.php");



?>