<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>All Posts</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    </head>

    <style>
        *{
            font-family: "Verdana";
        }

        #assigned_to
        {
            font-style: italic;
            font-weight: bolder;
            color: chartreuse;
            background: black;
            padding: 2px;
        }
    </style>
<body>
<section>
    <hgroup>
        <h4>All Items</h4>
        <h6>Total Items: {{$allItems->isNotEmpty() ? $allItems->count() :"No Items"}}</h6>
    </hgroup>
    @forelse($allItems as $i)
        <article class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5 border-b border-gray-100">
                <div class="flex justify-between items-start mb-2">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 uppercase tracking-wide">
                Type: {{ $i->device_type }}
            </span>
                    <span class="h-2 w-2 rounded-full bg-green-500"></span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 leading-tight">
                    Model: {{ $i->model }}
                </h3>
                <p class="mt-1 text-sm text-gray-500 line-clamp-2" title="{{ $i->description }}">
                    Description {{ $i->description }}
                </p>
            </div>

            <div class="px-5 py-3 bg-gray-50 grid grid-cols-2 gap-y-2 text-sm">
                <div>
                    <span class="block text-xs text-gray-400 uppercase font-semibold">Location</span>
                    <span class="font-medium text-gray-700">{{ $i->location ?? 'N/A' }}</span>
                </div>
                <div>
                    <span class="block text-xs text-gray-400 uppercase font-semibold">Client</span>
                    <span class="font-medium text-gray-700">{{ $i->client ?? 'N/A' }}</span>
                </div>
            </div>

            <div class="px-5 py-3 border-t border-gray-100 bg-white flex items-center justify-between">
                <span class="text-xs font-medium text-gray-500 uppercase">Assigned To:</span>
                <span class="text-sm font-semibold text-gray-800" id="assigned_to">
            {{ optional($i->user)->full_name ?? 'Unassigned' }}
        </span>
            </div>
        </article>
    @empty
        <p>nan</p>
    @endforelse
</section>

</body>
</html>

