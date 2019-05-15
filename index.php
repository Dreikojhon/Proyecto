<?php session_start(); ?>
<html>
<head>
    <title>APP WEB</title>
    <link href="css/style.css" rel="stylesheet" >
</head>
 
<body>
    <div id="header">
        <b>Principal</b><br>
    <?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        
        <b>Bienvenido: <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Cerrar Sesion</a></b><br/>
        <br/>
        <a href="view.php">CRUD Publicaciones</a>
        <br/><br/>
    <?php    
    } else {
        echo "Usted esta como invitado.<br/><br/>";
        echo "<div id='menu'><a href='login.php'>Ingreso</a><br><a href='register.php'>Registrar</a></div>";
    }
    ?>
    </div>
</body>
</html>