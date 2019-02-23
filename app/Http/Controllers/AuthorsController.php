<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Author;

class AuthorsController extends Controller
{
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

    public function authors()
    {
        $authors = Author::all();

        return view('authors', compact('authors'));
    }

    public function addAuthor(Request $request)
    {
        if($request->validate($this->rules())) {
            Author::create($request->all());
        }
    }

    public function deleteAuthor($author_id)
    {
        Author::destroy($author_id);

        session()->flash('status', 'Author Deleted!');
        return redirect('authors');
    }
}
