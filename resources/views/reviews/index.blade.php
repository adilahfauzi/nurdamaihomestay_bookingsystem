<x-app-layout>

<div class="max-w-7xl mx-auto py-10 px-6">

    <div class="flex justify-between mb-8">

        <h1 class="text-4xl font-bold text-purple-700">
            Guest Reviews
        </h1>

        <a href="{{ route('reviews.create') }}"
           class="px-5 py-3 rounded-xl text-white font-semibold bg-gradient-to-r from-purple-600 to-pink-500">

            + Add Review
        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-3 rounded mb-5">
            {{ session('success') }}
        </div>

    @endif

    <div class="grid md:grid-cols-2 gap-6">

        @foreach($reviews as $review)

        <div class="bg-white shadow-lg rounded-2xl p-6">

            <div class="flex justify-between">

                <div>

                    <h2 class="font-bold text-xl">
                        {{ $review->reviewer_name }}
                    </h2>

                    <p class="text-gray-500 text-sm">
                        {{ $review->homestay->name ?? 'Homestay' }}
                    </p>

                </div>

                <div class="text-yellow-500 text-xl">

                    @for($i=1;$i<=5;$i++)

                        @if($i <= $review->rating)
                            ⭐
                        @else
                            ☆
                        @endif

                    @endfor

                </div>

            </div>

            <p class="mt-4 text-gray-700">
                {{ $review->comment }}
            </p>

            <div class="mt-5 flex gap-3">

                <a href="{{ route('reviews.edit',$review->id) }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded-lg">

                    Edit

                </a>

                <form action="{{ route('reviews.destroy',$review->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        class="bg-red-500 text-white px-4 py-2 rounded-lg">

                        Delete

                    </button>

                </form>

            </div>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>