<html>
<head>
    <title>Registro de Usuarios</title>
    <link type="text/css"rel="stylesheet" href="css/estilologin.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
 
<body>
<div class="header">
<a href="index.php" class="logo">APP WEB</a>
</div>
    
    <?php
    include("connection.php");
 
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
 
        if($user == "" || $pass == "" || $name == "" || $email == "") {
            echo "Tiene que insertar datos.";
            echo "<br/>";
            echo "<a href='register.php'>Atras</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO usuario(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
            or die("No se pudo ejecutar el procedimiento.");
            
            echo "Registro satisfactoriamente";
            echo "<br/>";
            echo "<a href='login.php'>Ingresar con cuenta</a>";
        }
    } else {
?>
        
        <form name="form1" method="post" action="">
            <div class="box">       
                <h1>Registo de Usuarios</h1>             
                <input type="text" name="name" placeholder="Inserte nombre" onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email">
                <input type="text" name="email" placeholder="Inserte correo electrónico" onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email">
                <input type="text" name="username" placeholder="Inserte nombre de Usuario" onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email">
                <input type="password" name="password" placeholder="Inserte una Clave" onfocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email">
                
                <input type="submit" class="btn" name="submit" value="Registrar">
            </div>
        </form>
    <?php
    }
    ?>
</body>
</html>