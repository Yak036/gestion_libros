{{-- Todo: mostrar listado de libros --}}
@extends('template')

@section('content')
    

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Libros') }}

      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

              <div class="p-6 text-gray-900 dark:text-gray-100">
                  
                <h1 class="">Listado de libros</h1>

                <div class="py-12">
                  <a href="{{route('books.create')}}" 
                  class=" bg-green-500 text-white rounded px-2 py1 hover:bg-green-900 transition-colors duration-300 ease-in-out"
                >
                  Crear
                </a>
                  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex justify-center">
                          <div class="text-gray-1000 dark:text-gray-100">
                            <table class="mb-3 w-full" id="myTable">
                              <thead>
                                  <tr>
                                      <th class="px-6 py-4 ">Autor</th>
                                      <th class="px-6 py-4 ">Titulos</th>
                                      <th class="px-6 py-4 ">Opciones</th>
                                      <th class="px-6 py-4 ">Eliminar</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($user as $book)
                                  <tr>
                                      <th><p class="text-gray-600">{{$book->author}}</p></th>
                                      <th class="px-6 py-4">
                                          <a 
                                          title="Mas detalles"
                                          class="hover:text-green-700 transition-colors duration-300 ease-in-out cursor-pointer"
                                          href="{{route('books.show', $book)}}"
                                          >
                                              {{$book->title}}
                                          </a>
                                      </th>
                                      <th class="px-6 py-4">
                                          <a href="{{route('books.edit', $book)}}" class="text-indigo-600 hover:bg-blue-600 hover:text-black transition-colors duration-300 ease-in-out px-4 py2">Editar</a>
                                      </th>
                                      <th class="px-6 py-4 ">
                                          <form id="formEliminar" action="{{route('books.destroy', $book)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input 
                                              type="submit" 
                                              value="Eliminar" 
                                              id="delete"
                                              class="cursor-pointer hover:bg-red-400 bg-gray-800 text-white rounded px-4 py2 transition-colors duration-300 ease-in-out" 
                                              >
                                          </form>
                                      </th>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>  



                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

<script type="module" src="{{asset('/js/table.js')}}"></script>

<script>
  document.getElementById('delete').addEventListener('click', (e)=>{
    e.preventDefault()
    swal.fire({
    title: "Deseas eliminar este libro?",
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




@endsection


{{-- {{ route('books', $book->slug)}} --}}

