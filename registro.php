<?php  

session_start();

require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = limpiarDatos ($_POST['usuario']);
	$pass = limpiarDatos ($_POST['password']);
	$pass = hash('sha512', $pass);
	$rol = $_POST['rol'];

	$errores = '';

	//validar campos de texto
	if (empty($usuario) || empty($pass) || empty($rol)) {
		$errores = '<li class="error">Por favor llene los campos requeridos.</li>';
	}else{
		//Validacion de que el usuario no exista.
		$conexion = conexion($bd_config);
		$statement = $conexion->prepare('SELECT * FROM users WHERE user_name = :usuario LIMIT 1');
		$statement->execute([
			':usuario' => $usuario
		]);
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .= '<li class="error">Este usuario ya existe</li>';
		}
	}

	if ($errores == '') {
		$conexion = conexion($bd_config);
		$statement = $conexion->prepare("INSERT INTO users (user_name, user_pass, type_user) VALUES (:usuario, :pass, :type)");
		$statement->execute([
			':usuario'=>$usuario,
			':pass'=> $pass,
			':type'=> $rol
		]);

		header('Location: '.RUTA.'login.php');	
	}
}



require 'views/registro.view.php';

?>