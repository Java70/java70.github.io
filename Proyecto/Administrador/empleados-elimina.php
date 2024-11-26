<?php
//empleados-elimina.php
require "Funciones/conecta.php";
$con = conecta();

//recibe variables
 $id =$_REQUEST['id'];
//asignacion consulta
$sql ="UPDATE  empleados SET eliminado=1 WHERE id =$id";
//$sql ="DELETE FROM empleados WHERE id =$id";
//peticion si la conexion fue exitosa ejecuta consulta
$res=$con->query($sql);
$filas = $res->num_rows;

echo$filas;
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Si se hizo la petición con AJAX, no redirigir a la página siguiente
    die('Registro eliminado exitosamente.');
} else {
    // Si se hizo la petición de forma tradicional, redirigir a la página siguiente
    header("Location:empleados-lista.php");
}

?>