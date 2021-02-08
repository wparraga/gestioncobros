<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
    require_once ("config/db.php");
    require_once ("config/conexion.php");
	$home="active";
	$active_tarifario="";
	$active_rubros="";
	$active_usuarios="";	
	$title= "Gestión de Cobros";
?>
<html lang="es">

<head>
    <?php include 'views/head.php';?>
</head>

<body>
    <?php include 'views/navbar.php';?>
    <br>
    <br>
    <div class="container">
        <div align="center" class="panel panel-success">
            <img src="views/img/logoANT.png">
        </div>
    </div>
    <?php
	include('views/footer.php');
	?>
</body>
</html>