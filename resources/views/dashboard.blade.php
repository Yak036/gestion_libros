{{-- Todo: Aqui esta el listado de TODOS los libros --}}
@extends('template')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido') }}
        </h2>
    </x-slot>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        
                    <h1 class="">Listado de libros</h1>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="flex justify-center">
                                <div class="text-gray-1000 dark:text-gray-100">
                                    <table class="mb-3 w-full" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="px-6 py-4 ">Autor</th>
                                                <th class="px-6 py-4 ">Titulo</th>
                                                <th class="px-6 py-4 ">Publicado por:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $book)
                                            <tr class="border p-2">
                                                <td><em class="text-gray-600">{{$book->author}}</em></td>
                                                <td class="px-6 py-4 hover:text-green-700 transition-colors duration-300 ease-in-out cursor-pointer"
                                                onclick="window.location.href='{{route('books.show', $book)}}'"
                                                title="Ver mas detalles">
                                                    <strong>
                                                        {{$book->title}}
                                                    </strong>
                                                </td>
                                                <td class="px-6 py-4 ">
                                                    <p>{{$book->user->name}}</p>
                                                </td>
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


@endsection