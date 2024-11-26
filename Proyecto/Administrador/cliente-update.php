<?php
require "Funciones/conecta.php";
$con = conecta();


//recibe variables
$id = $_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$correo = $_REQUEST["correo"];
$pass = $_REQUEST["pass"];
$passEnc =md5($pass);
//asignando consulta


header("Location:cliente-lista.php");

$sql ="UPDATE cliente SET nombre='$nombre', apellido='$apellido', correo='$correo' WHERE id='$id'";
$con->query($sql);
$res  =  $con->query($sql);



?>