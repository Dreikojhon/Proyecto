<?php
    include('server.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="header">
            
            <h2>Registro</h2>
        
        </div>
        <form action="registration.php" method="post">
            <?php include('errors.php') ?>

            <div>
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="text" name="password_1">
            </div>
            <div>
                <label for="password">Confirm Password</label>
                <input type="password" name="password_2">
            </div>
            <button type="submit" name="reg_user">Submit</button>

            <p>Ya tengo un usuario <a href="login.php"> Loguearme </a></p>
        </form>
    
    
        </div>
    </div>
</body>
</html>