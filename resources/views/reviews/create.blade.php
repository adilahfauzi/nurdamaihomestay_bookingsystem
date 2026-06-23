@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold text-green-700 mb-6">
        Add Review
    </h2>

    <form action="{{ route('reviews.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="font-semibold">
                Homestay
            </label>

            <select name="homestay_id"
                    class="w-full border rounded p-2">

                @foreach($homestays as $homestay)

                    <option value="{{ $homestay->id }}">
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
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="font-semibold">
                Rating
            </label>

            <select name="rating"
                    class="w-full border rounded p-2">

                <option value="1">⭐ 1 Star</option>
                <option value="2">⭐⭐ 2 Stars</option>
                <option value="3">⭐⭐⭐ 3 Stars</option>
                <option value="4">⭐⭐⭐⭐ 4 Stars</option>
                <option value="5">⭐⭐⭐⭐⭐ 5 Stars</option>

            </select>
        </div>

        <div class="mb-4">
            <label class="font-semibold">
                Comment
            </label>

            <textarea name="comment"
                      rows="5"
                      class="w-full border rounded p-2"></textarea>
        </div>

        <button type="submit"
                class="bg-green-600 text-white px-5 py-2 rounded">

            Submit Review

        </button>

    </form>

</div>

@endsection