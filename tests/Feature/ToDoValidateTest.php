<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\ToDo;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToDoValidateTest extends TestCase
{
    public function testOnlyLoggedUsersCanSeeTodos()
    {

        $response = $this->get('/todos')->assertRedirect('/login');
    }

    public function testOnlyLoggedUsersCanCreateTodo()
    {

        $response = $this->get('/todos/create')->assertRedirect('/login');
    }

    public function testOnlyLoggedUsersCanEditTodo()
    {

        $response = $this->get('/todos/edit')->assertRedirect('/login');
    }

    public function testLoggedUserCanSeeTodo()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/todos');

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    public function testLoggedUserCanCreateTodo()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $todo = ToDo::factory()->create(['users_id' => $user->id]);

        $response = $this->get('/todos/create');

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    public function testLoggedUserCanEditTodo()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $todo = ToDo::factory()->create(['users_id' => $user->id]);

        $response = $this->get("/todos/{$todo->id}/edit");

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    public function testLoggedUserCanSeeTodoDetails()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $todo = ToDo::factory()->create(['users_id' => $user->id]);

        $response = $this->get("/todos/{$todo->id}");

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }
}
