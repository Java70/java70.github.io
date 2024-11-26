<?php 
require "validacion-usuario.php"; 

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
        .menu{

margin:auto 0;

            }
            .contenedor{
                margin: auto;
                width:90%;
                
                padding: 3.5em 1em;
            
            }
            </style>

      <script src="jquery-3.3.1.min.js"></script>
      <script>

function validar(){
    
    var correo =$('#correo').val();
    var pass=$('#pass').val();
    var nombre=$('#nombre').val();
    var apellidos=$('#apellido').val();
  



    if(correo != '' && pass !='' && nombre !='' && apellido !=''){
        return true;
}else{
$('#mensaje').html('Datos incompletos');
setTimeout("$('#mensaje').html('');",5000);
return false;
}
    } 



    function fueraFoco(){
    
     var correo =$('#correo').val();
    $.ajax({
url      : 'verificar-correo.php',
type     : 'post',
dataType : 'text',
data     : 'correo='+correo,
success :function(res){
    console.log(res);
if(res==1){
    $('#mensaje').html(correo+ ' Ya Existe');
setTimeout("$('#mensaje').html('');",5000);
var bandera=1;
$('#correo').val('');
//window.location.href="bienvenido.php"
}else{
    $('#mensaje').html(' Correo Aprovado');
setTimeout("$('#mensaje').html('');",5000);

var bandera=0;

}



},error : function(){
alert('Error al conectar al servidor.....');

}
});
}

    </script>
        <title>Alta de Usuario</title>
    </head>
    <body>
    
    <div class="contenedor">

<div class="menu">

   <?php 
//session_star();
require "menu.php";
?>
   </div>
        
        </div>
     
     </div>
    <form enctype="multipart/form-data" class="form" action="Funciones/empleados-salva.php"  method="POST"  onsubmit="return validar();" >
      
    <h2 class="form_title">REGISTRO</h2>
   <div class="alerta" id="mensaje"></div>

    <div class="form_container">
    
    <div class="form_group">
    <input type="text" name="nombre" id="nombre" class="form_input" placeholder=" ">
    <label for="name" class="form_label">Nombre</label>
    <span class="form_line"></span>
    </div>
    
    <div class="form_group">
    <input type="text" name="apellido" id="apellido" class="form_input"  placeholder=" ">
    <label for="apellido" class="form_label">Apellidos</label>
    <span class="form_line"></span>
    </div>
    
    <div class="form_group">
    <input onfocus="dentroFoco();"  onblur="fueraFoco();" type="text" name="correo" id="correo" class="form_input"  placeholder=" ">
    <label for="correo" class="form_label">Correo</label>
    <span class="form_line"></span>
    </div>
    
    <div class="form_group">
    <input type="text" name="pass" id="pass" class="form_input"  placeholder=" ">
    <label for="pass" class="form_label">Contraseña</label>
    <span class="form_line"></span>
    </div>
    <div class="form_group">
<input class="form_file" type="file" id="archivo" name="archivo">
</div>
 

    <div class="form_group">
    <select class="form_select" name="rol" id="rol">
        <option value="0">Empleado</option>
        <option value="1">Administrador</option>
    </select>
    </div>
 
    <input onclick="validar();"  type="submit" value="Registrar" name="registro" class="form_submit">
   
     <a href="empleados-lista.php" class="form_link">Salir</a>
    
    
    </form>
    
    
    
    </div>
    
    </body>
    </html>