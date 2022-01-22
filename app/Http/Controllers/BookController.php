<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        if(!$books){
            return \response("Aun no se ha creado ningún libro.", 100);
        }else if($books){
            return \response($books);
        }else{
            return \response("Error del servidor, intentelo mas tarde.", 500);
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);

        $book = Book::create($request->all());
        
        return \response(["Libro creado correctamente.", $book], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        
        if(!$book){
            return \response("El libro que intentas ver no existe o ha sido eliminado.", 404);
        }else if($book){
            return \response($book, 200);
        }else{
            return \response("Error del servidor, intentelo mas tarde.", 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if(!$book){
            return \response("Error: El libro que intentas actualizar no existe.", 404);
        }else{
            $book->update($request->all());
            return \response(["El libro ha sido actualizado correctamente.", $book], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if(!$book){
            return \response("Error: El libro que intentas eliminar no existe.", 404);
        }else{
            $book->delete();
            return \response("El libro ha eliminado correctamente.", 200);
        }
    }
}
