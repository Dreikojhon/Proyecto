<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
// including the database connection file
include_once("connection.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $fecha = $_POST['fecha'];
    $tags = $_POST['tags'];    
    
    // checking empty fields
    if(empty($titulo) || empty($contenido) || empty($fecha) || empty($tags)) {                
        if(empty($titulo)) {
            echo "<font color='red'>Falta rellenar campo titulo</font><br/>";
        }
        
        if(empty($contenido)) {
            echo "<font color='red'>Falta rellenar campo contenido</font><br/>";
        }
        
        if(empty($fecha)) {
            echo "<font color='red'>Se requiere de fecha</font><br/>";
        }       
        if(empty($tags)) {
            echo "<font color='red'>Se requiere de las etiquetas</font><br/>";
        }   
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE publicacion SET titulo='$titulo', contenido='$contenido', fecha='$fecha', tags='$tags' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM publicacion WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $titulo = $res['titulo'];
    $contenido = $res['contenido'];
    $fecha = $res['fecha'];
    $tags = $res['tags'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
 
<body>
<div class="header">
<a href="index.php" class="logo">APP WEB</a>
<div class="menu">
    <a href="index.php">Principal</a><a href="view.php">Ver Publicaciones</a><a class="sesion" href="logout.php">Cerrar Sesion</a>
</div>
</div>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Titulo</td>
                <td><input type="text" name="titulo" value="<?php echo $titulo;?>"></td>
            </tr>
            <tr> 
                <td>Contenido</td>
                <td><input type="text" name="contenido" value="<?php echo $contenido;?>"></td>
            </tr>
            <tr> 
                <td>Fecha</td>
                <td><input type="date" name="fecha" value="<?php echo $fecha;?>"></td>
            </tr>
            <tr> 
                <td>Etiquetas</td>
                <td><input type="text" name="tags" value="<?php echo $tags;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>