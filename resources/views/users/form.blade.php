@csrf

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Surname</label>
    <input type="text" name="surname" class="form-control" value="{{ old('surname', $user->surname ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}">
</div>

<div class="mb-3">
    <label>Country</label>
    <select name="country" class="form-control" required>
        @foreach ($countries as $country)
            <option value="{{ $country }}" {{ old('country', $user->country ?? '') === $country ? 'selected' : '' }}>
                {{ $country }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Gender</label>
    <select name="gender" class="form-control" required>
        @foreach ($genders as $gender)
            <option value="{{ $gender }}" {{ old('gender', $user->gender ?? '') === $gender ? 'selected' : '' }}>
                {{ ucfirst($gender) }}
            </option>
        @endforeach
    </select>
</div>

@if (!isset($user)) {{-- Only show password fields on create --}}
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Repeat Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
@endif

<div class="mb-3">
    <label>Profile Picture</label>
    <input type="file" name="profile_picture" class="form-control">
    @if(isset($user) && $user->profile_picture)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $user->profile_picture) }}" width="80">
        </div>
    @endif
</div>

<button type="submit" class="btn btn-success">
    {{ isset($user) ? 'Update' : 'Create' }} User
</button>
