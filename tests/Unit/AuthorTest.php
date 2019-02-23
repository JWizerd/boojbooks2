<?php

namespace Tests\Unit;

use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatesAuthor()
    {
        $testUser = 'unitTestUser';

        // given
        Author::create([
            'name' => $testUser,
            'birthday' => '1111-11-11',
            'biography' => 'test biography'
        ]);

        $this->assertDatabaseHas('authors', [
            'name' => $testUser
        ]);
    }
}
