@extends('layouts.app')

@section('title', 'All Users')

@push('styles')
    <style>
        .actions-cell {
            text-align: right;
        }
        .delete-btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
            border: none;
            margin-bottom: 0;
            color: #d93526;
        }
    </style>
@endpush

@section('content')
    <nav>
        <ul>
            <li><strong>All Users</strong></li>
        </ul>
        <ul>
            <li><a href="{{ route('users.create') }}" role="button">New User</a></li>
        </ul>
    </nav>

    <figure>
        <table role="grid">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Post Count</th>
                <th scope="col" class="actions-cell">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{ route('users.show', $user) }}">
                            {{ $user->full_name }}
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->posts_count }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('users.edit', $user) }}" role="button" class="outline secondary" style="padding: 0.25rem 0.5rem; font-size: 0.8rem; margin-right: 0.5rem;">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this user?');"
                              style="display:inline; margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="outline contrast delete-btn">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>
@endsection
