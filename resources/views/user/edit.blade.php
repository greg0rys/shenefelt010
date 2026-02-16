@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User: {{ $user->full_name }}</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid">
            <label for="first_name">
                First Name
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
            </label>

            <label for="last_name">
                Last Name
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
            </label>
        </div>

        {{-- Hidden Full Name field is calculated in controller --}}
        <input type="hidden" name="full_name" value="{{ $user->full_name }}">

        {{-- Assuming company_id is required by the UpdateUserRequest --}}
        <label for="company_id">
            Company ID (Temporary)
            <input type="number" id="company_id" name="company_id" value="{{ old('company_id', $user->company_id) }}" required>
        </label>

        <label for="system_role">
            System Role
            <select id="system_role" name="system_role">
                <option value="user" {{ $user->system_role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->system_role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="vendor" {{ $user->system_role == 'vendor' ? 'selected' : '' }}>Vendor</option>
                <option value="contract employee" {{ $user->system_role == 'contract employee' ? 'selected' : '' }}>Contract Employee</option>
            </select>
        </label>

        <div class="grid">
            <button type="submit">Update User</button>
            <a href="{{ route('users.show', $user) }}" role="button" class="secondary">Cancel</a>
        </div>
    </form>
@endsection
