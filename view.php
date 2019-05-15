<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
//including the database connection file
include_once("connection.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT id,titulo,contenido,DATE_FORMAT(fecha,'%d-%m-%Y')as fecha,tags FROM `publicacion` WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");

?>
 
<html>
<head>
    <title>Pagina 1</title>
    <link href="css/style.css" rel="stylesheet" >
</head>
 
<body>
<a href="index.php">Principal</a> | <a href="add.html">Añadir nueva publicacion</a> | <a href="logout.php">Cerrar Sesion</a>
<br/><br/>
    
<table for="lista">
    <tr bgcolor='#CCCCCC'>
        <td>Titulo</td>
        <td>Contenido</td>
        <td>Fecha</td>
        <td>Tags</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {        
        echo "<tr>";
        echo "<td>".$res['titulo']."</td>";
        echo "<td>".$res['contenido']."</td>";
        echo "<td>".$res['fecha']."</td>";
        echo "<td>".$res['tags']."</td>";    
        echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Estás seguro de eliminar la publicacion?')\">Eliminar</a></td>";        
    }
    ?>
</table>    
</body>
</html>