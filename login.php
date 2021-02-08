<?php

require_once("config/db.php");
require_once("class/Login.php");

$login = new Login();

if ($login->isUserLoggedIn() == true) {
   header("location: home.php");
} else {
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <title>Gestiones | GAD Flavio Alfaro</title>
    <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/login.css">
    <link rel=icon href='views/img/logo-icon.png' sizes="32x32" type="image/png">
</head>

<body>
    <div class="container">
        <div class="card card-container">
            <center><img id="profile-img" class="" src="views/img/avatar_2x.png" /></center>
            <p id="profile-name" class="profile-name-card"></p>
            <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form"
                class="form-signin">
                <?php
				
				if (isset($login)) {
					if ($login->errors) {
						?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>Error!</strong>

                    <?php 
						foreach ($login->errors as $error) {
							echo $error;
						}
						?>
                </div>
                <?php
					}
					if ($login->messages) {
						?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>Aviso!</strong>
                    <?php
						foreach ($login->messages as $message) {
							echo $message;
						}
						?>
                </div>
                <?php 
					}
				}
				?>
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" placeholder="Usuario" name="user_name" type="text" value="" autofocus=""
                    required>
                <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value=""
                    autocomplete="off" required>
                <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submit">Iniciar
                    Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
}