<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    
                                <h1 class="">Listado de libros</h1>
                                    <form action="{{route('dashboard')}}" method="GET">
                                    <label for="search" class="block text-gray-500 text-sm font-bold mb-2">Buscar autor:</label>
                                    <input class="border border-gray-200 rounded w-1/2 py-2 px-3 mb-3" type="text" id="search" name="search" >
                                </form>
                                <div class="py-12">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="flex justify-center">
                                            <div class="text-gray-1000 dark:text-gray-100">
                                                <table class="mb-3 w-full">
                                                    @foreach ($user as $book)
                                                    <tr class="border p-2">
                                                        <td><p class="text-gray-600">{{$book->author}}</p></td>
                                                        <td class="px-6 py-4 hover:text-green-700 transition-colors duration-300 ease-in-out cursor-pointer"
                                                        onclick="window.location.href='{{route('books.show', $book)}}'"
                                                        title="Ver mas detalles">
                                                            <p>
                                                                {{$book->title}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4 ">
                                                            <strong></strong>
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


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
