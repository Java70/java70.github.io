<?php

session_start();
session_destroy();
header("location:../Front/home.php");

?>