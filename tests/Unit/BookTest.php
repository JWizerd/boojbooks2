<?php

namespace Tests\Unit;

use App\Book;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    /**
     * test creation of book
     *
     * @return void
     */
    public function testCreate()
    {
        $book = factory(Book::class)->create();
        $this->assertDatabaseHas('books', ['title' => $book->title]);
    }
}
