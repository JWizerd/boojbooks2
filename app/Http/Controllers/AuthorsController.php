<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Author;

class AuthorsController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function authors()
    {
        $authors = Author::all();

        return view('authors', compact('authors'));
    }

    public function addAuthor()
    {
        $author = new Author;
        $author->name = $_POST['name'];
        $author->birthday = $_POST['birthday'];
        $author->biography = $_POST['biography'];
        $author->save();

        session()->flash('status', 'Author Added!');
        return redirect('authors');
    }

    public function deleteAuthor($author_id)
    {
        DB::table('authors')->where('id', $author_id)->delete();

        session()->flash('status', 'Author Deleted!');
        return redirect('authors');
    }
}
