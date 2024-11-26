<?php
session_start();
require "Funciones/conecta.php";
$con = conecta();


$correo=$_REQUEST["correo"];
$pass = $_REQUEST["pass"];

$passEnc =md5($pass);

$sql = "SELECT * FROM empleados WHERE correo='$correo' &&  password='$passEnc'";
$res =  $con->query($sql);
$filas = $res->num_rows;

echo$filas;



if ($filas==1){
    $row = $res->fetch_assoc();
    $_SESSION['idI'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellido'] = $row['apellido'];
//header("Location: bienvenido.php?id={$_SESSION['idI']}&nombre={$_SESSION['nombre']}&apellido={$_SESSION['apellido']}");
}



?>