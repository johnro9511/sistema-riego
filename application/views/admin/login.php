<!DOCTYPE html>
<html lang="en" class="no-js">
    
    <head>
        <meta charset="utf-8">
        <title>Sistema || Riego</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link type="image" href="<?=base_url();?>img/sis_rie2.jpg" rel="icon"/>
    </head>

    <body>
        <div class="page-container" style="background: #BDBDBD; width: 350px">
            <br>
            <h1 style="color: #000000">SISTEMA DE RIEGO</h1>
          <br>
            <img src="<?=base_url();?>img/sis_rie2.jpg" style="width:260px; height:80px;">
            <!--<h1>Sistema Michelle</h1> style="width:30%; position:center; background:#9c9c9c;"pattern="[0-9]"-->
            <br><br>
            <p style="color: #000000">Introduzca sus datos de ingreso</p>
            <?php if($this->session->flashdata("error")):?>
            <div>
               <br>
               <h1 style="color:#FF0000"><?php echo $this->session->flashdata("error")?></h1>
            </div>
            <?php endif; ?>
            
            <form action="<?php echo base_url();?>auth/login" method="post" >
                <input type="text" name="username" class="username" placeholder="Usuario">
                <input type="password" name="password" class="password" placeholder="Contraseña" required>
            
                <button type="submit" autofocus>Ingresar</button>
                <div class="error"><span>+</span></div>
                <div class="page-container">
                    <a><strong style="color: #000000">¿No tiene una cuenta? Contacte al administrador.</strong></a>
                    <br><br>
                </div>
            </form>
        </div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
