<?php
//Ubicacion Funciones/conecta.php
define("HOST", 'localhost:3306');
define("BD",'empresa');
define("USER_BD",'root');
define("PASS_BD",'');



function conecta(){
$con=new mysqli(HOST, USER_BD, PASS_BD, BD);
$con->set_charset("utf8");
return $con;
} 

?>