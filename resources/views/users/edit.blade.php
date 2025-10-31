@extends('layouts.default')
@section('page-title', 'Edit User')
@section('content')


    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') ?? $user->name }}"
                class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') ?? $user->email }}"
                class="form-control @error('email') is-invalid @enderror"" aria-describedby="emailHelp">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror""
                aria-describedby="passwordHelp">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
