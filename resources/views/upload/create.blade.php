<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Subir archivos pdf e imágenes</title>
        <link rel="stylesheet" href="../resources/css/style.css">
    </head>
    <body>

        <h1>Subir archivos pdf e imágenes</h1>
        <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- seguridad, consultas preparadas SQL-->
            <input type="file" name="file">
            <input type="submit">
        </form>

</html>
