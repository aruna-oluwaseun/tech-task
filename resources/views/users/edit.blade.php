@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    @include('partials.errors')

    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('users.form', [
            'user' => $user,
            'countries' => $countries,
            'genders' => $genders
        ])
    </form>
</div>
@endsection
