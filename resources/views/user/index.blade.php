<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<section>
    <table>
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Post Count</th>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>
                    {{$u->id}}
                </td>
                <td>
                    {{$u->full_name}}
                </td>
                <td>
                    {{$u->email}}
                </td>

                <td>
                    {{$u->posts_count}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</section>
</html>
