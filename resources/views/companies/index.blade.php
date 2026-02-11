<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<main class="container">

    <nav>
        <ul>
            <li><strong>All Companies</strong></li>
        </ul>
        <ul>
            <li>
                <a href="{{ route('companies.create') }}" role="button">+ Create New</a>
            </li>
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
                <th scope="col">Name</th>
                <th scope="col">Code</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Phone</th>
                <th scope="col" style="text-align: right;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($companies as $company)
                <tr>
                    <td>
                        <a href="{{ route('companies.show', $company->id) }}" style="text-decoration: none; font-weight: bold;">
                            {{ $company->name }}
                        </a>
                    </td>

                    <td>{{ $company->company_code }}</td>

                    <td>{{ $company->address }}</td>

                    <td>{{ $company->city }}</td>

                    <td>{{ $company->state }}</td>

                    <td>{{ $company->phone_number }}</td>

                    <td style="text-align: right;">
                        <div role="group" style="justify-content: flex-end;">
                            <a href="{{ route('companies.edit', $company->id) }}"
                               role="button"
                               class="secondary outline"
                               style="padding: 0.2rem 0.5rem; font-size: 0.8rem;">
                                Edit
                            </a>

                            <form action="{{ route('companies.destroy', $company->id) }}"
                                  method="POST"
                                  style="display: inline; margin-left: 0.5rem;"
                                  onsubmit="return confirm('Delete {{ $company->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="contrast outline"
                                        style="padding: 0.2rem 0.5rem; font-size: 0.8rem; border: none; color: #d93526;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 2rem;">
                        No companies found.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </figure>

</main>
</body>
</html>
