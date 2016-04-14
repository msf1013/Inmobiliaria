<?php
    include ("header.php");
?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Insertar Anuncio</title>
</head>
<body>
    <h1>Sistema de anuncios</h1>
    <h3>Insertar un anuncio</h3>
    <form id="forma" action="insertarAnuncio.php" method="post" enctype="multipart/form-data">
        Titulo: *<br>
        <input type="text" name="titulo">
        <br>
        Observaciones: *<br>
        <textarea form="forma" name="obs"></textarea>
        <br>
        Imagen:<br>
        <input type="file" name="imagen">
        <br>
        <br>
        <input type="submit" value="Insertar">
    </form>
    <p>NOTA: los datos marcados con (*) deben ser llenados obligatoriamente</p>
    <p>[<a href="menu.php">Menu principal</a>]</p>
</body>
</html>
