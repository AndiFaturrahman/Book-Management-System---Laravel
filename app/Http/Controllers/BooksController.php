<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return view('books.index', ['buku' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|integer',
            'isbn' => 'required|unique:books',
            'pages' => 'required|integer',
            'language' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        Books::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Books $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Books $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|integer',
            'isbn' => 'required|unique:books,isbn,'.$book->id,
            'pages' => 'required|integer',
            'language' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
