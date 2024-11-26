<?php
session_start();
require "../Funciones/conecta.php";
$con = conecta();

require "menu.php";


?>


<br><br><br>
<?php

$sql ="SELECT * FROM banners ORDER BY RAND() LIMIT 1 ";
$res  =  $con->query($sql);
$num = $res->num_rows;

while ($row = $res->fetch_assoc()) {
  echo "<div ><div><img class='banner' src='../Banners/archivos/".$row['archivo']."'></div></div/>";
}
?>
<br>
<?php
$sql ="SELECT * FROM productos ORDER BY rand() LIMIT 3";
$result  =  $con->query($sql);
$num = $result->num_rows;


while ($row = $result->fetch_assoc()) {
  echo "<div class='producto'>";
  echo "<form enctype='multipart/form-data' action='carrito.php' method='POST'>";
  echo "<div id='mensaje'></div>";
  echo "<input type='hidden' name='nombre' id='nombre" . $row['id'] . "' value='" . $row['nombre'] . "'>";
  echo "<input type='hidden' name='costo' id='costo" . $row['id'] . "' value='" . $row['costo'] . "' >";
  echo "<input type='hidden' name='cantidad' id='cantidad" . $row['id'] . "' value='1'>";

  echo "<a href='detalles.php?id=" .$row['id']." '> <img class='img' src='../Productos/archivos/".$row['archivo']."'></a>";
  echo "<h3>" . $row['nombre'] . "</h3>";
  echo "<p class='costo'>" . $row['costo'] . "</p>";
  echo "<a class='agregar-carrito' onclick='validar(" . $row['id'] . ");'>Agregar al carrito</a>";
  echo "</form>";
  echo "</div>";
}




?>

<!-- Ahora en el archivo HTML puedes imprimir la lista de productos generada por PHP -->
<!DOCTYPE html>
<html>
<head>


<script src="../jquery-3.3.1.min.js"></script>
<script>
function validar(id) {
   
  var costo = $('#costo' + id).val();
    var nombre = $('#nombre' + id).val();
    var cantidad = $('#cantidad' + id).val();


    console.log(id);
    console.log(cantidad);
    console.log(nombre);


$.ajax({
      url: "carrito.php",
      type: "post",
      dataType: "text",
      data: "id=" + id + "&nombre=" + nombre + "&costo=" + costo + "&cantidad=" + cantidad,
      success: function (res) {
        if (res == 1) {
          $("#mensaje").html("Producto agregado Exitosamente");
          setTimeout('$("#mensaje").html("");', 5000);
        
        } else {
         
        
        
        }
      },
      error: function () {
        alert("Error al conectar al servidor.....");
      },
    });
  }

</script>

  <title>Lista de productos</title>
  <style>
    .img{
width:13rem;
heigth:20rem;
    }
    .banner{

      display: block;
       margin: 0 auto;


    }
    /* Estilos CSS para los productos */
    .producto {
      display: inline-block;
      width: calc(25% - 10px);
      margin: 20px 55px;
      text-align: center;
     
	  
    }
    .img {
		max-width:auto;
max-height: auto;
	  padding: 10px;

    }
	.img:hover {
      opacity: 0.7;

    }

    .producto h3 {
      font-size: 18px;
      margin: 10px 0;
    }
    .producto .precio {
      font-size: 16px;
      margin: 10px 0;
      font-weight: bold;
    }
    .producto .agregar-carrito {
      display: inline-block;
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      margin-bottom: 10px;
      transition: background-color 0.3s;

      cursor:pointer;
    }
    .producto .agregar-carrito:hover {
      background-color: #ff0000;
    }


    footer {
  background-color: #F5F5F5;
  padding: 20px;
  box-shadow: 0px -1px 10px rgba(0, 0, 0, 0.1); /* Sombra en la parte superior */
}

.pagination {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.pagination li {
  margin: 0 5px;
}

.pagination li a {
  color: #333;
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.pagination li a:hover {
  background-color: #333;
  color: #FFF;
}
.foot{

text-align:center;

}

  </style>
</head>
<body>
  <div class="lista-productos">

  </div>
</body>
<footer>
  
  <p class="foot">Todos los derechos reservados 2023 </p>
</footer>

</html>
