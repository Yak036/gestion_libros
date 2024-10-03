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
                <form action="{{route('books.index')}}" method="GET">
                  <label for="search" class="block text-gray-500 text-sm font-bold mb-2">Buscar autor:</label>
                  <input class="border border-gray-200 rounded w-1/2 py-2 px-3 mb-3" type="text" id="search" name="search" >
                </form>

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
                              <table class="mb-3 w-full">
                                  @foreach ($user as $book)
                                  <tr>
                                      <td><p class="text-gray-600">{{$book->author}}</p></td>
                                      <td class="px-6 py-4">
                                          <a 
                                          class="hover:text-green-700 transition-colors duration-300 ease-in-out cursor-pointer"
                                          href="{{route('books.show', $book)}}"
                                          >
                                            {{$book->title}}
                                          </a>
                                      </td>
                                      <td class="px-6 py-4">
                                          <a href="{{route('books.edit', $book)}}" class="text-indigo-600 hover:bg-blue-600 hover:text-black transition-colors duration-300 ease-in-out px-4 py2">Editar</a>
                                      </td>
                                      <td class="px-6 py-4 ">
                                          <form action="{{route('books.destroy', $book)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input 
                                              type="submit" 
                                              value="Eliminar" 
                                              class="cursor-pointer hover:bg-red-400 bg-gray-800 text-white rounded px-4 py2 transition-colors duration-300 ease-in-out" 
                                              onclick="return confirm('Desea eliminar??')"
                                            >
                                          </form>
                                      </td>
                                  </tr>
                                  @endforeach
                              </table>
                              {{$user->links()}}
                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

{{-- @auth
<script>
  Swal.fire("SweetAlert2 is working!");
</script>
@endauth --}}



@endsection


{{-- {{ route('books', $book->slug)}} --}}

