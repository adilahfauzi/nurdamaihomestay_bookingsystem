@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">

```
<h2 class="text-2xl font-bold text-green-700 mb-6">
    Edit Review
</h2>

<form action="{{ route('reviews.update', $review->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label class="font-semibold">
            Homestay
        </label>

        <select name="homestay_id"
                class="w-full border rounded p-2">

            @foreach($homestays as $homestay)

                <option value="{{ $homestay->id }}"
                    {{ $review->homestay_id == $homestay->id ? 'selected' : '' }}>

                    {{ $homestay->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label class="font-semibold">
            Reviewer Name
        </label>

        <input type="text"
               name="reviewer_name"
               value="{{ $review->reviewer_name }}"
               class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label class="font-semibold">
            Rating
        </label>

        <select name="rating"
                class="w-full border rounded p-2">

            <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>
                ⭐ 1 Star
            </option>

            <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>
                ⭐⭐ 2 Stars
            </option>

            <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>
                ⭐⭐⭐ 3 Stars
            </option>

            <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>
                ⭐⭐⭐⭐ 4 Stars
            </option>

            <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>
                ⭐⭐⭐⭐⭐ 5 Stars
            </option>

        </select>

    </div>

    <div class="mb-4">

        <label class="font-semibold">
            Comment
        </label>

        <textarea name="comment"
                  rows="5"
                  class="w-full border rounded p-2">{{ $review->comment }}</textarea>

    </div>

    <div class="flex gap-3">

        <button type="submit"
                class="bg-green-600 text-white px-5 py-2 rounded">

            Update Review

        </button>

        <a href="{{ route('reviews.index') }}"
           class="bg-gray-500 text-white px-5 py-2 rounded">

            Back

        </a>

    </div>

</form>
```

</div>

@endsection
