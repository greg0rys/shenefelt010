<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <title>Viewing {{$user->full_name}}</title>
</head>
<body>
    <section>
        <article>
            <table>
                <thead>
                <th>User</th>
                <th>System Role</th>
                <th>Ban Reason</th>
                <th>Works At</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$user->full_name}}</td>
                        <td>{{$user->system_role}}</td>
                        <td>{{ucwords($user->ban->reason)}}</td>
                        <td>{{$user->company->name ?? 'None Assigned'}}</td>
                    </tr>
                </tbody>
            </table>
        </article>
    </section>
</body>
</html>
