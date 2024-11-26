<?php

require "../Funciones/conecta.php";
$con = conecta();


$codigo=$_REQUEST["codigo"];



$sql ="SELECT * FROM productos WHERE codigo = '$codigo'";
$res =  $con->query($sql);
$filas = $res->num_rows;
echo$filas;
?>