<style type="text/css">
  .imgRedonda {
    width:25px;
    height:25px;
    border-radius:150px;
  }
  .drop { filter: drop-shadow(0 4px 4px rgba(0, 0, 0, 0.7));
</style>

<?php
    if (isset($title))
    {
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <?php
        $position= $_SESSION['user_king'];
        if($position=='Administrador') {
    ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="<?php echo $home;?>">
          <a href="home.php">
            <i class='glyphicon glyphicon-list-alt'></i> HOME
          </a>
        </li>

        <li class="<?php echo $active_clientes;?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>

        <li class="<?php echo $active_prestamos;?>"><a href="prestamos.php"><i class='glyphicon glyphicon-usd'></i> Prestamos</a></li>

        <li class="<?php echo $active_pagos;?>"><a href="pagos.php"><i class='glyphicon glyphicon-briefcase'></i> Pagos</a></li>

        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='glyphicon glyphicon-list-alt'></i>
            Reportes
          <b class="caret"></b>
          </a>
           <ul class="dropdown-menu">
              <li class="<?php echo $active_pagosrealizados;?>"><a href="pagos_realizados.php"><i class='glyphicon glyphicon-list-alt'></i> Pagos Realizados</a></li>
              <li class="divider"></li>
              <li class="<?php echo $active_pagospendientes;?>"><a href="pagos_pendientes.php"><i class='glyphicon glyphicon-list-alt'></i> Pagos Pendientes</a></li>
            </ul>  
        </li>


        <li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuario</a></li>

       </ul>

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#" style="color:#000" class="dropdown-toggle" data-toggle="dropdown">
            Hola! <?php echo $_SESSION['user_name']; ?> 
            <?php
              if (file_exists("views/users/".$_SESSION['user_name'].".jpg")){
                echo '<img src="views/users/'.$_SESSION['user_name'].'.jpg" width="25" height="25" class="imgRedonda drop">';
              }else{
                echo '<img src="views/users/defecto.jpg" class="imgRedonda drop" width="25" height="25">';}
            ?>
          <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="perfil.php"><i class="glyphicon glyphicon-user"></i> Mi Perfil</a></li>
            <li class="divider"></li>
            <li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Cerrar Sesi&oacute;n</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <?php
    }
    ?>

  <?php
      if($position=='Cobrador') {
  ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>

        <li class="<?php echo $active_pagos;?>"><a href="pagos.php"><i class='glyphicon glyphicon-briefcase'></i> Pagos</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#" style="color:#000" class="dropdown-toggle" data-toggle="dropdown">
            Hola! <?php echo $_SESSION['user_name']; ?> 
            <?php
              if (file_exists("views/users/".$_SESSION['user_name'].".jpg")){
                echo '<img src="views/users/'.$_SESSION['user_name'].'.jpg" width="25" height="25" class="imgRedonda drop">';
              }else{
                echo '<img src="views/users/defecto.jpg" class="imgRedonda drop" width="25" height="25">';}
            ?>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="perfil.php"><i class="glyphicon glyphicon-user"></i> Mi Perfil</a></li>
            <li class="divider"></li>
            <li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Cerrar Sesi&oacute;n</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <?php
    }
  ?>    




</nav>
<?php
    }
?>