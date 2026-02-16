<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <style>
        .actions-cell {
            text-align: right;
        }
        .delete-btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
            border: none;
            margin-bottom: 0;
            color: #d93526; /* Red text for warning */
        }
    </style>
</head>
<body>
<main class="container">
    <nav>
        <ul>
            <li><strong>All Posts</strong></li>
        </ul>
        <ul>
            <li><a href="{{ route('posts.create') }}" role="button">New Post</a></li>
        </ul>
    </nav>

    @if(session('success'))
        <article style="background-color: #e6ffe6; border: 1px solid #ccffcc; color: #006600; padding: 1rem; margin-bottom: 2rem;">
            {{ session('success') }}
        </article>
    @endif

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

            {{-- 1. Loop through the Groups (Key = UserID, Value = List of Posts) --}}
            @foreach($posts as $userId => $userPosts)

                {{-- 2. Create a specific body for this user group to keep them visually together --}}
                <tbody>
                <tr style="background-color: var(--pico-card-background-color);">
                    <td colspan="4">
                        <strong>
                            {{-- Get the user info from the first post in the group --}}
                            👤 {{ $userPosts->first()->user->full_name }}
                        </strong>
                        <small>(ID: {{ $userId }})</small>
                    </td>
                </tr>

                {{-- 3. Inner Loop: Iterate through the actual posts for this user --}}
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
                            {{-- DELETE Form --}}
                            <form action="{{ route('posts.destroy', $post->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this post?');"
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
</main>
</body>
</html>
