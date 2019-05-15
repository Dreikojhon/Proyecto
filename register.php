<html>
<head>
    <title>Registro de Usuarios</title>
</head>
 
<body>
    <a href="index.php">Principal</a> <br />
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
        <p><font size="+2">Registro</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
                <tr> 
                    <td width="10%">Nombres</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>            
                <tr> 
                    <td>Nombre de Usuario</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr> 
                    <td>Clave de usuario</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>
</html>