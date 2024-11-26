<?php

require "../Funciones/conecta.php";
$con = conecta();

   
//recibe variables

$nombre = $_REQUEST["nombre"];
$archivo = $_REQUEST["archivo"];

$file_name =$_FILES['archivo'] ['name'];
$file_tmp =$_FILES['archivo']['tmp_name'];
$cadena= explode(".", $file_name);
$pos =count($cadena)-1;
$ext=$cadena[$pos];
$dir="archivos/";
$file_enc =md5_file($file_tmp);


header("Location:banner-lista.php");


if($file_name!=''){
    $fileName1 ="$file_enc.$ext";
    copy($file_tmp, $dir.$fileName1);

}

$sql ="INSERT INTO empresa.banners(nombre, archivo) VALUES ('$nombre','$file_enc.$ext')";


$res = $con->query($sql);

alert($res);
if (!$res) {
    die('Error al insertar los datos');
}



?>