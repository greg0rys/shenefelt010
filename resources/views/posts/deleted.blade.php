@extends('layouts.app')

@section('title', 'Deleted Posts')

@section('content')
    <hgroup>
        <h1>Deleted Posts</h1>
        <p>Archive of posts that have been soft-deleted.</p>
    </hgroup>

    <nav>
        <ul>
            <li></li>
        </ul>
        <ul>
            <li><a href="{{ route('posts.index') }}" role="button" class="secondary">Back to Active Posts</a></li>
        </ul>
    </nav>

    <figure>
        <table role="grid">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Original Author</th>
                <th scope="col">Date Deleted</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        {{-- Using optional() just in case the user was also hard deleted --}}
                        {{ optional($post->user)->full_name ?? 'Unknown User' }}
                    </td>
                    <td>
                        <span data-tooltip="{{ $post->deleted_at }}">
                            {{ $post->deleted_at->format('M d, Y h:i A') }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 3rem;">
                        <em>No deleted posts found in the trash.</em>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </figure>
@endsection
