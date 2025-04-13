<?php

namespace Tests\Unit;

use App\Domains\User\DTOs\UserData;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\TestCase;

class UserDataTest extends TestCase
{
    /** @test */
    public function it_can_create_user_data_from_constructor()
    {
        // Arrange
        $name = "Aruna";
        $surname = "ope";
        $email = "aruna.ope@yahoo.com";
        $phone = "1234567890";
        $country = "USA";
        $gender = "male";
        $password = "password123";
        $profilePicture = "profile_pic.jpg";

        $userData = new UserData($name, $surname, $email, $phone, $country, $gender, $password, $profilePicture);

        $this->assertEquals($name, $userData->name);
        $this->assertEquals($surname, $userData->surname);
        $this->assertEquals($email, $userData->email);
        $this->assertEquals($phone, $userData->phone);
        $this->assertEquals($country, $userData->country);
        $this->assertEquals($gender, $userData->gender);
        $this->assertEquals($password, $userData->password);
        $this->assertEquals($profilePicture, $userData->profile_picture);
    }

    /** @test */
    public function it_can_create_user_data_from_array()
    {
        $data = [
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'country' => 'USA',
            'gender' => 'male',
            'password' => 'password123',
            'profilePicture' => 'profile_pic.jpg',
        ];

        // Act
        $userData = UserData::fromArray($data);

        // Assert
        $this->assertEquals($data['name'], $userData->name);
        $this->assertEquals($data['surname'], $userData->surname);
        $this->assertEquals($data['email'], $userData->email);
        $this->assertEquals($data['phone'], $userData->phone);
        $this->assertEquals($data['country'], $userData->country);
        $this->assertEquals($data['gender'], $userData->gender);
        $this->assertEquals($data['password'], $userData->password);
        $this->assertEquals($data['profilePicture'], $userData->profile_picture);
    }


}
