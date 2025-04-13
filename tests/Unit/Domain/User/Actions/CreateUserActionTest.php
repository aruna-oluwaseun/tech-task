<?php

namespace Tests\Unit\Domains\User\Actions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domains\User\Actions\CreateUserAction;
use App\Domains\User\DTOs\UserData;
use App\Domains\User\Models\User;

class CreateUserActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_user_successfully()
    {

        $dto = new UserData(
            name: 'Adelana',
            surname: 'Opeyemi',
            email: 'ade@yahoo.com',
            phone: '1234567890',
            country: 'USA',
            gender: 'male',
            password: 'Shawen@123!',
            profile_picture: 'profile_pictures/avatar.jpg'
        );

        $action = new CreateUserAction();

        $user = $action->execute($dto);

        $this->assertInstanceOf(User::class, $user);
        $this->assertDatabaseHas('users', [
            'email' => 'ade@yahoo.com',
            'name' => 'Adelana',
        ]);

        $this->assertTrue(password_verify('Shawen@123!', $user->password));
        $this->assertEquals('profile_pictures/avatar.jpg', $user->profile_picture);
    }
}
