<?php
session_start();
require "Funciones/conecta.php";
$con = conecta();



 
$sql ="SELECT * FROM pedidos WHERE status = 0";
$res  =  $con->query($sql);
$filas = $res->num_rows;
while($row = $res->fetch_array()){






}








?>