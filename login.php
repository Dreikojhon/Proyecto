<?php session_start(); ?>
<html>
<head>
    <title>Ingreso</title>
    <link type="text/css" rel="stylesheet" href="css/estilologin.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="header">
<a href="index.php" class="logo">APP WEB</a>
</div>
<?php
include("connection.php");
 
if(isset($_POST['submit'])) {
    $user =  $_POST['username'];
    $pass =  $_POST['password'];
    dd($user);
    //mysqli_real_escape_string($mysqli,
    if($user == "" || $pass == "") {
        echo "Debe rellenar los datos para ingresar.";
        echo "<br/>";
        echo "<a href='login.php'>Atras</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM usuario WHERE usuemail='$user' AND usuclave='$pass'")
        or die("No se pudo ejecutar el procedimiento.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['usuemail'];
            $_SESSION['valid'] = $validuser;
        } else {
            echo "Usuario o Clave incorrecta";
            echo "<br/>";
            echo "<a href='login.php'>Regresar</a>";
        }
 
        if(isset($_SESSION['valid'])) {
            header('Location: index.php');            
        }
    }
} else {
?>
    
    <form name="form1" method="post" action="">
        <div class="box">
                <h1>Ingreso</h1>
                <input type="text" name="username" placeholder="Nombre de Usuario" onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email">
                <input type="password" name="password" placeholder="Clave" onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email">
                
                <input type="submit" class="btn" name="submit" value="Ingresar">
        </div>
    </form>
<?php
}
?>
<script src="js/main.js" type="text/javascript"></script>
</body>
</html>
