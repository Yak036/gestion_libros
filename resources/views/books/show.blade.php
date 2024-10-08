{{-- Todo: Mostrar detalles de un libro --}}
@extends('template')

@section('content')
    

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Vista previa') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="max-w-md mx-auto p-4 bg-white rounded shadow-md">
                    <div class="mb-4">
                      <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                      <input readonly class="capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" type="text" id="title" name="title" value="{{$book->title}}">
                    </div>
                    <div class="mb-4">
                      <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Autor:</label>
                      <input readonly class="select-none capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" type="text" id="author" name="author" value="{{$book->author}}">
                    </div>
                    <div class="mb-4">
                      <label for="published_year" class="capitalize block text-gray-700 text-sm font-bold mb-2">Año de publicación:</label>
                      <input readonly class="capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" type="number" id="published_year" name="published_year" value="{{$book->published_year}}">
                    </div>
                    <div class="mb-4">
                      <label for="gender" class="capitalize block text-gray-700 text-sm font-bold mb-2">Género:</label>
                      <input readonly class="capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" type="text" id="gender" name="gender" value="{{$book->gender}}">
                    </div>
                    <div class="mb-4">
                      <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                      <textarea readonly class="rounded border-gray-700 w-full py-2 px-3 mb-3 h-32" id="description" name="description">{{$book->description}}</textarea>
                    </div>
                
                    <div class="flex justify-between items-center">
                      <a href="{{route('books.index')}}" class="text-indigo-600">volver </a>
                
                    </div>
                
              </div>
              <div class="mt-8 max-w-md mx-auto p-4 rounded shadow-md">
                <h2 class="w-full text-center">Comentarios</h2>
                @include('books.comment._showComments')
              </div>
              <div class="mt-8 max-w-md mx-auto p-4 rounded shadow-md">
                <h2 class="w-full text-center">Agregar un comentario</h2>
                <form action="{{route('comments.store', $book->title)}}" method="POST">
                  @include('books.comment._createComment')
                </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>


@endsection