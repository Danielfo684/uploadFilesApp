<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>

<body>
    <div class="container">
        <h1>{{ $upload->nombre_original }}</h1>
        <h1>{{ $upload->path }}</h1>
        <img src="{{ route('photos.view', $upload) }}" alt="{{ $upload->path }}" style="max-width: 100%; height: 900px;">

        <p><a href="{{ route('upload.index') }}">Volver</a></p>
    </div>
</body>

</html>