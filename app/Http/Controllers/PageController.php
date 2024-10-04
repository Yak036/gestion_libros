<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // ? Funcion para mostrar books de todos los usuarios
    public function index(Request $request)
    {
        if (isset($request->search)) {
            // ? Buscar los libros que tengan el user_id == al usuario autenticado
            $searchBook = Book::where('author', 'like', '%' . $request->search . '%')->paginate(10);
                            
            return view('dashboard',[
                'user'=> $searchBook
            ]);
        }
        
        $books = Book::with('user')->paginate(10);

        return view('dashboard',[
            'user'=> $books
        ]);
    }
}