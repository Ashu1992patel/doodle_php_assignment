<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:book-list|book-create|book-edit|book-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:book-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:book-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:book-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        //     $books = Book::cursor();
        // return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'isbn' => 'required|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'publication' => 'required|max:255',
            'language' => 'required|max:255',
            'edition' => 'required|max:255'
        ]);

        try {
            $book = Book::create([
                'isbn' => $request->isbn,
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'publication' => $request->publication,
                'language' => $request->language,
                'edition' => $request->edition
            ]);

            if (isset($book)) {
                return redirect('books')->with('success', 'New Book Has Been Added Succesfully !!');
            } else {
                return redirect()->back()->with('error', 'Oops...!! Something Went Wrong !!');
            }
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Oops...!! Something Went Wrong !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validate = $request->validate([
            'isbn' => 'required|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'publication' => 'required|max:255',
            'language' => 'required|max:255',
            'edition' => 'required|max:255'
        ]);

        try {
            $book_update_status = $book->update([
                'isbn' => $request->isbn,
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'publication' => $request->publication,
                'language' => $request->language,
                'edition' => $request->edition
            ]);

            if (isset($book_update_status)) {
                return redirect('books')->with('success', 'Book Details Has Been Updated Succesfully !!');
            } else {
                return redirect()->back()->with('error', 'Oops...!! Something Went Wrong !!');
            }
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Oops...!! Something Went Wrong !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return redirect()->back()->with('success', 'Book Has Been Deleted Succesfully !!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Oops...!! Something Went Wrong !!');
        }
    }
}
