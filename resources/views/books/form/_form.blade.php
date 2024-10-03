@csrf


<div class="max-w-md mx-auto p-4 bg-white rounded shadow-md">
  <h2 class="text-lg font-bold mb-4">Datos:</h2>
  <form>
    <div class="mb-4">
      <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
      <span class="text-xs text-red-600">@error('title') {{$message}} @enderror</span>
      <input class="capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" type="text" id="title" name="title" value="{{$book->title}}">
    </div>
    <div class="mb-4">
      <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Autor:</label>
      <span class="text-xs text-red-600">@error('author') {{$message}} @enderror</span>
      <input class="capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" type="text" id="author" name="author" value="{{$book->author}}">
    </div>
    <div class="mb-4">
      <label for="published_year" class="capitalize block text-gray-700 text-sm font-bold mb-2">Año de publicación:</label>
      <span class="text-xs text-red-600">@error('published_year') {{$message}} @enderror</span>
      <input class="capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" type="number" id="published_year" name="published_year" value="{{$book->published_year}}">
    </div>
    <div class="mb-4">
      <label for="gender" class="capitalize block text-gray-700 text-sm font-bold mb-2">Género:</label>
      <span class="text-xs text-red-600">@error('gender') {{$message}} @enderror</span>
      <input class="capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" type="text" id="gender" name="gender" value="{{$book->gender}}">
    </div>
    <div class="mb-4">
      <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
      <span class="text-xs text-red-600">@error('description') {{$message}} @enderror</span>
      <textarea class="capitalize rounded border-gray-700 w-full py-2 px-3 mb-3" id="description" name="description">{{$book->description}}</textarea>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Enviar</button>

    <div class="flex justify-between items-center">
      <a href="{{route('books.index')}}" class="text-indigo-600">volver </a>

    </div>

