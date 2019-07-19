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
    <title>Pagina 2</title>
    <link type="text/css" href="css/style.css" rel="stylesheet" >
</head>
 
<body>
<div class="header">
<a href="index.php" class="logo">APP WEB</a>
<div class="menu">
<p>Bienvenido: <?php echo $_SESSION['name'] ?></p> 
<a href="index.php">Principal</a> <a href="add.html">Añadir nueva publicacion</a>  <a class="sesion" href="logout.php">Cerrar Sesion</a>
</div>
</div>
<div class="tablageneral">
    <table id="regtable">
        <tr>
            <th class="titu">Titulo</th>
            <th class="cont">Contenido</th>
            <th class="date">Fecha</th>
            <th class="tags">Tags</th>
            <th class="accs">Acciones</th>
        </tr>
        <tbody id="tablerows">
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
        </tbody>
    </table>  
</div>
</body>
</html>