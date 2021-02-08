<?php 

    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
        exit;
        }

    require_once ("config/db.php");
    require_once ("config/conexion.php");
    include ("config/swee.php");

    $documento=$_SESSION['user_id'];
    $sql="SELECT * FROM users WHERE user_id='$documento'";
    $query = mysqli_query($con, $sql);             
    if($row=mysqli_fetch_array($query)){
        $nombres=$row['firstname'].' '.$row['lastname'];
        $usuario=$row['user_name'];
        $correo=$row['user_email'];
        $perfil=$row['user_king'];
        $desde=$row['date_added'];
    }
    $title= "Gestiones | GAD Flavio Alfaro";
?>

<html lang="es">
    <head>
        <?php include 'views/head.php';?>
    </head>
    <body>
    	<?php 
            include 'views/navbar.php';
            include('views/modal/usuario/password_usuario.php');
        ?>
        <div align="center">
        <table width="53%">
          <tr>
            <td>
            	<div class="row-fluid">
                    <div class="span4" align="center">			
                    	<div class="">
                            <div class="well" style="width:65%">
                                <h3 align="center"><strong><?php echo $nombres; ?></strong></h3><br>
    						<?php
                                if (file_exists("views/users/".$_SESSION['user_name'].".jpg")){
                                    echo '<img style="border: 3px solid; color: white; filter: drop-shadow(0 4px 4px rgba(0, 0, 0, 1.7));" src="views/users/'.$_SESSION['user_name'].'.jpg" width="200" height="225" class="img-polaroid img-polaroid">';
                                }else{
                                    echo '<img src="views/users/defecto.jpg" width="200" height="220">';
                                }
                            ?>
                            <br><br>
                            <div class="btn-group btn-group-vertical">
                                <a href="#" class='btn btn-default' onclick="get_user_id('<?php echo $documento;?>');"
                                data-toggle="modal" data-target="#myModal3"><i class='glyphicon glyphicon-refresh'></i><strong> Cambiar Contraseña</strong></a>

                                <button type='button' class="btn btn-default" data-toggle="modal" data-target=""><span class=""></span>Cambiar Imagén</button>

                                <a href="login.php?logout" class="btn btn-default"><i class='glyphicon glyphicon-off'></i><strong> Cerrar Sesión</strong></a>
                            </div>
                            </div>
                        
                        </div>
                    </div>

                </div>
            </td>
            <td>
                <div>
                    <h3 align="center"><strong>INFORMACI&Oacute;N PRINCIPAL</strong></h3><br>
                    <strong><i class="glyphicon glyphicon-ok-sign"></i> Correo: </strong> <?php echo $correo; ?><br><br>
                    <strong><i class="glyphicon glyphicon-ok-sign"></i> Usuario: </strong> <?php echo $usuario; ?><br><br>
                    <strong><i class="glyphicon glyphicon-ok-sign"></i> Perfil: </strong> <?php echo $perfil; ?><br><br>
                    <strong><i class="glyphicon glyphicon-ok-sign"></i> Agregado(a): </strong> <?php echo $desde; ?><br><br>
                        
                </div>
            </td>


          </tr>

        </table>
        </div>


    <?php
    include('views/footer.php');
    ?>
    <script type="text/javascript" src="js/usuarios.js"></script>
    </body>
</html>
