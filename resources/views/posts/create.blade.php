@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1>Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label for="user_id">
            User ID <small>(Temporary)</small>
            <input
                type="number"
                id="user_id"
                name="user_id"
                placeholder="e.g., 1"
                value="{{ old('user_id') }}"
                required
            >
        </label>

        <label for="title">
            Title
            <input
                type="text"
                id="title"
                name="title"
                placeholder="Enter post title..."
                value="{{ old('title') }}"
                required
            >
        </label>

        <label for="body">
            Body
            <textarea
                id="body"
                name="body"
                rows="5"
                placeholder="Write something amazing..."
                required
            >{{ old('body') }}</textarea>
        </label>

        <div class="grid">
            <button type="submit">Publish Post</button>
            <a href="{{ route('posts.index') }}" role="button" class="secondary">Cancel</a>
        </div>
    </form>
@endsection
