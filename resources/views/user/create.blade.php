@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <h1>Create New User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="grid">
            <label for="first_name">
                First Name
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            </label>

            <label for="last_name">
                Last Name
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            </label>
        </div>

        <label for="email">
            Email Address
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </label>

        <label for="password">
            Password
            <input type="password" id="password" name="password" required>
        </label>

        <label for="system_role">
            System Role
            <select id="system_role" name="system_role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <option value="vendor">Vendor</option>
                <option value="contract employee">Contract Employee</option>
            </select>
        </label>

        <div class="grid">
            <button type="submit">Create User</button>
            <a href="{{ route('users.index') }}" role="button" class="secondary">Cancel</a>
        </div>
    </form>
@endsection
