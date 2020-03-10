<?php

namespace Tests\Feature\Admin;

use App\Constants;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{

    public function test_a_manager_is_redirected_to_dashboard_when_authenticated(){
        $user = factory(User::class)->create(); // Creates a user and insert him into the database ..
        $user->update([
            'priority' => Constants::MANAGERPRIORITY,
        ]);
        // $user = factory(User::class)->make(); // Creates a user object ..

        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/dashboard');
    }
}
