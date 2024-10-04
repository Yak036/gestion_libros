<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function Pest\Laravel\post;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // * Mostrar todos los books de un usuario lo los relacionados con su busqueda
    public function index(Request $request){
        // * Si existe una busqueda 
        if (isset($request->search)) {
            // ? Buscar los libros que tengan el user_id == al usuario autenticado
            $searchBook = Book::where('user_id', auth()->user()->id)
                            // ? where grupal usando la sentencia anterior con el $request enviado por el user
                            ->where(function ($query) use ($request) {
                                // ? buscar palabras similares a las que mando el usuario
                                $query->where('title', 'like', '%' . $request->search . '%')
                                ->orWhere('author', 'like', '%' . $request->search . '%');
                            })
                            ->paginate(10);
                            
            // ? retornar a la vista index con los datos de la query anterior
            return view('books.index',[
                'user'=> $searchBook
            ]);
        }
        // * Si no existe query de busqueda
        //? Traer todos los libros vinculados al user logeado
        $userBooks = User::with('books')->findOrFail(auth()->user()->id);

        $books = $userBooks->books()->paginate(10);
    
        return view('books.index',[
            'user'=> $books
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // * Esta funcion solo retorna a la vista de creacion con el $book seleccionado desde la vista index
    public function create(Book $book)
    {
        return view('books.create',[
            'book'=> $book,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // *Crear un nuevo libro
    public function store(Request $request)
    {
        //? validaciones necesarias
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'published_year' => 'nullable|digits:4|integer|min:1500|max:'.date('Y'),
            'gender' => 'nullable|max:255',
            'description' => 'nullable',
        ],[
            // ? Errores de validacion traducidos al spanish
            'title.required'=>'Este campo es requerido',
            'author.required'=>'Este campo es requerido',
            'published_year.digits'=>'Debe tener almenos 4 digitos y ser mayor a 1500',
            'published_year.min'=>'Minimo debe ser del año 1500',
            'published_year.max'=>'No pudo ser publicado en esa fecha',
            'body.required'=>'Se necesita mínimo un párrafo',
        ]);
        // ? Creacion de instancia y vinculacion con el usuario
        $book = new Book($validated);
        $book->user_id = auth()->id();

        // ? la tabla slug la usamos en el curso para hacer rutas amigables, no super como implementarla bien
        // ? Elimina los espacios del titulo del libro para hacer una url
        $book->slug = Str::slug($request->title);
        $book->save();
        return redirect()->route('books.index')->with('success',
            'Libro agregado exitosamente.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', [
            'book'=>$book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',[
            'book'=> $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    // ? funcion para actualizar
    public function update(Request $request, Book $book)
    {
        // ? Validar si el usuario esta autorizado con el archivo policy
        $this->authorize('authorized', $book, auth()->user());

        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'published_year' => 'nullable|digits:4|integer|min:1500|max:' . date('Y'),
            'gender' => 'nullable|max:255',
            'description' => 'nullable',
            ],[
                'title.required'=>'Este campo es requerido',
                'author.required'=>'Este campo es requerido',
                'published_year.digits'=>'Debe tener almenos 4 digitos y ser mayor a 1500',
                'published_year.min'=>'Minimo debe ser del año 1500',
                'published_year.max'=>'No pudo ser publicado en esa fecha',
                'body.required'=>'Se necesita mínimo un párrafo',
            ]);
        $book->update($validated);
        return redirect()->route('books.index')->with(
            'success',
            'Libro actualizado exitosamente.'
        );
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('authorized', $book);
        $book->delete();
        return redirect()->route('books.index')->with('success',
        'Libro eliminado exitosamente.');
    }
}