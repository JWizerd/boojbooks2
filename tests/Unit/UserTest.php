<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatesUser()
    {
        $testUser = 'unitTestUser';

        User::create([
            'name' => $testUser,
            'email' => 'testing@test.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $testUser
        ]);
    }
}
