<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulopagina', 'Laravel 12')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />
    <!--<script src="https://cdn.tailwindcss.com"></script> -->


    <style>
      .fakeimg{
        height: 200px;
        background: #aaa;
      }
    </style>

    @stack('css')
</head>
<body>
    <div class="p-5 text-white text-center fondo">
        <h1>@yield('titulo')</h1>
        <h4>@yield('subtitulo')</h4>
        <p>Resize this responsive page to see the effect</p>
    </div>

    <div class="container mt-5">
        @yield('contenido_cuerpo')
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.6/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>