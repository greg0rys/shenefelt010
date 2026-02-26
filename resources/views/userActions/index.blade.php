@extends('layouts.app')

@section('content') {{-- or whatever section name your layouts.app yields --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            IP Address
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($all as $ua)
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $ua->action_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $ua->ip_address }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $ua->user->full_name }}
                            </td>
                        </tr>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{-- Optional: If $all is empty, show a fallback message --}}
                @if($all->isEmpty())
                    <div class="text-center py-4 text-gray-500 text-sm">
                        No actions found.
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
