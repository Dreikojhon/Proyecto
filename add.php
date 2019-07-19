<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
<html>
<head>
    <title>Agregar publicacion</title>
    
</head>
 
<body>

<?php
//including the database connection file
include("connection.php");
 
if(isset($_POST['Submit'])) {    
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $fecha = $_POST['fecha'];
    $tags = $_POST['tags'];
    $loginId = $_SESSION['id'];
        
    // checking empty fields
    if(empty($titulo) || empty($contenido) || empty($fecha) || empty($tags)) {                
        if(empty($titulo)) {
            echo "<font color='red'>Titulo esta vacio</font><br/>";
        }
        
        if(empty($contenido)) {
            echo "<font color='red'>Contenido esta vacio.</font><br/>";
        }
        
        if(empty($fecha)) {
            echo "<font color='red'>Se requiere de fecha</font><br/>";
        }
        
        if(empty($tags)) {
            echo "<font color='red'>Se requiere de etiquetas</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Ir atras</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO publicacion(titulo,contenido, fecha, tags, login_id) VALUES('$titulo','$contenido','$fecha','$tags', '$loginId')");
        
        //display success message
        echo "<font color='green'>Publicacion añadida satisfactoriamente.";
        echo "<onClick=\"return confirm('Estás seguro de eliminar la publicacion?')\>";
        echo "<br/><a href='view.php'>Ver publicacion</a>";
    }
}
?>
</body>
</html>