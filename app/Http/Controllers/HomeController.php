<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Author;
use App\Book;


/**
 * ========================================================
 * OVERVIEW:
 * 1. Stylistically, there should consistency with spacing between methods,
 * doc blocks on properties and methods, typehinting, strict return types and
 * better error handling
 *
 * 2. insertion actions should be validating incoming data, I'd implement a validation rules property
 * that is specific to the model a controller is interacting with for example:
 *
 *
 * private function rules() {
 *  'name' => 'bail|required|string|max:255',
 *  'birthday' => 'required|date:YYYY-MM-DD',
 *  'biography' => 'required|string'
 * }
 *
 * public function addAuthor(Request $request)
 * {
 *   if($request->validate($this->rules())) {
 *     Author::create($request->all());
 *   }
 * }
 *
 *
 * 3. Utilize Eloquent when interacting with Active Records. It's more readable and maintainable for yourself
 * and future developers.
 *
 * 4. Utilize Illuminate\Http\Request instead of $_POST. It's provides a supportive abstraction that makes it
 * easier to manage request data and also helps prevent simple fatal errors like undefined indexes.
 *
 * 5. Full CRUD operations aren't supported in this controller. Implement update action.
 * ========================================================
 */

class HomeController extends Controller
{
    /**
     * ========================================================
     * After refactoring Author and Book actions into their own controllers
     * move this into the base controller so all controllers can utilize the auth middleware
     * You could also probably refactor add and delete methods into the base controller and use
     * a private model property to manage context of the base add and delete methods
     * ========================================================
     */
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

    /**
     * ========================================================
     * Author actions should be refactored into their own controller.
     * Shouldn't be the responsibility of the home controller.
     * ========================================================
     */
    public function authors()
    {
        $authors = Author::all();

        return view('authors', compact('authors'));
    }
    public function addAuthor(Request $request)
    {
        // 1. Don't use $_POST use Request, more support and more readable
        // 2. validate incoming data
        // 3. if all fields have validation, utilize Request::all()
        // 4. tests will always fail because we aren't using the Request object
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
        // Use Author::destroy()
        DB::table('authors')->where('id', $author_id)->delete();

        session()->flash('status', 'Author Deleted!');
        return redirect('authors');
    }

    /**
     * ========================================================
     * Book actions should be refactored into their own controller.
     * Shouldn't be the responsibility of the home controller.
     * ========================================================
     */
    public function books()
    {
        $books = Book::all();

        return view('books', compact('books'));
    }
    public function addBook()
    {
        // 1. Don't use $_POST use Request, more support and more readable
        // 2. validate incoming data
        // 3. if all fields have validation, utilize Request::all()
        $book = new Book;
        $book->title = $_POST['title'];
        $book->author_id = $_POST['author_id'];
        $book->publication_date = $_POST['publication_date'];
        $book->description = $_POST['description'];
        $book->pages = $_POST['pages'];
        $book->save();

        session()->flash('status', 'Book Added!');
        return redirect('books');
    }
    public function deleteBook($book_id)
    {
        // Use Book::destroy()
        DB::table('books')->where('id', $book_id)->delete();

        session()->flash('status', 'Book Deleted!');
        return redirect('books');
    }
}
