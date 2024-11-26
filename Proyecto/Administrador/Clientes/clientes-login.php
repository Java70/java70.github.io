<?php 
session_start();
if(isset($_SESSION['idC'])){

    


    header("Location:../Front/home.php");
    
    }
?>

<style>
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
        .mensaje{
            color:#F43107;
            font-family: 'Roboto', sans-serif;
            font-weight:300;
            font-size:1rem;



        }
   
            </style>



       <script src="../jquery-3.3.1.min.js"></script>
      <script>
function validar(){
    
var correo =$('#correo').val();
var pass=$('#pass').val();

if(correo != '' && pass!=''){

    
$.ajax({
url      : 'clientes-controlador.php',
type     : 'post',
dataType : 'text',
data     : 'correo='+correo+'&pass='+pass,
success :function(res){
console.log(res);
if(res==1){
window.location.href="../Front/home.php"
}else{
    $('#mensaje').html('Datos incorrectos');
setTimeout("$('#mensaje').html('');",5000);



}



},error : function(){
alert('Error al conectar al servidor.....');

}
});

}else{
$('#mensaje').html('Datos incompletos');
setTimeout("$('#mensaje').html('');",5000);

}

}

    </script>
        <title>Login</title>
   
    <body>
    
    <form  class="form" method="POST" >
     
    <h2 class="form_title">LOGIN</h2>
     <div class="mensaje" id="mensaje"></div>

    <div class="form_container">
    

    <div class="form_group">
    <input type="text" name="correo" id="correo" class="form_input"  placeholder=" ">
    <label for="correo" class="form_label">Correo</label>
    <span class="form_line"></span>
    </div>
    
    <div class="form_group">
    <input type="text" name="pass" id="pass" class="form_input"  placeholder=" ">
    <label for="pass" class="form_label">Contraseña</label>
    <span class="form_line"></span>
    </div>

    <a href="clientes-alta.php" class="form_link">Registrate</a>
  
    <input onclick="validar(); return false;"  type="submit" value="Entrar" name="registro" class="form_submit">
    <a href="empleados-lista.php" class="form_link">Salir</a>
    
    
    </form>
    
    
    
    </div>
    
    </body>
  