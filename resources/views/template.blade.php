<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gestor de libros</title>
  <style>
    .alert-success{
      background: rgb(121, 255, 121);
      position: absolute;
      top: 1vh;
      left: 40%;
      max-width: 40vh;
      border: 2px solid black;
      display: hidden;
    }
  </style>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- @if(session('success'))
    <div class="alert alert-success">
      <h1>{{ session('success') }}</h1>
    </div>
  @endif --}}

  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}'
      });
    </script>
  @endif

  
  @yield('content')

</body>
</html>