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
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
</head>
<body>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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