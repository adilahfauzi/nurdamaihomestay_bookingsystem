```php
<x-app-layout>

<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white shadow-xl rounded-2xl p-8">

        <h1 class="text-3xl font-bold text-purple-700 mb-6">
            Edit Review
        </h1>

        <form action="{{ route('reviews.update', $review->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Homestay
                </label>

                <select name="homestay_id"
                        class="w-full border rounded-lg p-3">

                    @foreach($homestays as $home)

                        <option value="{{ $home->id }}"
                            {{ $review->homestay_id == $home->id ? 'selected' : '' }}>

                            {{ $home->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Reviewer Name
                </label>

                <input type="text"
                       name="reviewer_name"
                       value="{{ $review->reviewer_name }}"
                       class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Rating
                </label>

                <select name="rating"
                        class="w-full border rounded-lg p-3">

                    <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>
                        ⭐⭐⭐⭐⭐
                    </option>

                    <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>
                        ⭐⭐⭐⭐
                    </option>

                    <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>
                        ⭐⭐⭐
                    </option>

                    <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>
                        ⭐⭐
                    </option>

                    <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>
                        ⭐
                    </option>

                </select>

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Comment
                </label>

                <textarea name="comment"
                          rows="5"
                          class="w-full border rounded-lg p-3">{{ $review->comment }}</textarea>

            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-gradient-to-r from-purple-600 to-pink-500 text-white px-6 py-3 rounded-xl">

                    Update Review

                </button>

                <a href="{{ route('reviews.index') }}"
                   class="bg-gray-500 text-white px-6 py-3 rounded-xl">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>
```

