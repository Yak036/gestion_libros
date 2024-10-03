{{-- Todo: Formulario para editar un libro --}}
{{-- Todo: Formulario para crear un libro --}}

@extends('template')

@section('content')
    

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Editar libro') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <form action="{{route('books.update', $book)}}" method="POST">
                    @method('PUT')
                    @include('books.form._form')
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
@endsection