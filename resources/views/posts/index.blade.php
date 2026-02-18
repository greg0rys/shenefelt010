@extends('layouts.app')

@section('title', 'All Posts')

@push('styles')
    <style>
        .actions-cell {
            text-align: right;
        }
        .delete-btn {
            padding: 0.2rem 0.5rem;
            font-size: 0.75rem;
            border: none;
            margin-bottom: 0;
            color: #d93526; /* Warning Red */
            width: auto;
        }
    </style>
@endpush

@section('content')
    <nav>
        <ul>
            <li><strong>All Posts</strong></li>
        </ul>
        <ul>
            <li><a href="{{ route('posts.create') }}" role="button">New Post</a></li>
        </ul>
    </nav>

    <figure>
        <table role="grid">
            <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">User ID</th>
                <th scope="col">Title</th>
                <th scope="col" class="actions-cell">Actions</th>
            </tr>
            </thead>

            {{-- Loop through groups (Multiple <tbody> is valid HTML and great for grouping) --}}
            @foreach($posts as $userId => $userPosts)
                <tbody>
                <tr style="background-color: var(--pico-muted-border-color);">
                    <td colspan="4" style="color: var(--pico-contrast-color);">
                        <strong>
                            👤 {{ $userPosts->first()->user->full_name }}
                        </strong>
                        <small class="secondary">(ID: {{ $userId }})</small>
                    </td>
                </tr>

                @foreach($userPosts as $post)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td class="actions-cell">
                            <form action="{{ route('posts.destroy', $post->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure?');"
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
            @endforeach
        </table>
    </figure>
@endsection
