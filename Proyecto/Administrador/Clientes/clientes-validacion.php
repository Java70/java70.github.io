<?php
session_start();









if(!isset($_SESSION['idC'])){

    
header("Location:../Clientes/clientes-login.php");

}