<x-app-layout>

<div style="
background:linear-gradient(135deg,#faf5ff,#fdf2f8);
min-height:100vh;
">

<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Header --}}
    <div class="mb-10">

        <h1 class="text-5xl font-extrabold bg-gradient-to-r from-purple-700 to-pink-500 bg-clip-text text-transparent">
            Guest Reviews
        </h1>

        <p class="text-gray-500 text-lg mt-2">
            Read authentic experiences shared by our guests.
        </p>

        <div class="flex flex-wrap gap-4 mt-6">

            <a href="{{ route('reviews.create') }}"
               style="
               background:linear-gradient(135deg,#7e22ce,#db2777);
               color:white;
               padding:16px 32px;
               border-radius:18px;
               text-decoration:none;
               font-weight:700;
               font-size:16px;
               box-shadow:0 8px 20px rgba(126,34,206,.25);
               ">

                Write Review

            </a>

            <a href="{{ route('homestays.index') }}"
               style="
               background:#ede9fe;
               color:#6d28d9;
               padding:16px 32px;
               border-radius:18px;
               text-decoration:none;
               font-weight:700;
               font-size:16px;
               border:1px solid #d8b4fe;
               ">

                ← Back to Homestays

            </a>

        </div>

    </div>

    {{-- Success Message --}}
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-2xl mb-8 shadow">
            {{ session('success') }}
        </div>

    @endif

    {{-- Reviews --}}
    <div class="grid lg:grid-cols-2 gap-8">

        @forelse($reviews as $review)

        <div style="
        background:white;
        border-radius:28px;
        border:1px solid #f3e8ff;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
        padding:24px;
        ">

            {{-- Top --}}
            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-2xl font-bold text-purple-700">
                        {{ $review->reviewer_name }}
                    </h2>

                    <p class="text-gray-500 text-sm mt-1">
                        {{ $review->homestay->name ?? 'Homestay' }}
                    </p>

                </div>

                <div style="
                background:#fff7ed;
                padding:10px 14px;
                border-radius:999px;
                ">

                    @for($i = 1; $i <= 5; $i++)

                        @if($i <= $review->rating)
                            ⭐
                        @else
                            ☆
                        @endif

                    @endfor

                </div>

            </div>

            {{-- Comment --}}
            <p class="text-gray-700 mt-5 leading-relaxed text-lg">
                "{{ $review->comment }}"
            </p>

            {{-- Review Photo --}}
            @if($review->photo)

            <div class="mt-5">

                <img
                    src="{{ asset('review_images/' . $review->photo) }}"
                    alt="Review Photo"
                    style="
                    width:160px;
                    height:100px;
                    object-fit:cover;
                    border-radius:14px;
                    border:1px solid #e9d5ff;
                    box-shadow:0 6px 15px rgba(0,0,0,.08);
                    ">

            </div>

            @endif

            {{-- Footer --}}
            <div class="flex justify-between items-center mt-6 pt-4 border-t">

                <span class="text-gray-400 text-sm">
                    {{ $review->created_at->format('d M Y') }}
                </span>

                <span style="
                background:#f3e8ff;
                color:#7e22ce;
                padding:6px 14px;
                border-radius:999px;
                font-size:13px;
                font-weight:600;
                ">

                    ✓ Verified Guest

                </span>

            </div>

        </div>

        @empty

        <div class="col-span-2">

            <div style="
            background:white;
            border-radius:28px;
            padding:60px;
            text-align:center;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
            ">

                <h3 class="text-2xl font-bold text-gray-700">
                    No Reviews Yet
                </h3>

                <p class="text-gray-500 mt-3">
                    Be the first guest to share your experience.
                </p>

            </div>

        </div>

        @endforelse

    </div>

</div>

</div>

</x-app-layout>