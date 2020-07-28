<?php

namespace App\Http\Controllers;

use App\Book;
use Cyberduck\LaravelExcel\ImporterFacade;
use Illuminate\Http\Request;

class ImportController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('import.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->books_file);
        $validatedData = $request->validate([
            'books_file' => 'required',
        ]);

        try {
            $extensions = $this->fileType();
            if ($request->hasFile('books_file') and in_array($request->books_file->extension(), $extensions)) {
                $pdfile = $request->books_file;
                $fileName = time() . '.' . $pdfile->getClientOriginalName();
                $pdfile->move('assets/books/', $fileName);
                $productsfilepath = 'assets/books/' . $fileName;
            }

            $excel = ImporterFacade::make('Excel');
            $excel->load($productsfilepath);
            $books = $excel->getCollection();
            foreach ($books as $key => $book) {
                if ($key > 0) {
                    $book_row = Book::create([
                        'isbn' => $book[0],
                        'title' => $book[1],
                        'author' => $book[2],
                        'description' => $book[3],
                        'publication' => $book[4],
                        'language' => $book[5],
                        'edition' => $book[6]
                    ]);

                    // foreach ($book as $temp => $col) {
                    //     // $book_row
                    // }
                }
            }
            return redirect('books')->with('success', 'Books Have Been Added Successfully !!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('errors', 'Oops !! Something Went Wrong, Please Try Again Later !!');
        }
    }

    public function fileType()
    {
        $extensions = array('xlsx', 'csv');
        return $extensions;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
