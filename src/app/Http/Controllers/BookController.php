<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all(); 
        return view('books.index', compact('books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' =>'required',
            'author' =>'required',
            'description' =>'required',
            'price' =>'required',
            'genre' =>'required',
            'publisher' =>'required',
            'category' =>'required',
            'path' =>'required',
        ]);
        $newbook = book::create($data);
        return redirect(route('book.index'));


    }
    public function edit(book $book){
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, book $book){
        $data = $request->validate([
            'title' =>'required',
            'author' =>'required',
            'description' =>'required',
            'price' =>'required',
            'genre' =>'required',
            'publisher' =>'required',
            'category' =>'required',
            'path' =>'required',
        ]);
        $book->update($data);
        return redirect(route('book.index'));
    }

    public function delete($id){
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('book.index');
    }
}
