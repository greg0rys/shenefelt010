<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
<main class="container">
    <h1>Create New Post</h1>

    @if ($errors->any())
        <article style="background-color: #ffe6e6; border: 1px solid #ff4d4d; color: #cc0000; margin-bottom: 2rem;">
            <header><strong>Please fix the following errors:</strong></header>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </article>
    @endif

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
            <a href={{route('posts.index')}} role="button" class="secondary">Cancel</a>
        </div>
    </form>
</main>
</body>
</html>
