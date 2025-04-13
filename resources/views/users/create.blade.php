<!-- resources/views/users/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create New User</h1>

    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf

        <input name="name" placeholder="Name" value="{{ old('name') }}">
        <input name="surname" placeholder="Surname" value="{{ old('surname') }}">
        <input name="email" placeholder="Email" type="email" value="{{ old('email') }}">
        <input name="phone" placeholder="Phone" value="{{ old('phone') }}">

        <select name="country">
            @foreach ($countries as $country)
                <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
        </select>

        <select name="gender">
            @foreach ($genders as $gender)
                <option value="{{ $gender }}">{{ ucfirst($gender) }}</option>
            @endforeach
        </select>

        <input name="password" placeholder="Password" type="password">
        <input name="password_confirmation" placeholder="Confirm Password" type="password">
        <input type="file" name="profile_picture">

        <button type="submit">Create User</button>
    </form>
@endsection
