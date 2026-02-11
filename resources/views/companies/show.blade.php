<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }} - Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<main class="container">

    <nav>
        <ul>
            <li><a href="{{ route('companies.index') }}" class="secondary">← Back to Companies</a></li>
        </ul>
    </nav>

    <article>
        <header>
            <div class="grid">
                <div>
                    <hgroup>
                        <h1>{{ $company->name }}</h1>
                        <h2>Code: <mark>{{ $company->company_code }}</mark></h2>
                    </hgroup>
                </div>
                <div style="text-align: right;">
                    <a href="{{ route('companies.edit', $company->id) }}" role="button" class="outline">Edit</a>
                </div>
            </div>
        </header>

        <div class="grid">
            <div>
                <h5>📍 Location</h5>
                <p>
                    {{ $company->address }}<br>
                    {{ $company->city }}, {{ $company->state }}
                </p>
            </div>

            <div>
                <h5>📞 Contact</h5>
                <p>
                    @if($company->phone_number)
                        <a href="tel:{{ $company->phone_number }}">{{ $company->phone_number }}</a>
                    @else
                        <em style="color: grey;">No phone number provided</em>
                    @endif
                </p>
            </div>
        </div>

        <footer>
            <small style="color: grey;">
                <strong>Created:</strong> {{ $company->created_at->format('M d, Y') }} &bull;
                <strong>Last Updated:</strong> {{ $company->updated_at->format('M d, Y') }}
                <strong>Total Employees: {{$company->employees()->count()}}</strong>
            </small>

            <form action="{{ route('companies.destroy', $company->id) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure? This cannot be undone.');"
                  style="float: right; margin: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="outline contrast" style="border: none; padding: 0; color: #d93526;">
                    Delete Company
                </button>
            </form>
        </footer>
    </article>

</main>
</body>
</html>
