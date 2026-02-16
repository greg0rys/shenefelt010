@extends('layouts.app')

@section('title', $user->full_name)

@section('content')
    <nav>
        <ul>
            <li><strong>Viewing User</strong></li>
        </ul>
        <ul>
            <li><a href="{{ route('users.index') }}" class="secondary">Back to List</a></li>
            <li><a href="{{ route('users.edit', $user) }}" role="button" class="outline">Edit</a></li>
        </ul>
    </nav>

    <article>
        <header>
            <hgroup>
                <h1>{{ $user->full_name }}</h1>
                <p>Role: {{ $user->system_role ?? 'User' }}</p>
            </hgroup>
        </header>

        <div class="grid">
            <div>
                <strong>Email:</strong> {{ $user->email }}
            </div>
            <div>
                <strong>Company:</strong> {{ $user->company->name ?? 'None Assigned' }}
            </div>
            <div>
                <strong>Joined:</strong> {{ $user->created_at->format('M d, Y') }}
            </div>
        </div>

        @if($user->ban)
            <footer style="background-color: #ffe6e6; border-top: 1px solid #ffcccc;">
                <strong>⚠️ Banned</strong><br>
                Reason: {{ ucwords($user->ban->reason) }}
            </footer>
        @endif
    </article>
@endsection
