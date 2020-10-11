<?php session_start();

require 'admin/config.php';
require 'functions.php';

//COMPROBAR SESION
if (!isset($_SESSION['usuario'])) {
	header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$tipo = $_SESSION['type_user'];

if ($tipo == 'USUARIO') {
	require 'views/usuario.view.php';
}else{
	header('Location: '.RUTA.'index.php');
}

?>