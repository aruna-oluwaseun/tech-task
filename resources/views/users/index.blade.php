@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" width="50" height="50" class="rounded-circle">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $user->name }} {{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->country }}</td>
                <td>{{ ucfirst($user->gender) }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">No users found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
