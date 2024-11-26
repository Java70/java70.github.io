<?php
session_start();
require "../Funciones/conecta.php";
$con = conecta();

//recibe variables
$id =$_REQUEST['id'];
//asignacion consulta


require "menu.php";

$sql ="SELECT * FROM productos WHERE id ='$id'";
//$sql ="DELETE FROM empleados WHERE id =$id";
//peticion si la conexion fue exitosa ejecuta consulta
$res  =  $con->query($sql);
$num = $res->num_rows;



?>



 
    <head>
        <style>
           
              @import url('https://fonts.googleapis.com/css2?family=Oswald&display=swap');

            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
            * {
                margin:0;
                padding:0;
                box-sizing: border-box;
            
            }
            body{
                font-family: 'Roboto', sans-serif;
              
                background-image: url(../background.png);
                background-size: cover;
             
                display: flex;
                min-height: 100vh;
            }

            .form{
                background-color:#fff;
                margin: auto;
                width:90%;
                max-width:400px;
                padding: 4.5em 3em;
                border-radius:10px;
                box-shadow: 0 5px 10px -5px rgb(0 0 0 /30%);
                text-align:center;
            }
           
            .form_title{
                font-family: 'Oswald', sans-serif;
                font-size:2rem;
            margin-bottom:.5em;
            }
            .form_link{
             font-family: 'Oswald', sans-serif;
            font-weight:400;
            color:#000;
             font-size:1.5rem;
            }
            .form_container{
            margin-top:4em;
            display:grid;
            gap:2.5em;
            
            
            }
            .form_group{
            position:relative;
            --color:#00000;
         
            }


            .form_input{
            width: 100%;
            background: none;
            color: #706c6c;
            font-size: 1rem;
            padding: .6em .3em;
            border: none;
            outline: none;
            border-bottom: 1px solid var(--color);
            font-family: 'Roboto', sans-serif;
        
            }
            

            
        .img{
    margin: 0 auto;
  
    border-radius: 50%;
    width: 120px;
    height: 120px;

        }
   
            </style>
    
        <title>Detalles</title>
    </head>
 
    <form enctype="multipart/form-data" class="form" action=""  method="POST" >
    
    <h2 class="form_title">DETALLES</h2>
 
 
 <?php
 while($row = $res->fetch_array()){

     $eliminado = $row['eliminado'];
     if($eliminado==0){ 
        $eliminado2="Activo";
        }
    if($eliminado==1){
    $eliminado2="Activo";
    }

     ?>
     

    <div class="form_container">
    

    <div class="form_group">
    <div>
   
    <?php
    echo "<a href='detalles.php?id=" .$row['id']." '> <img class='img' src='../Productos/archivos/".$row['archivo']."'></a>";
      
    ?>
 

    </div>
    </div>
    

    <div class="form_group">
    <input type="text" name="nombre" id="nombre" class="form_input" placeholder=" " readonly>
    <label for="nombre" class="form_label" > <?php echo $nombre =$row['nombre']?></label>
    
    </div>
    
    <div class="form_group">
    <input type="text" name="codigo" id="codigo" class="form_input"  placeholder=" " readonly>
    <label for="codigo" class="form_label"> <?php echo $codigo =$row['codigo']?></label>
   
    </div>
    
    
    <div class="form_group">
    <input type="text" name="descripcion" id="desripcion" class="form_input"  placeholder=" " readonly>
    <label for="descripcion" class="form_label"> <?php echo $descripcion =$row['descripcion']?> </label>
    
    </div>

    <div class="form_group">
    <input type="text" name="costo" id="costo" class="form_input"  placeholder=" " readonly>
    <label for="costo" class="form_label">$ <?php echo $costo =$row['costo']?> </label>
    
    </div>
   




    

    <?php
  }
    ?>
    
    
    
    </form>
    
    
    
    </div>