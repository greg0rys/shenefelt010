@extends('layouts.app')

@section('title', 'Deleted Users')

@section('content')
    <hgroup>
        <h1>Deleted Users Log</h1>
        <p>A read-only history of deactivated accounts.</p>
    </hgroup>

    <nav>
        <ul>
            <li></li>
        </ul>
        <ul>
            <li><a href="{{ route('users.index') }}" role="button" class="secondary">Back to Active Users</a></li>
        </ul>
    </nav>

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
@endsection
