<?php

require "../Funciones/conecta.php";
$con = conecta();


session_start();
//recibe variables
$id = $_REQUEST['id'];
//asignacion consulta


$sql ="SELECT * FROM productos WHERE id ='$id'";

$res  =  $con->query($sql);
$num = $res->num_rows;



?>


    <!DOCTYPE html>
   <html lang="en">
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
                background-color: #e5e5f7;
                background-image:  radial-gradient(#171830 0.9px, transparent 0.9px), radial-gradient(#171830 0.9px, #ffffff 0.9px);
                background-size: 36px 36px;
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


            font-weight:400;
            color:#000;

            }
            .form_container{
            margin-top:3em;
            display:grid;
            gap:2.5em;
            
            
            }
            .form_group{
            position:relative;
            --color:#5757577e;
            
            
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

            .form_input:not(:placeholder-shown){
            color:#4d4646;
            }

            .form_input:focus + .form_label,
            .form_input:not(:placeholder-shown) + .form_label{ 
            transform:translateY(-15px) scale(.7);
            transform-origin:left top;
            color:#3866f2;
            
            }
            
            .form_label{
            color:var(--color);
            cursor:pointer;
            position:absolute;
            top:0;
            left:5px;
            transform:translateY(10px);
            transition:transform .5s, color .3s;
            }
            
            .form_submit{
            
            background:#3866f2;
            color:#fff;
            font-family: 'Roboto', sans-serif;
            font-weight:300;
            font-size:1rem;
            padding:.8em 0;
            border:none;
            border-radius:.5em;
            cursor: pointer;
            
            }
            .form_line{
            position:absolute;
            bottom:0;
            left:0;
            width:100%;
            height:1px;
            background-color:#3866f2;
            transform:scale(0);
            transform:left bottom;
            transition:transform .4s;
            }
            .form_input:focus ~ .form_line,
            .form_input:not(:placeholder-shown) ~ .form_line{
            
            transform:scale(1);
            
            }
          
            
            @media (max-width:425px){
                .form_title{    
        font-size: 1.8rem;
            }
        }
        .form_select{


            background:#3866f2;
            color:#fff;
            font-family: 'Roboto', sans-serif;
            font-weight:300;
            font-size:1rem;
            padding:.4em 0;
            border:none;
            border-radius:.5em;
             text-align: center;
        }
        .alerta{



            color:tomato;
        }
   
        .form_input1{
            cursor:default;
            display:none;
           
            
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

      <script src="../jquery-3.3.1.min.js"></script>
      <script>

function validar(){
    
    var nombre =$('#nombre').val();
    var codigo=$('#codigo').val();
    var descripcion=$('#descripcion').val();
    var stock=$('#stock').val();
    var id=$('#id').val();
    var archivo=$('#archivo').val();
    var status=$('#status').val();
   
console.log(rol);

    if(nombre!= ''&& codigo!='' && descripcion!='' && stock!=''){//todo menos la contraseña
     

        $.ajax({
url      : 'productos-update.php',
type     : 'post',
dataType : 'text',
data     : 'id='+id+'&nombre='+nombre+'&costo='+costo+'&descripcion='+descripcion+'&status='+status+'&codigo='+codigo,
success :function(res){

if(res==1){
 $('#mensaje').html(' Actualizacion Erronea');

setTimeout("$('#mensaje').html('');",5000);


}else
{
    $('#mensaje').html(' Actualizacion Exitosa');
setTimeout("$('#mensaje').html('');",5000);


window.location.href="productos-lista.php";
}



},error : function(){
alert('Error al conectar al servidor.....');

}
});
}else{
$('#mensaje').html('Datos incompletos');
setTimeout("$('#mensaje').html('');",5000);

}
    } //funcion validar


    function fueraFoco(){
     var codigo =$('#codigo').val();
    $.ajax({
url      : 'verificar-codigo.php',
type     : 'post',
dataType : 'text',
data     : 'codigo='+codigo,
success :function(res){
    
    if(res==1){
    $('#mensaje').html(codigo+ ' YA EXISTE');
setTimeout("$('#mensaje').html('');",5000);


}else{
    $('#mensaje').html('CODIGO APROVADO');
setTimeout("$('#mensaje').html('');",5000);



}



},error : function(){
alert('Error al conectar al servidor.....');

}
});
}

function dentroFoco(){
    $('#mensaje').html('');


}
   

    </script>
        <title>Actualizar</title>
    </head>
  
    <body>
        <div class="contenedor">

<div class="menu">

   <?php 
//session_star();
require "../menu.php";
?>
   </div>
        
        </div>
   
    <?php
 while($row = $res->fetch_array()){
    
     
     ?>

    <form enctype="multipart/form-data" class="form" action="productos-update.php"  method="POST" >
      
    
    <h2 class="form_title">Actualizar</h2>
    <br>

   <div class="alerta" id="mensaje"></div>


    <div class="form_container">
    
    <div class="form_group1">
    <input type="text" name="id" id="id" class="form_input1"  value=" <?php echo $id =$row['id']?> "readonly>
    
 
    </div>
    


    <div class="form_group">
    <input type="text" name="nombre" id="nombre" class="form_input" placeholder=" " value="<?php echo $nombre =$row['nombre']?>">
    <label for="name" class="form_label">Nombre </label>
    <span class="form_line"></span>
    </div>
    
    <div class="form_group">
    <input type="text" name="descripcion" id="descripcion" class="form_input"  placeholder=" " value="<?php echo $descripcion =$row['descripcion']?>">
    <label for="descripcion" class="form_label">Descripcion </label>
    <span class="form_line"></span>
    </div>
    
    <div class="form_group">
    <input onfocus="dentroFoco();"  onblur="fueraFoco();" type="text" name="codigo" id="codigo" class="form_input"  placeholder=" " value="<?php echo $codigo =$row['codigo']?>">
    <label for="codigo" class="form_label">Codigo</label>
    <span class="form_line"></span>
    </div>
    
    <div class="form_group">
    <input type="text" name="stock" id="stock" class="form_input"  placeholder=" " value="<?php echo $stock =$row['stock']?>">
    <label for="stock" class="form_label">Stock</label>
    <span class="form_line"></span>
    </div>
    <div class="form_group">
    <input type="text" name="stock" id="stock" class="form_input"  placeholder=" " value="<?php echo $stock =$row['costo']?>">
    <label for="stock" class="form_label">Costo</label>
    <span class="form_line"></span>
    </div>
    <div class="form_group">
<input class="form_file" type="file" id="archivo" name="archivo" value="<?php echo $archivo =$row['archivo']?>">

</div>


   
    <input onclick="validar(); "  type="submit" value="Actualizar" name="registro" class="form_submit">
    <a href="productos-lista.php" class="form_link">Salir</a>
    <?php
      }
      ?>
    </form>
    
    
    
    </div>
    
    </body>
    </html>



