<?php session_start(); ?>
<html>
<head>
    <title>APP WEB</title>
    <link href="css/style.css" rel="stylesheet" >
</head>
<body>
    <div class="header">
    <a href="index.php" class="logo">APP WEB</a>
    <div class="menu">
    <?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        <p>Bienvenido: <?php echo $_SESSION['name'] ?></p> 
        <a href="view.php">CRUD Publicaciones</a><a class="sesion" href='logout.php'>Cerrar Sesion</a>
    <?php    
    } else {
        echo "<p>Usted esta como invitado, Ingrese o regístrese</p>";
        echo "<a class='sesion' href='login.php'>Ingreso</a><a class='sesion' href='register.php'>Registrar</a>";
    }
    ?>
    </div>
    </div>
</body>
</html>