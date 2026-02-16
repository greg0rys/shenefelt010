@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="user_id">
            User ID
            <input
                type="number"
                id="user_id"
                name="user_id"
                value="{{ old('user_id', $post->user_id) }}"
                required
                readonly
                disabled
            >
            <small>Cannot change author</small>
        </label>

        <label for="title">
            Title
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $post->title) }}"
                required
            >
        </label>

        <label for="body">
            Body
            <textarea
                id="body"
                name="body"
                rows="5"
                required
            >{{ old('body', $post->body) }}</textarea>
        </label>

        <div class="grid">
            <button type="submit">Update Post</button>
            <a href="{{ route('posts.show', $post) }}" role="button" class="secondary">Cancel</a>
        </div>
    </form>
@endsection
