<?php

require "../Funciones/conecta.php";
$con = conecta();

   
//recibe variables
$id = $_REQUEST["id"];
$codigo = $_REQUEST["codigo"];
$nombre = $_REQUEST["nombre"];
$descripcion = $_REQUEST["descripcion"];
$costo = $_REQUEST["costo"];
$stock = $_REQUEST["stock"];
$archivo = $_REQUEST["archivo"];

$file_name =$_FILES['archivo'] ['name'];
$file_tmp =$_FILES['archivo']['tmp_name'];
$cadena= explode(".", $file_name);
$pos =count($cadena)-1;
$ext=$cadena[$pos];
$dir="archivos/";
$file_enc =md5_file($file_tmp);

header("Location:productos-lista.php");


if($file_name!=''){
    $fileName1 ="$file_enc.$ext";
    copy($file_tmp, $dir.$fileName1);

}


$sql = "UPDATE productos SET 
            codigo = '$codigo', 
            nombre = '$nombre', 
            descripcion = '$descripcion', 
            costo = '$costo', 
            stock = '$stock', 
            archivo = '$fileName1'
        WHERE id = '$id'";

$res = $con->query($sql);

if (!$res) {
    die('Error al insertar los datos');
}
