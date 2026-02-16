@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <nav>
        <ul>
            <li><strong>Viewing Post</strong></li>
        </ul>
        <ul>
            <li><a href="{{ route('posts.index') }}" class="secondary">Back to List</a></li>
            <li><a href="{{ route('posts.edit', $post) }}" role="button" class="outline">Edit</a></li>
        </ul>
    </nav>

    <article>
        <header>
            <hgroup>
                <h1>{{ $post->title }}</h1>
                <p>By {{ $post->user->full_name }} on {{ $post->created_at->format('M d, Y') }}</p>
            </hgroup>
        </header>

        <p>{{ $post->body }}</p>

        <footer>
            <small>Slug: {{ $post->slug->slug ?? 'N/A' }}</small>
        </footer>
    </article>
@endsection
