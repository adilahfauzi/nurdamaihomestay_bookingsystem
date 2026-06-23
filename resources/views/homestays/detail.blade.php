```php
<x-app-layout>

<div class="max-w-6xl mx-auto px-4 py-6">

    <div class="bg-white rounded-lg shadow-lg p-6">

        {{-- Image --}}
        @if($homestay->image)
            <img
                src="{{ asset('images/' . $homestay->image) }}"
                alt="{{ $homestay->name }}"
                class="w-full h-96 object-cover rounded-lg mb-6">
        @endif

        {{-- Homestay Info --}}
        <h1 class="text-3xl font-bold mb-3">
            {{ $homestay->name }}
        </h1>

        <p class="text-gray-600 mb-2">
            📍 {{ $homestay->location }}
        </p>

        <p class="font-semibold text-lg mb-2">
            💰 RM {{ number_format($homestay->price_per_night, 2) }} / night
        </p>

        <p class="text-yellow-500 font-semibold mb-4">
            ⭐ {{ $homestay->star_rating }}/5
        </p>

        <div class="border-t pt-4">
            <h2 class="text-xl font-semibold mb-2">
                Description
            </h2>

            <p class="text-gray-700">
                {{ $homestay->description }}
            </p>
        </div>

        {{-- Reviews --}}
        <div class="border-t mt-6 pt-6">

            <h3 class="text-2xl font-bold mb-4">
                Customer Reviews
            </h3>

            @forelse($homestay->reviews as $review)

                <div class="bg-gray-100 rounded-lg p-4 mb-3">

                    <p class="text-yellow-500">
                        ⭐ {{ $review->rating }}/5
                    </p>

                    <p class="font-semibold">
                        {{ $review->reviewer_name }}
                    </p>

                    <p class="text-gray-700">
                        {{ $review->comment }}
                    </p>

                </div>

            @empty

                <p class="text-gray-500">
                    No reviews available.
                </p>

            @endforelse

        </div>

        <div class="mt-6">

            <a href="{{ route('reviews.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Add Review
            </a>

            <a href="{{ route('homestays.index') }}"
               class="ml-3 text-blue-600 hover:underline">
                Back to Homestays
            </a>

        </div>

    </div>

</div>

</x-app-layout>
```
