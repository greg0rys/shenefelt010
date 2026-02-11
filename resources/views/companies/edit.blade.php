<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<main class="container">
    <h1>Edit Company: {{ $company->name }}</h1>

    @if ($errors->any())
        <article style="background-color: #ffe6e6; border-color: #ffcccc; color: #cc0000;">
            <header><strong>Please fix the following errors:</strong></header>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </article>
    @endif

    <form action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid">
            <label for="name">
                Company Name
                <input type="text" id="name" name="name"
                       value="{{ old('name', $company->name) }}" required>
            </label>

            <label for="company_code">
                Company Code
                <input type="text" id="company_code" name="company_code"
                       value="{{ old('company_code', $company->company_code) }}" required>
            </label>
        </div>

        <label for="address">
            Address
            <input type="text" id="address" name="address"
                   value="{{ old('address', $company->address) }}">
        </label>

        <div class="grid">
            <label for="city">
                City
                <input type="text" id="city" name="city"
                       value="{{ old('city', $company->city) }}">
            </label>

            <label for="state">
                State
                <input type="text" id="state" name="state"
                       value="{{ old('state', $company->state) }}">
            </label>

            <label for="phone_number">
                Phone Number
                <input type="text" id="phone_number" name="phone_number"
                       value="{{ old('phone_number', $company->phone_number) }}">
            </label>
        </div>

        <button type="submit">Update Company</button>
    </form>
</main>
</body>
</html>
