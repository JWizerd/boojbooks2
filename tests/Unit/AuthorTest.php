<?php

namespace Tests\Unit;

use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    /**
     * test creation of author
     *
     * @return void
     */
    public function testCreate()
    {
        $author = factory(Author::class)->create();
        $this->assertDatabaseHas('authors', ['name' => $author->name]);
    }
}
