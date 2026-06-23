<x-app-layout>

<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white shadow-xl rounded-2xl p-8">

        <h1 class="text-3xl font-bold text-purple-700 mb-6">
            Add Review
        </h1>

        <form action="{{ route('reviews.store') }}"
              method="POST">

            @csrf

            <div class="mb-4">

                <label>Homestay</label>

                <select name="homestay_id"
                    class="w-full border rounded-lg p-3">

                    @foreach($homestays as $home)

                        <option value="{{ $home->id }}">
                            {{ $home->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label>Name</label>

                <input type="text"
                    name="reviewer_name"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label>Rating</label>

                <select name="rating"
                    class="w-full border rounded-lg p-3">

                    <option value="5">⭐⭐⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="1">⭐</option>

                </select>

            </div>

            <div class="mb-4">

                <label>Comment</label>

                <textarea name="comment"
                    rows="4"
                    class="w-full border rounded-lg p-3"></textarea>

            </div>

            <button
                class="bg-gradient-to-r from-purple-600 to-pink-500 text-white px-6 py-3 rounded-xl">

                Submit Review

            </button>

        </form>

    </div>

</div>

</x-app-layout>