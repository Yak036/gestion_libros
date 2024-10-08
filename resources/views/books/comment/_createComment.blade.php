@csrf

<input type="hidden" name="book_id" value="{{$book->id}}">
<label for="content" class="block text-gray-700 text-sm font-bold mb-2">Comentario:</label>
<span class="text-xs text-red-600">@error('content') {{$message}} @enderror</span>
<textarea class="rounded border-gray-700 w-full py-2 px-3 mb-3" rows="6" id="content" name="content">{{$book->content}}</textarea>
<button class="ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Enviar</button>