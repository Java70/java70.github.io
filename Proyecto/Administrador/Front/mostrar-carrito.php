<?php
session_start();
  
require "../Funciones/conecta.php";
$con = conecta();

require "menu.php";

$sql = "SELECT * FROM empresa.cliente WHERE id = " . $_SESSION['idC'];
$resultado1 = $con->query($sql);

if ($resultado1->num_rows > 0) {
    $row = $resultado1->fetch_assoc(); // Obtener la fila del resultado
    $carrito = $row['carrito'];
    
    if ($carrito != 0) {
        // Obtener los productos del carrito para el cliente actual
        $sql = "SELECT productos.id, productos.nombre, productos.archivo, productos.costo, pedidos_productos.cantidad 
                FROM empresa.productos 
                JOIN empresa.pedidos_productos ON productos.id = pedidos_productos.id_producto AND pedidos_productos.cantidad > 0";
        $result = $con->query($sql);
        ?>
        <br><br><br>
        <table class="tabla">
            <tr>
                <td class="tabla2">NOMBRE</td>
                <td class="tabla2">COSTO</td>
                <td class="tabla2">CANTIDAD</td>
                <td class="tabla2">TOTAL</td>
                <td class="tabla2" colspan="3">OPCIONES</td>
            </tr>
            <?php
            $total_carrito;
            while ($row = $result->fetch_assoc()) {
                $id = $row['id']; // Asignar el ID del producto a la variable $id
                $total = $row['costo'] * $row['cantidad'];
      
                $carrito += $total; 
                ?>
                <tr id="<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $id; ?>" >
                    <td class="tabla"><?php echo $row['nombre']; ?></td>
                    <td class="tabla"><?php echo $row['costo']; ?></td>
                    <td class="tabla"><?php echo $row['cantidad']; ?></td>
                    <td class="tabla"><?php echo $total; ?></td>  
                    <td class="tabla"><?php echo"<a href=\"detalles.php?id=". $row['id'] . "\">Detalles</a>"?></td>
                    <td class="tabla"><?php echo"<a href=\"menos.php?id=". $row['id'] . "\">Eliminar</a>"?></td>
                    <td class="tabla"><?php echo"<a href=\"mas.php?id=". $row['id'] . "\">Aumentar</a>"?></td>
                  </tr>>
                <?php

            }
            ?>
        </table>
        <h3>Total del carrito: <?php echo $carrito; ?> </h3>

        <button class="finalizar-pedido" onclick="window.location.href = 'completado.php';">Finalizar Pedido</button>
        <?php
    } else {
        // Mostrar mensaje si el carrito está vacío
        echo '<p class="p">No hay productos en el carrito.</p>';
    }
} else {
    // Mostrar mensaje si no se encuentra el cliente
    echo '<p class="p">No se encontró el cliente.</p>';
}
?>

<script src="../jquery-3.3.1.min.js"></script>
<script>
function validar(id) {
    var cantidad = $('#cantidad-' + id).text();

  console.log(id);
  
    $.ajax({
      url: "menos.php",
      type: "post",
      dataType: "text",
      data: "id=" + id + "&cantidad=" + cantidad,
      success: function (res) {
        if (res == 1) {
          $("#mensaje").html("Producto Eliminado Exitosamente");
          setTimeout('$("#mensaje").html("");', 5000);
        
        } else {
            $("#mensaje").html("Producto No Eliminado Exitosamente");
          setTimeout('$("#mensaje").html("");', 5000);
          
         
        }
      },
      error: function () {
        alert("Error al conectar al servidor.....");
      },
    });
  
}

   
      
    

</script>




<style>
h3{


    text-align: center;
    color: #333;
}
.p{
   
    font-family: "Arial", sans-serif;
    text-align: center;
    padding-top: 100px;
    font-size: 36px;
    color: #333;
    
}
/* Estilos de la tabla */
.tabla {
  margin: 0 auto; /* Centrar la tabla en la pantalla */
  width: 80%; /* Ancho de la tabla */
  border-collapse: collapse;
}

.tabla td {
  padding: 10px;
  text-align: center;
  border: 1px solid #ccc;
}

/* Estilos de los botones o enlaces */
a {
  text-decoration: none;
}

a:hover {
  color: red; /* Cambiar el color del texto al hacer hover */
}

/* Estilos de la sombra */
.shadow {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Alineación de los elementos */
.producto {
  display: flex;
  align-items: center;
}

/* Estilos del botón finalizar-pedido */
.finalizar-pedido {
  display: block;
  margin: 20px auto;
  padding: 10px 20px;
  background-color: #f44336;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.finalizar-pedido:hover {
  background-color: #d32f2f;
}



</style>