<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'content' => 'required|max:255',
        ],[
            // ? Errores de validacion traducidos al spanish
            'content.required'=>'Este campo es requerido',
        ]);

        $comment = new Comments($validated);
        $comment->user_id = auth()->id();
        $comment->book_id = intval($request->input('book_id'));
        $comment->save();

        return redirect()->back()->with('success',
            'Comentario agregado exitosamente.'
        );
    }

    public function destroy(Comments $comment){
        $comment->delete();

        return redirect()->back()->with('success',
            'Comentario eliminado exitosamente.'
        );
    }
}