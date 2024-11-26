<?php

require "../Funciones/conecta.php";
$con = conecta();

   
//recibe variables
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$correo = $_REQUEST["correo"];
$pass = $_REQUEST["pass"];

$passEnc =md5($pass);



header("Location:../Front/home.php");


$sql ="INSERT INTO cliente(nombre, apellido, correo, pass)
 VALUES ('$nombre','$apellido','$correo','$passEnc')";

$res = $con->query($sql);






?>