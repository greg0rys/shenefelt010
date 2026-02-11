<html lang="en">
    <head>
        <title>Viewing {{$item->asset_number}}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    </head>

<body>
    <section>
        <article>
            <div>
                <p>Type: {{$item->device_type}}</p>
                <p>Model: {{$item->model}}</p>
                <p>User: {{$item->user->full_name}}</p>
                <p>MAC: {{$item->mac_address}}</p>
                <p>Notes <br/>{{$item->notes}}</p>
            </div>
        </article>
    </section>
</body>
</html>
