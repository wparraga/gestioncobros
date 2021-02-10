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
      if($position=='Administrativo') {
  ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>

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

  <?php
    if($position=='ANT') {
  ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>
        <li class="<?php echo $active_tarifario;?>"><a href="tarifarios.php"><i class='glyphicon glyphicon-list-alt'></i> Tarifarios <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $active_rubros;?>"><a href="rubros.php"><i class='glyphicon glyphicon-barcode'></i> Rubros</a></li>
        <li class="<?php echo $active_reportes;?>"><a href="reportes.php"><i class='glyphicon glyphicon-list-alt'></i> Reportes</a></li>

        <li class="<?php echo $active_solvencia_tra;?>"><a href="solvencia_tra.php"><i class='glyphicon glyphicon-list-alt'></i> Certificado de Solvencia</a></li>
        <li class=""><a href="#"><i  class='glyphicon glyphicon-road'></i> Rodaje Vehicular</a></li>

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

  <?php
      if($position=='Avaluos y Catastro') {
  ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>
        <li class="<?php echo $active_certificadoavaluos;?>"><a href="certificado_avaluos.php"><i class='glyphicon glyphicon-list-alt'></i> Certificado de Avalúos</a></li>
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


    <?php
      if($position=='Obras Públicas') {
  ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>

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


  <?php
      if($position=='Planificación') {
  ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>

        <li class="<?php echo $linea_fabrica;?>"><a href="linea_de_fabrica.php"><i class='glyphicon glyphicon-road'></i> Linea de Fábrica</a></li>

        <li class="<?php echo $permiso_construccion;?>"><a href="permiso_construccion.php"><i class='glyphicon glyphicon-road'></i> Permiso Construcción</a></li>

        <li class="<?php echo $certificado_ruralidad;?>"><a href="certificado_ruralidad.php"><i class='glyphicon glyphicon-road'></i> Certificado de Ruralidad</a></li>

        <li class="<?php echo $uso_suelo;?>"><a href="uso_suelo.php"><i class='glyphicon glyphicon-road'></i> Permiso Uso de Suelo</a></li>
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


  <?php
      if($position=='Recaudación') {
  ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>
        <li class="<?php echo $certificado_solvencia;?>"><a href="certificado_solvencia.php"><i class='glyphicon glyphicon-list-alt'></i> Certificado de Solvencia</a></li>
        <li class="<?php echo $permiso_funcionamiento;?>"><a href="permiso_funcionamiento.php"><i class='glyphicon glyphicon-list-alt'></i> Permiso de Funciomiento</a></li>

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

<?php
  if($position=='Registro de la Propiedad') {
?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>
        <li class="<?php echo $active_compradores;?>"><a href="compradores.php"><i class='glyphicon glyphicon-list-alt'></i> Compradores</a></li>
        <li class="<?php echo $active_vendedores;?>"><a href="vendedores.php"><i class='glyphicon glyphicon-list-alt'></i> Vendedores</a></li>
        <li class="<?php echo $active_solvencia;?>"><a href="solvencia.php"><i class='glyphicon glyphicon-list-alt'></i> Solvencia</a></li>

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

    <?php
      if($position=='Rentas') {
  ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>
        <li class="<?php echo $active_tramitesEmitidos;?>"><a href="tramites_emitidos.php"><i class='glyphicon glyphicon-list-alt'></i> Trámites Emitidos</a></li>
        
        <li class="<?php echo $active_tramitesCobrados;?>"><a href="tramites_cobrados.php"><i class='glyphicon glyphicon-list-alt'></i> Trámites Liquidados</a></li>

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


    <?php
      if($position=='Secretaría') {
    ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-list-alt'></i> HOME</a></li>

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

  <?php
        if($position=='Patio de Máquinas') {
    ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="home.php"><i class='glyphicon glyphicon-home'></i> HOME</a></li>
        <li class="<?php echo $active_vehiculos;?>"><a href="vehiculos.php"><i class='glyphicon glyphicon-road'></i> Vehiculos</a></li>
        <li class="<?php echo $active_conductor;?>"><a href="conductor.php"><i class='glyphicon glyphicon-user'></i> Conductores</a></li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='glyphicon glyphicon-list-alt'></i>
            Ordenes
          <b class="caret"></b>
          </a>
           <ul class="dropdown-menu">
              <li class="<?php echo $active_ordenmovilizacion;?>"><a href="ordenmovilizacion.php"><i class='glyphicon glyphicon-list-alt'></i> Orden de Movilización de Vehículos y Maquinarias</a></li>
              <li class="divider"></li>
              <li class="<?php echo $active_ordendespacho;?>"><a href="ordendespacho.php"><i class='glyphicon glyphicon-list-alt'></i> Orden de Despacho de Combustible</a></li>
            </ul>  
        </li>

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