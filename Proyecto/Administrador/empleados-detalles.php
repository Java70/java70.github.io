<?php
session_start();
require "Funciones/conecta.php";
$con = conecta();



//recibe variables
$id =$_REQUEST['id'];
//asignacion consulta




$sql ="SELECT * FROM empleados WHERE id ='$id'";

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
                background-image: url('background.png');
                background-size: cover;
                background-position: 0 0,18px 18px;
               
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
            margin-top:3em;
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
        .menu{

margin:auto 0;

            }
            .contenedor{
                margin: auto;
                width:90%;
                
                padding: 3.5em 1em;
            
            }
   
            </style>
    
        <title>Detalles</title>
    </head>
 
    <div class="contenedor">

<div class="menu">

   <?php 
//session_star();
require "menu.php";
?>
   </div>
        
        </div>
    <form enctype="multipart/form-data" class="form" action="empleados-salva.php"  method="POST" >
    
    <h2 class="form_title">DETALLES</h2>
 
 
 <?php
 while($row = $res->fetch_array()){
     $rol =$row['rol'];
     if($rol ==0){
     $rol2="Empleado";
     }if($rol==1){
     $rol2="Administrador";
     }
     
     $eliminado = $row['eliminado'];
     if($eliminado==0){ 
        $eliminado2="Activo";
        }
if($eliminado==1){


    $eliminado2="Activo";
}

     ?>
     

     
     </div>

    <div class="form_group">
    <div>
    <img class="img" src="Funciones/archivos/<?php echo $row['archivo']; ?>" alt="<?php echo $row['nombre'] . ' ' . $row['apellido']; ?>">
 
   
      
    </div>
    </div>
    

    <div class="form_group">
    <input type="text" name="nombre" id="nombre" class="form_input" placeholder=" " readonly>
    <label for="nombre" class="form_label" > <?php echo $nombre =$row['nombre']?></label>
    
    </div>
    
    <div class="form_group">
    <input type="text" name="apellido" id="apellido" class="form_input"  placeholder=" " readonly>
    <label for="apellido" class="form_label"> <?php echo $apellido =$row['apellido']?></label>
   
    </div>
    
    <div class="form_group">
    <input type="text" name="correo" id="correo" class="form_input"  placeholder=" " readonly>
    <label for="correo" class="form_label"> <?php echo $correo =$row['correo']?> </label>
    
    </div>

    <div class="form_group">
    <input type="text" name="eliminado" id="eliminado" class="form_input"  placeholder=" " readonly>
    <label for="eliminado" class="form_label"> <?php echo $eliminado2 ?> </label>
    
    </div>


    <div class="form_group">
        <input type="text" name="rol" id="rol" class="form_input"  placeholder=" " readonly>
        <label for="rol" class="form_label"> <?php echo $rol2 ?></label>
      <br>  <br>  <br>
        </div>


    

    <?php
  }
    ?>
    <a href="empleados-lista.php" class="form_link">Salir</a>
    
    
    </form>
    
    
    
    </div>