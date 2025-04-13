<?php

namespace Tests\Unit\Domains\User\Actions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domains\User\Models\User;
use App\Domains\User\Actions\UpdateUserAction;
use App\Domains\User\DTOs\UserData;

class UpdateUserActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_user_fields()
    {

        $originalPassword = bcrypt('Shawen@123');
        $user = User::factory()->create([
            'password' => $originalPassword,
            'profile_picture' => 'old.jpg',
        ]);

        $dto = new UserData(
            name: 'UpdatedName',
            surname: 'UpdatedSurname',
            email: 'updated@example.com',
            phone: '1234567890',
            country: 'Germany',
            gender: 'female',
            profile_picture: 'profile_pictures/updated.jpg'
        );


        $updatedUser = (new UpdateUserAction())->execute($user, $dto);

        $this->assertEquals('UpdatedName', $updatedUser->name);
        $this->assertEquals('UpdatedSurname', $updatedUser->surname);
        $this->assertEquals('1234567890', $updatedUser->phone);
        $this->assertEquals('Germany', $updatedUser->country);
        $this->assertEquals('female', $updatedUser->gender);
        $this->assertEquals('profile_pictures/updated.jpg', $updatedUser->profile_picture);
    }
}
