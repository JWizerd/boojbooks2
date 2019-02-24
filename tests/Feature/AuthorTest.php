<?php

namespace Tests\Feature;

use App\Author;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * test acceptance creation of author
     *
     * @return void
     */
    public function testCreate()
    {
        $request = factory(Author::class)->make()->toArray();
        $response = $this->post('/authors', $request);
        $this->assertDatabaseHas('authors', ['name' => $request['name']]);
        $response->assertStatus(302);
    }

    /**
     * test acceptance get author
     *
     * @return void
     */
    public function testGet()
    {
        $authors = factory(Author::class, 2)->create();

        $response = $this->get('/authors');

        $response->assertStatus(200);

        array_map(function($author) use ($response) {
            $response->assertSee($author->name);
        }, $authors->all());
    }

    /**
     * test acceptance delete author
     *
     * @return void
     */
    public function testDelete()
    {
        $author = factory(Author::class)->create();

        $response = $this->get('/authors', ['id' => $author->id]);
        $response->assertStatus(200);
    }
}
