<?php

namespace Tests\Feature;

use App\Author;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AuthorTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * test acceptance creation of author
     *
     * @return void
     */
    public function testCreate()
    {
        $request = factory(Author::class)->make()->getAttributes();

        $this->post('/authors', $request);

        $this->assertDatabaseHas('authors', ['name' => $request['name']]);
        $response->assertStatus(200);
    }
}
