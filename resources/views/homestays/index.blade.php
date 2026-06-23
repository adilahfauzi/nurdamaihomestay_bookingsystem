```php
<x-app-layout>
<div class="max-w-7xl mx-auto px-4 py-6">

    <h1 class="text-3xl font-bold mb-6">Homestay Lists</h1>

    <div class="flex justify-end mb-4">
        <form action="{{ route('homestays.index') }}" method="GET" class="flex items-center gap-2">

            <label for="sort" class="text-sm font-medium text-gray-700">
                Filter by:
            </label>

            <select
                name="sort"
                id="sort"
                class="text-sm border border-gray-300 rounded px-3 py-1.5 bg-white"
                onchange="this.form.submit()">

                <option value="">Recent</option>

                <option value="price_asc"
                    {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                    Price: Affordable to Pricey
                </option>

                <option value="price_desc"
                    {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                    Price: Pricey to Affordable
                </option>

                <option value="capacity_desc"
                    {{ request('sort') == 'capacity_desc' ? 'selected' : '' }}>
                    Capacity: Large to Small
                </option>

                <option value="rating_desc"
                    {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>
                    Highest Rating
                </option>

            </select>

        </form>
    </div>

    @if($homestays->count() == 0)
        <p class="text-gray-500">No homestay available.</p>
    @endif

    <div class="grid grid-cols-1 gap-6">

        @foreach($homestays as $home)

        <div class="bg-white shadow rounded-lg p-4">

            <div class="flex flex-col md:flex-row gap-4">

                <div class="w-full md:w-80">

                    @if($home->image)
                        <img
                            src="{{ asset('images/' . $home->image) }}"
                            alt="{{ $home->name }}"
                            class="w-full h-56 object-cover rounded">
                    @else
                        <img
                            src="https://via.placeholder.com/400x300?text=No+Image"
                            class="w-full h-56 object-cover rounded">
                    @endif

                </div>

                <div class="flex-1">

                    <h2 class="text-2xl font-bold mb-2">
                        {{ $home->name }}
                    </h2>

                    <p class="text-gray-600 mb-1">
                        📍 {{ $home->location }}
                    </p>

                    <p class="font-semibold mb-1">
                        💰 RM {{ number_format($home->price_per_night, 2) }} / night
                    </p>

                    <p class="mb-1">
                        👥 {{ $home->capacity ?? '-' }} pax
                    </p>

                    <p class="text-yellow-500 font-medium mb-3">
                        ⭐ {{ $home->star_rating }}/5
                    </p>

                    <div class="border-t pt-3">

                        <h3 class="font-semibold mb-2">
                            Recent Reviews
                        </h3>

                        @forelse($home->reviews->take(2) as $review)

                            <div class="bg-gray-50 rounded p-3 mb-2">

                                <p class="text-yellow-500 text-sm">
                                    ⭐ {{ $review->rating }}/5
                                </p>

                                <p class="font-medium text-sm">
                                    {{ $review->reviewer_name }}
                                </p>

                                <p class="text-gray-600 text-sm">
                                    {{ $review->comment }}
                                </p>

                            </div>

                        @empty

                            <p class="text-gray-400 text-sm">
                                No reviews yet.
                            </p>

                        @endforelse

                    </div>

                    <div class="mt-4 flex gap-4">

                        <a
                            href="{{ route('homestays.show', $home->id) }}"
                            class="text-blue-600 font-medium hover:underline">
                            View Details →
                        </a>

                        <a
                            href="{{ route('reviews.create') }}"
                            class="text-green-600 font-medium hover:underline">
                            Write Review
                        </a>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>
</x-app-layout>
```
