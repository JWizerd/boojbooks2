<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|string|max:255',
            'publication_date' => 'required|date:YYYY-MM-DD',
            'description' => 'required|string',
            'pages' => 'required|integer',
            'author_id' => 'required|integer'
        ];
    }

    public function books()
    {
        $books = Book::all();

        return view('books', compact('books'));
    }

    public function addBook(Request $request)
    {
        if($request->validate($this->rules())) {
            Book::create($request->all());
        }

        session()->flash('status', 'Book Added!');
        return redirect('books');
    }

    public function deleteBook($book_id)
    {
        Book::destroy($book_id);

        session()->flash('status', 'Book Deleted!');
        return redirect('books');
    }
}
