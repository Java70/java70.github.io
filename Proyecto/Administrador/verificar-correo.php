<?php

require "Funciones/conecta.php";
$con = conecta();


$correo=$_REQUEST["correo"];



$sql ="SELECT * FROM empleados WHERE correo = '$correo'";
$res =  $con->query($sql);
$filas = $res->num_rows;
echo$filas;
?>