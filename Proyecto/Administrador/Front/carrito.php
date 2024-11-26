<?php
session_start();

require "../Funciones/conecta.php";
$con = conecta();

$nombre = $_REQUEST['nombre'];
$costo = $_REQUEST['costo'];
$cantidad = $_REQUEST['cantidad'];
$id = $_REQUEST['id'];

$sql = "SELECT * FROM empresa.cliente WHERE id = " . $_SESSION['idC'];
$resultado1 = $con->query($sql);

if ($resultado1->num_rows > 0) {
    $row = $resultado1->fetch_assoc();
    $carrito = $row['carrito'];

    if ($carrito == 0) {


        // Actualizar el carrito en la tabla de cliente
        $sql = "UPDATE empresa.cliente SET carrito = 1 WHERE id = " . $_SESSION['idC'];
        $re = $con->query($sql);


        // Insertar el pedido en la tabla de pedidos
        $sql = "INSERT INTO empresa.pedidos (fecha, id_cliente) VALUES (NOW(), " . $_SESSION['idC'] . ")";
        if ($con->query($sql) === TRUE) {
            $id_pedido = $con->insert_id;
            $_SESSION['pedido'] = $id_pedido;
        }
        

            // Insertar el producto en la tabla de pedidos_productos
            $sql = "INSERT INTO empresa.pedidos_productos (id_pedido, id_producto, cantidad, costo) VALUES ({$_SESSION['pedido']}, $id, $cantidad, $costo)";
            if ($con->query($sql) === TRUE) {
                echo "El producto se ha agregado al pedido correctamente.";
            } else {
                echo "Error al agregar el producto al pedido: " . $con->error;
            }
        
    } else {
        
            // Verificar si el producto ya existe en la tabla de pedidos_productos
            $sql = "SELECT id_producto, cantidad FROM empresa.pedidos_productos WHERE id_pedido = {$_SESSION['pedido']} AND id_producto = $id";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $cantidad_actual = $row['cantidad'];

                // Incrementar la cantidad en 1
                $nueva_cantidad = $cantidad_actual + 1;

                // Actualizar la cantidad del producto en la tabla de pedidos_productos
                $sql = "UPDATE empresa.pedidos_productos SET cantidad = $nueva_cantidad WHERE id_pedido = {$_SESSION['pedido']} AND id_producto = $id";
                if ($con->query($sql) === TRUE) {
                    echo "El producto se ha agregado al pedido correctamente.";
                } else {
                    echo "Error al actualizar la cantidad del producto: " . $con->error;
                }
            } else {
                // Insertar el nuevo producto en la tabla de pedidos_productos
                $sql = "INSERT INTO empresa.pedidos_productos (id_pedido, id_producto, cantidad, costo) VALUES ({$_SESSION['pedido']}, $id, $cantidad, $costo)";
                if ($con->query($sql) === TRUE) {
                    echo "El producto se ha agregado al pedido correctamente.";
                } else {
                    echo "Error al agregar el producto al pedido: " . $con->error;
                }
            }
        
    }
} else {
    // Mostrar mensaje si no se encuentra el cliente
    echo '<p class="p">No se encontró el cliente.</p>';
}
?>
