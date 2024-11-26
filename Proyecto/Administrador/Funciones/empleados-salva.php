<?php

require "conecta.php";
$con = conecta();

   
//recibe variables
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$correo = $_REQUEST["correo"];
$pass = $_REQUEST["pass"];
$rol = $_REQUEST["rol"];
$passEnc =md5($pass);

$file_name =$_FILES['archivo'] ['name'];
$file_tmp =$_FILES['archivo']['tmp_name'];
$cadena= explode(".", $file_name);
$pos =count($cadena)-1;
$ext=$cadena[$pos];
$dir="archivos/";
$file_enc =md5_file($file_tmp);

header("Location:../empleados-lista.php");
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

$sql ="INSERT INTO empleados(nombre, apellido, correo, password ,rol,archivo, archivo_original )
 VALUES ('$nombre','$apellido','$correo','$passEnc',$rol,'$file_enc.$ext','$file_name')";

$res = $con->query($sql);






?>