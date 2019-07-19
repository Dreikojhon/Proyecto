<?php
session_start();

//Iniciando 
$username = "";
$email = "";

$errors = array(); 


//bd

$db = mysqli_connect(
    'localhost',
    'root',
    '',
    'practice') or die (
        "No se pudo conectar a la BD"
    );

//insertando usuarios

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

//validacion 


if(empty($username)) {array_push($errors,"Se requiere nombre de usuario")};
if(empty($email)) {array_push($errors,"Se requiere email")};
if(empty($password_1)){array_push($errors,"Se requiere clave")};

if($password_1 != $password_2){array_push($errors,"Las claves no concuerdan")};
//}}}};


//usuarios repetidos

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email ='$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
    if($user['username'] === $username){
        array_push($errors, "Este nombre de usuario ya existe");
    }
    if($user['email'] === $email){
        array_push($errors, "Este email ya existe");
    }
}

//Reg si no hay error

if(count($errors) == 0){
    $password = md5($password_1);
    $query = "INSERT INTO user (username,email,password) VALUES('$username','$email','$password')";

    mysqli_query($db,$query);
    $_SESSION['username']=$username;
    $_SESSION['success']="Ahora estas logueado";

    header('location: index.php');
}


//login user
if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)){
        array_push($errors,'Se requiere el nombre de usuario');
    }
    if(empty($password)){
        array_push($errors,'Se requiere una clave');
    }
    if(count($errors)== 0){
        $password = md5($password);
        
        $query="SELECT*FROM  user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db,$query);

        if(mysqli_num_rows($results)){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logueado exitosamente";      
            header('location: index.php');
        }else{
            array_push($errors,"Usuario/Clave incorrecta");
        }
    }
}


?>