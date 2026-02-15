<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post {{$post->id ?? 'err'}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<main class="container">
    <figure>
        <table>
            <thead>
                <th>Title</th>
                <th>Body</th>
                <th>Slug</th>
            <th>
                User Publisher
            </th>
            <th>
                Created At
            </th>
            </thead>

            <tbody>
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{ $post->slug->slug ?? 'No Slug' }}</td>
                <td>{{$post->user->full_name}}</td>
                <td>{{ $post->created_at->setTimezone('America/Los_Angeles')->format('M d-Y') }}</td>
            </tr>
            </tbody>
        </table>
    </figure>
</main>
</body>
</html>
