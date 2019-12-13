<!DOCTYPE html>
<html lang="es">
	<head>
		<title>LOGIN</title>
		 <link rel="stylesheet" type="text/css" href="estilos/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="estilos/login.css">
		<meta charset="utf-8">
	</head>
  <body class="text-center">

    <form id="login-form" class="form" action="scripts_php/validar_usuario.php" method="POST">

      <img class="mb-4" src="estilos/logo.png" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>

      <input type="text" name="txt_usuario" class="form-control" placeholder="Usuario..." required autofocus>
      <input type="password" name="txt_clave" class="form-control" placeholder="contraseña..." required>
      <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

  </body>
</html>