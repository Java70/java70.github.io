<?php
//empleados-lista.php
require "Funciones/conecta.php";
$con = conecta();



require "validacion-usuario.php"; 
$sql ="SELECT * FROM empleados WHERE eliminado = 0";
$res  =  $con->query($sql);
$filas = $res->num_rows;

?>
<head>

<script src="jquery-3.3.1.min.js"></script>
<script>
function validar(id) {
   
  console.log(id);
  if (confirm("¿Desea eliminar esta fila?")) {
    $.ajax({
      url: "empleados-elimina.php",
      type: "post",
      dataType: "text",
      data: "id=" + id,
      success: function (res) {
        if (res == 1) {
          $("#mensaje").html("Usuario Eliminado Exitosamente");
          setTimeout('$("#mensaje").html("");', 5000);
        
        } else {
         
          $("#" + id).remove();
         
        }
      },
      error: function () {
        alert("Error al conectar al servidor.....");
      },
    });
  }
}

   
      
    

</script>



    <title>Lista de empleados</title>
</head>
<body>
<div class="contenedor1">

<div class="menu">

   <?php 
//session_star();
require "menu.php";
?>
   </div>
        
        </div>

<div class="contenedor"> 
<div class="divpadre"> 
<h2 class="lista">Lista de empleados</h2>

<p class="lista1">Numero de Usuarios <?php echo"$filas<br>"; ?> </p>


<br><a href="empleados-alta.php" class="alta">Nuevo empleado</a> <br>
<div class="alerta" id="mensaje"></div>

<?php
echo "<br><br>";
?>
</div>
<table class="tabla">

<tr>
<td class="tabla2">ID</td>
<td class="tabla2">NOMBRE</td>
<td class="tabla2">APELLIDO</td>
<td class="tabla2">CORREO</td>
<td class="tabla2">ESTADO</td>
<td class="tabla2" colspan="3">OPCIONES</td>
<?php
while($row = $res->fetch_array()){
    $rol =$row['rol'];
if($rol ==0){



$rol2="Empleado";

}if($rol==1){

$rol2="Administrador";

}

    ?>
    
   

    <tr id="<?php echo $fila =$row['id']?>">

<td class="tabla"><?php echo $id =$row['id']?></td>
<td class="tabla"><?php echo $nombre =$row['nombre']?></td>
<td class="tabla"><?php echo $apellido =$row['apellido']?> </td>
<td class="tabla"><?php echo $correo =$row['correo']?> </td>
<td class="tabla"><?php echo $rol2 ?></td>
<td class="tabla"><?php echo"<a href=\"empleados-actualiza.php?id=$id\">Editar</a>"?></td>
<td class="tabla"><?php echo"<a href=\"empleados-detalles.php?id=$id\">Detalles</a>"?></td>
<td class="tabla"><?php echo"<a onclick=\"validar(id=$id);\">Eliminar</a>"?></td>


    </tr>

  


<?php



}


?>

  </div>
    </div>
 
</body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Oswald&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
    a{  

        font-family: 'Roboto', sans-serif;
color:#4B75E3;

        
    }
      body{


        font-family: 'Roboto', sans-serif;
            
                background-image: url('background.png');
                background-size: cover;
                background-position: 0 0,18px 18px;
      }

      .alta{
        background:#909090;
            color:#000;
            font-family: 'Oswald', sans-serif;
            font-weight:300;
            font-size:1rem;
            padding:.2em 0;
            border:none;
            border-radius:.5em;
      }
      .lista{
        
        color:#000;
        font-family: 'Oswald', sans-serif;
            font-weight:3;
            font-size:2rem;
            padding:.1em 0;
            border:none;
            border-radius:.5em;

      }
      .lista1{

        color:#000;
        font-family: 'Oswald', sans-serif;
            font-weight:300;
            font-size:1.5rem;
        
            border-radius:.5em;

      }
    .tabla2{
        border: 1px solid;
text-align:center;

background-color:#909090;

    }
.tabla{
border: 1px solid;

}
.tabla3{

    border: 1px solid;
text-align:center;


}
.backgroud{

backgroud:black;


}

.contenedor{
    display: block;
   max-width: 1100px; /* ajusta el valor a tu preferencia */
   margin: 0 auto; /* centra horizontalmente */
}
table {
font-family: 'Roboto', sans-serif;
    text-align:center;
   max-width: 100%;
   width: 100%;
   border-collapse: collapse;
   background-color:#fff;
}

td, td {
   padding: 8px;
   border: 1px solid #ddd;
}

@media (max-width: 767px) {
   table {
      font-size: 12px;
   }

   td, td {
      padding: 5px;
   }
}
.divpadre{


    text-align:center;

}
.contenedor1{
                margin: auto;
                width:90%;
                
                padding: 1em 1em;
            
            }

</style>