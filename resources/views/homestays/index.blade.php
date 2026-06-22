<x-app-layout>
<div class="max-w-7xl mx-auto px-4 py-6">

    <h1 class="text-3xl font-bold mb-6">Homestay Lists</h1>

    <div class="flex justify-end mb-4">
        <form action="{{ route('homestays.index') }}" method="GET" class="flex items-center gap-2">
            <label for="sort" class="text-sm font-medium text-gray-700">Filter by:</label>
            <select name="sort" id="sort" class="text-sm border border-gray-300 rounded px-3 py-1.5 bg-white focus:outline-none" onchange="this.form.submit()">
                <option value="">Recent</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price : Affordable to Pricey</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: Pricey to Affordable</option>
                <option value="capacity_desc" {{ request('sort') == 'capacity_desc' ? 'selected' : '' }}>Capacity: Large to Small</option>
            </select>
        </form>
    </div>

    @if($homestays->count() == 0)
        <p class="text-gray-500">No homestay available.</p>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        @foreach($homestays as $home)

            <div class="bg-white shadow rounded p-4 flex flex-col justify-between">
                
                <div>
                    <div class="mb-3 w-full h-48 bg-gray-100 rounded overflow-hidden">
                        @if($home->image)
                            <img src="{{ asset($home->image) }}" alt="{{ $home->name }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://via.placeholder.com/400x300?text=No+Image" alt="No Image" class="w-full h-full object-cover">
                        @endif
                    </div>

                    <h2 class="font-bold text-lg mb-1">{{ $home->name }}</h2>
                    <p class="text-gray-600 text-sm mb-1">📍 {{ $home->location }}</p>
                    <p class="text-gray-800 font-semibold text-sm mb-1">💰 RM {{ $home->price_per_night }} / night</p>
                    <p class="text-gray-600 text-sm mb-2">👥 {{ $home->capacity }} pax</p>
                </div>

                <div>
                    <a href="/homestays/{{ $home->id }}" class="text-blue-600 text-sm font-medium inline-block hover:underline mt-2">
                        View Details →
                    </a>
                </div>

            </div>

        @endforeach

    </div>

</div>
</x-app-layout>