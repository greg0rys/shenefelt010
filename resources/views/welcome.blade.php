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
@foreach($users as $u)
    <section>
        <article>
            <hgroup>
                <h5>
                    {{$u->id}} {{$u->full_name}}
                </h5>
                <h5>
                    {{$u->email}}
                </h5>
                <h4>
                    Total Posts: {{$u->posts_count}}
                </h4>

            </hgroup>

            @foreach($u->posts()->get() as $p)
                <p> {{$p->title}} </p>
            @endforeach
        </article>
    </section>
    @endforeach
</body>
</html>
