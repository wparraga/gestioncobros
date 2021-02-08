    <?php
        $u= $_SESSION['user_name'];
        $k= $_SESSION['user_king']
    ?>
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <p class="navbar-text pull-left">&copy Gestión de Cobranzas - <?php echo date('Y');?></p>
        <p class="navbar-text pull-left"> -   Usuario: <?php echo $u; ?></p>   
        <p class="navbar-text pull-left"> -   Perfil: <?php echo $k; ?></p> 
    </div>
</div>
<!--<script src="views/bootstrap/jquery/jquery.min.js"></script>-->
<script src="views/bootstrap/jquery/jquery-2.1.3.min.js"></script>
<script src="views/bootstrap/js/bootstrap.min.js"></script>