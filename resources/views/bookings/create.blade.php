<x-app-layout>
    <div class="min-h-screen bg-[#f8f5ff] py-10 px-6">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl p-8">
            <h1 class="text-3xl font-bold text-[#352A86] mb-6">Make Booking</h1>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-5">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-[#f8f5ff] rounded-2xl p-5 mb-6">
                <h2 class="text-xl font-bold text-[#352A86]">{{ $homestay->name }}</h2>
                <p class="text-gray-600">{{ $homestay->location }}</p>
                <p class="font-semibold text-[#C41E75] mt-2">
                    RM {{ number_format($homestay->price_per_night, 2) }} / night
                </p>
            </div>

            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf

                <input type="hidden" name="homestay_id" value="{{ $homestay->id }}">

                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label class="block font-semibold mb-2">Check-in Date</label>
                        <input type="date" name="check_in" value="{{ old('check_in') }}"
                               class="w-full rounded-xl border-gray-300" required>
                        @error('check_in') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-semibold mb-2">Check-out Date</label>
                        <input type="date" name="check_out" value="{{ old('check_out') }}"
                               class="w-full rounded-xl border-gray-300" required>
                        @error('check_out') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mt-5">
                    <label class="block font-semibold mb-2">Number of Guests</label>
                    <input type="number" name="guests" min="1" max="{{ $homestay->capacity }}"
                           value="{{ old('guests', 1) }}"
                           class="w-full rounded-xl border-gray-300" required>
                    @error('guests') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mt-8 flex gap-3">
                    <button type="submit"
                            class="px-8 py-3 rounded-xl text-white font-bold"
                            style="background: linear-gradient(135deg, #352A86, #C41E75);">
                        Confirm Booking
                    </button>

                    <a href="/homestays"
                       class="px-8 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>