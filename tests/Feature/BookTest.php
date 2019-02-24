<?php

namespace Tests\Feature;

use App\Book;
use App\Author;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BookTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * test acceptance creation of author
     *
     * @return void
     */
    public function testCreate()
    {
        $author = factory(Author::class)->create();
        $request = factory(Book::class)->make()->getAttributes();

        $request['author_id'] = $author->id;

        $response = $this->post('/books', $request);

        $this->assertDatabaseHas('books', ['title' => $request['title']]);
        $response->assertStatus(200);
    }
}
