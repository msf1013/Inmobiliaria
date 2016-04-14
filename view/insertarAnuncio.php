<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Insertar Anuncio</title>
</head>
<body>
<?php
// Obtener valores introducidos
$titulo = $_POST['titulo'];
$obs = $_POST['obs'];

echo $titulo;
echo $obs;

$error = false;
// Comprobar que se han introducido todos los datos obligatorios
// Título
if (trim($titulo) == ""){
    $errores["titulo"] = "¡Debe introducir el título del anuncio!";
    $error = true;
}
else
    $errores["titulo"] = "";
// Observaciones
if (trim($obs) == ""){
    $errores["observaciones"] = "¡Debe introducir las observaciones!";
    $error = true;
}
else
    $errores["observaciones"] = "";
// Copiar archivo en directorio correspondiente		 // Se renombra para evitar que sobreescriba un archivo existente
// Para garantizar la unicidad del nombre se añade una marca de tiempo
$nombreDirectorio = "img/";
$nombreArchivo = $_FILES['imagen']['name'];
// Si ya existe un archivo con el mismo nombre, renombrarlo
$nombreCompleto = $nombreDirectorio . $nombreArchivo;
if (is_file($nombreCompleto)){
    $idUnico = time();
    $nombreArchivo = $idUnico . "-" . $nombreArchivo;
}
// El archivo introducido supera el límite de tamaño permitido
else if ($_FILES['imagen']['error'] == UPLOAD_ERR_FORM_SIZE){
    $maxsize = $_POST['MAX_FILE_SIZE'];
    $errores["imagen"] =
        "¡El tamaño del archivo supera el límite permitido ($maxsize bytes)!";
    $error = true;
}
// No se ha introducido ningún archivo
else if ($_FILES['imagen']['name'] == "")
    $nombreArchivo = '';

// Si los datos son correctos, procesar formulario
if ($error==false){
    // Insertar el anuncio en la Base de Datos
    $mysqli = new mysqli("localhost", "root", "root", "babel");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $fecha = date ("Y-m-d"); // Fecha actual
    $instruccion =
        "insert into anuncios (titulo, observaciones, fecha, imagen) values ('$titulo', '$obs', '$fecha', '$nombreArchivo')";
    if(!$mysqli->query($instruccion))
        echo "Table insertion failed: (" . $mysqli->errno . ") " . $mysqli->error;
    $mysqli->close ();
    // Mover archivo de imagen a su ubicación definitiva
    move_uploaded_file ($_FILES['imagen']['tmp_name'],
        $nombreDirectorio . $nombreArchivo);
    // Mostrar datos introducidos
    print ("<h1>Manejo de anuncios</h1>\n");
    print ("<h2>Resultado de la inserción del anuncio</h2>\n");
    print ("<p>El anuncio ha sido recibido correctamente:</p>\n");
    print ("<ul>\n");
    print (" <li>Título: " . $titulo . "\n");
    print (" <li>Observaciones: " . $obs . "\n");
    // Formato: día del mes (número, sin ceros) /
    //mes del año (número, sin ceros) /
    //año (cuatro dígitos)
    // Ejemplo: 7/11/2002
    $string = date ("j/n/Y", strtotime($fecha));
    print (" <li>Fecha: " . $string . "\n");
    if ($nombreArchivo != "")
        print (" <li>Imagen: <a TARGET='_blank' href='" . $nombreDirectorio .
            $nombreArchivo . "'>" . $nombreArchivo . "</a>\n");
    else
        print (" <li>Imagen: (no hay)\n");
    print ("</ul>\n");

    print ("<p>[ <a href='insertar.php'>Insertar otro anuncio</a> | ");
    print ("<a href='menu.php'>Menú principal</a> ]</p>\n");
}
else {
    foreach ($errores as $key => $value){
        if($value!="")
            print($key.": ".$value."<br>");
    }
    ?>
    </p>
    <p>[ <a href='menu.php'>Menú principal</a> ]</p>
    <?php
}
?>
</body>
</html>
