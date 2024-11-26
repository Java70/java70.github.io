<?php
require "Funciones/conecta.php";
$con = conecta();


//recibe variables
$id = $_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$correo = $_REQUEST["correo"];
$pass = $_REQUEST["pass"];
$rol = $_REQUEST["rol"];
$passEnc =md5($pass);
//asignando consulta

$file_name =$_FILES['archivo'] ['name'];
$file_tmp =$_FILES['archivo']['tmp_name'];
$cadena= explode(".", $file_name);
$pos =count($cadena)-1;
$ext=$cadena[$pos];
$dir="Funciones/archivos/";
$file_enc =md5_file($file_tmp);
/*
echo"ID: $id<br>";
echo"file_name: $file_name<br>";
echo"file_tmp: $file_tmp<br>";
echo"ext: $ext<br>";
echo"file_enc: $file_enc<br>";*/
if($file_name!=''){
    $fileName1 ="$file_enc.$ext";
    copy($file_tmp, $dir.$fileName1);

}
header("Location:empleados-lista.php");

$sql ="UPDATE empleados SET nombre='$nombre', apellido='$apellido', correo='$correo', rol='$rol',password='$passEnc', archivo='$file_enc.$ext', archivo_original = '$file_name' WHERE id='$id'";
$con->query($sql);
$res  =  $con->query($sql);



?>