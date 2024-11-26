<?php
session_start();
require "../Funciones/conecta.php";
$con = conecta();


$correo=$_REQUEST["correo"];
$pass = $_REQUEST["pass"];

$passEnc =md5($pass);

$sql = "SELECT * FROM cliente WHERE correo='$correo' &&  pass='$passEnc'";
$res =  $con->query($sql);
$filas = $res->num_rows;

echo$filas;



if ($filas==1){
    $row = $res->fetch_assoc();
    $_SESSION['idC'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellido'] = $row['apellido'];
    $_SESSION['carrito'] = $row['carrito'];

}



?>