<?php

namespace Tests\Feature;

use App\Book;
use App\Author;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * test acceptance creation of author
     *
     * @return void
     */
    public function testCreate()
    {
        $author = factory(Author::class)->create();
        $request = factory(Book::class)->make()->toArray();

        $request['author_id'] = $author->id;

        $response = $this->post('/books', $request);

        $this->assertDatabaseHas('books', ['title' => $request['title']]);
        $response->assertStatus(200);
    }

    /**
     * test acceptance get book
     *
     * @return void
     */
    public function testGet()
    {
        $authors = factory(Book::class, 2)->create();

        $response = $this->get('/books');
            $response->assertStatus(200);

        array_map(function($book) use ($response) {
            $response->assertSee($book->name);
        }, $book->all());
    }

    /**
     * test acceptance delete book
     *
     * @return void
     */
    public function testDelete()
    {
        $book = factory(Book::class)->create();

        $response = $this->get('/books', ['id' => $book->id]);
        $response->assertStatus(200);
        $response->assertSee('Book Deleted!');
    }
}
