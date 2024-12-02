<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../resources/css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Lista de Fotos</h1>
        <a href="{{ route('upload.create') }}" class="btn btn-primary mb-3">
            <h2>Añadir Imagen</h2>
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Ver</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uploads as $upload)
                    <tr>
                        <td>{{ $upload->id }}</td>
                        <td>{{ $upload->nombre_original }}</td>
                        <td>{{ $upload->created_at }}</td>
                        <td>
                            <a href="{{ route('upload.show', $upload->id) }}" class="watch">Ver</a>
                        </td>
                        <td><img src="{{ route('upload.show', $upload) }}" style="max-width: 150px; height: auto;">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>