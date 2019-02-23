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
     * validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|string|max:255',
            'birthday' => 'required|date:YYYY-MM-DD',
            'biography' => 'required|string'
        ];
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

    public function addAuthor(Request $request)
    {
        if($request->validate($this->rules())) {
            $author = new Author;
            $author->name = $request->input('name');
            $author->birthday = $request->input('birthday');
            $author->biography = $request->input('biography');
            $author->save();

            session()->flash('status', 'Author Added!');
            return redirect('authors');
        }
    }

    public function deleteAuthor($author_id)
    {
        DB::table('authors')->where('id', $author_id)->delete();

        session()->flash('status', 'Author Deleted!');
        return redirect('authors');
    }
}
