<?php

require "conecta.php";
$con = conecta();

   
//recibe variables
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$correo = $_REQUEST["correo"];
$pass = $_REQUEST["pass"];
$passEnc =md5($pass);


header("Location:../cliente-lista.php");
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

$sql ="INSERT INTO cliente(nombre, apellido, correo, pass )
 VALUES ('$nombre','$apellido','$correo','$passEnc')";

$res = $con->query($sql);






?>