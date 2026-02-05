<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Users Log</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <style>
        /* Muted red theme for a read-only archive feel */
        :root {
            --pico-primary: #8d2626;
            --pico-primary-background: #8d2626;
            --pico-primary-hover: #721c1c;
        }
    </style>
</head>
<body>

<main class="container">

    <hgroup>
        <h1>Deleted Users Log</h1>
        <p>A read-only history of deactivated accounts.</p>
    </hgroup>

    <section>
        @if($users->isEmpty())
            <article>
                <p>No deleted users found in the records.</p>
            </article>
        @else
            <figure>
                <table class="striped">
                    <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date Deleted</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">#{{ $user->id }}</th>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                    <span data-tooltip="{{ $user->deleted_at->toDayDateTimeString() }}">
                                        {{ $user->deleted_at->format('M d, Y') }}
                                    </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </figure>
        @endif
    </section>

    <footer>
        <a href="/" role="button" class="secondary outline">Back to Home</a>
    </footer>

</main>

</body>
</html>
