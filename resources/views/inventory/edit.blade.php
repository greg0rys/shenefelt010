@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
    <div class="container" style="max-width: 600px;">
        <hgroup>
            <h1>Edit Item</h1>
            <p>Updating: {{ $item->model }}</p>
        </hgroup>

        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT') <label for="model">Model
                <input type="text" id="model" name="model" value="{{ old('model', $item->model) }}" required>
            </label>

            <label for="device_type">Device Type
                <select id="device_type" name="device_type" required>
                    <option value="Phone" {{ $item->device_type == 'Phone' ? 'selected' : '' }}>Phone</option>
                    <option value="Laptop" {{ $item->device_type == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="Tablet" {{ $item->device_type == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                </select>
            </label>

            <label for="description">Description
                <textarea id="description" name="description">{{ old('description', $item->description) }}</textarea>
            </label>

            <div class="grid">
                <label for="location">Location
                    <input type="text" id="location" name="location" value="{{ old('location', $item->location) }}">
                </label>

                <label for="client">Client
                    <input type="text" id="client" name="client" value="{{ old('client', $item->client) }}">
                </label>
            </div>

            <button type="submit">Update Item</button>
        </form>
    </div>
@endsection
