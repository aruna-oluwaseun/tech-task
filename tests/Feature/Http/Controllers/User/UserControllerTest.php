<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Domains\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_user_index_page()
    {
        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('users.index');
    }

    /** @test */
    public function it_can_create_a_user()
    {
        Storage::fake('public');

        $data = [
            'name' => 'Jane',
            'surname' => 'Doeyy',
            'email' => 'jane@example.com',
            'phone' => '123456789',
            'country' => 'USA',
            'gender' => 'female',
            'password' => 'Password123',
            'password_confirmation' => 'Password123',
            'profile_picture' =>  UploadedFile::fake()->create('avatar.jpg', 100)
        ];

        $response = $this->post(route('users.store'), $data);
        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => 'jane@example.com']);
    }

    /** @test */
    public function it_can_edit_a_user()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.edit', $user));

        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
        $response->assertViewHas('user', $user);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'UpdatedNamei',
            'surname' => $user->surname,
            'phone' => $user->phone,
            'country' => $user->country,
            'gender' => $user->gender,
        ];

        $response = $this->put(route('users.update', $user), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['name' => 'UpdatedNamei']);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    /** @test */
    public function it_returns_validation_error_when_required_fields_are_missing()
    {
        $response = $this->post(route('users.store'), []);

        $response->assertSessionHasErrors(['name', 'surname', 'email', 'country', 'gender', 'password']);
    }
}
