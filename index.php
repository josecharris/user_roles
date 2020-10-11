<?php
session_start();
require 'admin/config.php';
require 'functions.php';

//comprobar session
if (!isset($_SESSION['usuario'])) {
	header('Location: '.RUTA.'login.php');
}

//Validad los datos por privilegios
$conexion = conexion($bd_config);
$statement = $conexion->prepare('SELECT * FROM users WHERE user_name=:usuario AND user_pass=:password');

$tipo = $_SESSION['type_user'];

if ($tipo == "ADMINISTRADOR") {
	header("Location: ".RUTA."admin.php");
}elseif ($tipo == "USUARIO") {
	header("Location: ".RUTA."usuario.php");
}else{
	header("Location: ".RUTA."login.php");
}


?>