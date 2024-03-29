<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="input-group">
				<i class="fa fa-user-o icons"></i>
				<input type="text" class="form-control" name="usuario" placeholder="Usuario">
			</div>
			<div class="input-group">
				<i class="fa fa-lock icons"></i>
				<input type="password" class="form-control" name="password" placeholder="Contraseña">
			</div>

			<ul>
				<?php if(!empty($errores)): ?>
				<?php echo $errores ?>
				<?php endif; ?>
			</ul>

			<button type="submit" name="submit" class="btn btn-flat-green">Ingresar</button>
		</form>

		<a href="<?php echo RUTA. 'registro.php' ?>" class="login-link">¿No tienes cuenta?</a>
	</div>
</body>
</html>