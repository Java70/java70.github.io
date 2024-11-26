<?php
//empleados-lista.php
require "../Funciones/conecta.php";
$con = conecta();



$sql ="SELECT * FROM banners WHERE eliminado = 0";
$res  =  $con->query($sql);
$filas = $res->num_rows;

?>
<head>

<script src="../jquery-3.3.1.min.js"></script>
<script>

function validar(){
    
    <?php $id =$row['id']?>
    console.log(id);
    
   
    $.ajax({
        
    url      :  'banner-elimina.php?id=<?php echo $id; ?>',
    type     : 'post',
    dataType : 'text',
    data     : 'id=<?php echo $id; ?>',
    success :function(res){
  
  
    if(res==1){
        $('#mensaje').html('Usuario ELiminado Exitosamente');
    setTimeout("$('#mensaje').html('');",5000);
    
    }else{
        $('#mensaje').html('El Usuario No Fue ELiminado ');
    setTimeout("$('#mensaje').html('');",5000);
    

     }

      },error : function(){
alert('Error al conectar al servidor.....');

    }  

    });
      }
    

</script>



    <title>Lista de Banners</title>
</head>
<?php 
//session_star();
require "menu.php";
?>
<div class="contenedor"> 
<div class="divpadre"> 
<h2 class="lista">Lista de Banners</h2>

<p class="lista1">Numero de Banners <?php echo"$filas<br>"; ?> </p>


<br><a href="banner-alta.php" class="alta">Nuevo Producto</a> <br>
<div class="alerta" id="mensaje"></div>

<?php
echo "<br><br>";
?>
</div>
<table class="tabla">

<tr>
<td class="tabla2">ID</td>
<td class="tabla2">NOMBRE</td>

<td class="tabla2" colspan="3">OPCIONES</td>
<?php
while($row = $res->fetch_array()){


    ?>
    <tr>
<td class="tabla"><?php echo $id =$row['id']?></td>
<td class="tabla"><?php echo $nombre =$row['nombre']?></td>


<td class="tabla"><?php echo"<a href=\"banner-actualiza.php?id=$id\">Editar</a>"?></td>
<td class="tabla"><?php echo"<a href=\"banner-detalles.php?id=$id\">Detalles</a>"?></td>
<td class="tabla"><?php echo"<a onclick=\"validar(id);\">Eliminar</a>"?></td>


    </tr>

    </div>
    


<?php



}


?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Oswald&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
    a{  

        font-family: 'Roboto', sans-serif;
color:#4B75E3;

        
    }
      body{


        font-family: 'Roboto', sans-serif;
             
                background-image:  url('../background.png');
                background-size: cover;
            
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

</style>