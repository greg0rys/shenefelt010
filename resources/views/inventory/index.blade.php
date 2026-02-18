@extends('layouts.app')

@section('title', 'All Items')

@section('content')
    <nav>
        <ul>
            <li>
                <hgroup>
                    <h1>All Items</h1>
                    <p>Total Items: {{ $allItems->count() }}</p>
                </hgroup>
            </li>
        </ul>
        <ul>
            <li>
                <a href="{{ route('items.create') }}" role="button">Create New Item</a>
            </li>
        </ul>
    </nav>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: var(--pico-block-spacing-vertical);">

        @forelse($allItems as $i)
            <article>
                <header>
                    <nav>
                        <ul>
                            <li><strong>{{ $i->model }}</strong></li>
                        </ul>
                        <ul>
                            <li>
                                <span data-tooltip="Device Type" data-placement="left">
                                    {{ $i->device_type }}
                                </span>
                            </li>
                        </ul>
                    </nav>
                </header>

                <p>{{ $i->description }}</p>

                <div class="grid">
                    <div>
                        <small class="secondary">Location</small><br>
                        <span>{{ $i->location ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <small class="secondary">Client</small><br>
                        <span>{{ $i->client ?? 'N/A' }}</span>
                    </div>
                </div>

                <footer>
                    <div class="grid" style="margin-bottom: 1.5rem;">
                        <div>
                            <small class="secondary">Assigned To:</small>
                        </div>
                        <div style="text-align: right;">
                            @if(optional($i->user)->full_name)
                                <strong>{{ $i->user->full_name }}</strong>
                            @else
                                <em>Unassigned</em>
                            @endif
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem;">
                        <a href="{{ route('items.edit', $i->id) }}"
                           role="button"
                           class="outline secondary"
                           style="flex: 1; text-decoration: none; display: flex; justify-content: center; align-items: center;">
                            Edit
                        </a>

                        <form action="{{ route('items.destroy', $i->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this item?');"
                              style="flex: 1; margin-bottom: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="outline contrast"
                                    style="width: 100%; margin-bottom: 0;">
                                Delete
                            </button>
                        </form>
                    </div>
                </footer>
            </article>
        @empty
            <article>
                <header>No Data</header>
                No items found in the database.
            </article>
        @endforelse

    </div>
@endsection
