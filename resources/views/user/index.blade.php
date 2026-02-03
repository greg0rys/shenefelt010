<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<main class="container">
    <h2>All Posts</h2>

    <figure>
        <table role="grid">
            <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">User ID</th>
                <th scope="col">Title</th>
            </tr>
            </thead>

            {{-- 1. Loop through the Groups (Key = UserID, Value = List of Posts) --}}
            @foreach($posts as $userId => $userPosts)

                {{-- 2. Create a specific body for this user group to keep them visually together --}}
                <tbody>
                <tr style="background-color: var(--pico-card-background-color);">
                    <td colspan="3">
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
                        <td>{{ $post->title }}</td>
                    </tr>
                @endforeach
                </tbody>

            @endforeach
        </table>
    </figure>
</main>
</body>
</html>
