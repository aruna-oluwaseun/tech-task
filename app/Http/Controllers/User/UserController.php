<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Domains\User\Actions\CreateUserAction;
use App\Domains\User\Actions\UpdateUserAction;
use App\Domains\User\DTOs\UserData;
use App\Domains\User\Models\User;

class UserController extends BaseController
{
    protected function dtoClass(): string
    {
        return UserData::class;
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return $this->view('users.create', $this->formOptions());
    }

    public function store(StoreUserRequest $request, CreateUserAction $action)
    {
        $dto = $this->mapToDTO(
            $request->validated(),
            ['profilePicture' => $this->storeFile($request->file('profile_picture'), 'profile_pictures')]
        );

        $action->execute($dto);

        return $this->redirectSuccess('users.index', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return $this->view('users.edit', array_merge(['user' => $user], $this->formOptions()));
    }

    public function update(UpdateUserRequest $request, User $user, UpdateUserAction $action)
    {
        $dto = $this->mapToDTO(
            $request->validated(),
            ['profilePicture' => $this->storeFile($request->file('profile_picture'), 'profile_pictures')]
        );

        $action->execute($user, $dto);

        return $this->redirectSuccess('users.index', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return $this->redirectSuccess('users.index', 'User deleted successfully.');

    }


    protected function formOptions(): array
    {
        return [
            'countries' => ['USA', 'Germany', 'France'],
            'genders' => ['male', 'female', 'other'],
        ];
    }
}
