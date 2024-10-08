<div class="max-w-md mx-auto p-4 mt-8 bg-white rounded-lg shadow-md">
  @foreach ($comments as $comment)
  <div class="border-b border-gray-200 p-4 mb-4">
    <p class="text-lg text-indigo-600 font-bold mb-2">{{$comment->user->name}}</p>
    <p class="text-gray-600">{{$comment->content}}</p>
    @if ($comment->user->id == auth()->id())
    <form id="formEliminar" action="{{route('comments.destroy', $comment)}}" method="POST">
      @csrf
      @method('DELETE')
      <button id="delete" class="cursor-pointer hover:bg-red-400 bg-gray-800 text-white rounded px-4 py2 transition-colors duration-300 ease-in-out">Eliminar</button>
    </form>
    @endif
  
  </div>
  @endforeach
</div>

<script>
  document.getElementById('delete').addEventListener('click', (e)=>{
      e.preventDefault()
      swal.fire({
      title: "Deseas eliminar este comentario?",
      text: "Esta accion no puede revertirse",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si"
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('formEliminar').submit()
      }
    });
  })
  
  </script>