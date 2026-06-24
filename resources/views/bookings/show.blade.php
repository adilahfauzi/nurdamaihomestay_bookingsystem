<x-app-layout>
    <div class="min-h-screen bg-[#f8f5ff] py-10 px-6">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl p-8">

            <h1 class="text-3xl font-bold text-[#352A86] mb-6">Booking Details</h1>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-5">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-5">
                <div class="bg-[#f8f5ff] rounded-2xl p-5">
                    <p class="text-sm text-gray-500">Homestay</p>
                    <p class="font-bold text-[#352A86]">{{ $booking->homestay->name ?? 'Homestay Deleted' }}</p>
                </div>

                <div class="bg-[#f8f5ff] rounded-2xl p-5">
                    <p class="text-sm text-gray-500">Status</p>
                    <p class="font-bold text-[#C41E75]">{{ $booking->status }}</p>
                </div>

                <div class="bg-[#f8f5ff] rounded-2xl p-5">
                    <p class="text-sm text-gray-500">Check-in</p>
                    <p class="font-bold">{{ $booking->check_in }}</p>
                </div>

                <div class="bg-[#f8f5ff] rounded-2xl p-5">
                    <p class="text-sm text-gray-500">Check-out</p>
                    <p class="font-bold">{{ $booking->check_out }}</p>
                </div>

                <div class="bg-[#f8f5ff] rounded-2xl p-5">
                    <p class="text-sm text-gray-500">Guests</p>
                    <p class="font-bold">{{ $booking->guests }}</p>
                </div>

                <div class="bg-[#f8f5ff] rounded-2xl p-5">
                    <p class="text-sm text-gray-500">Total Price</p>
                    <p class="font-bold text-[#C41E75]">RM {{ number_format($booking->total_price, 2) }}</p>
                </div>
            </div>

            <div class="mt-8 bg-green-50 rounded-2xl p-5">
                <h2 class="font-bold text-green-700 mb-2">Payment Instruction</h2>
                <p class="text-gray-600 mb-4">
                    Please contact the admin via WhatsApp to complete payment. Admin will update your booking status after verification.
                </p>

                <a href="https://wa.me/60194762314?text=Hi%20Admin,%20I%20want%20to%20make%20payment%20for%20Booking%20ID%20{{ $booking->id }}"
                   target="_blank"
                   class="inline-block px-6 py-3 rounded-xl bg-green-600 text-white font-bold">
                    Contact Admin via WhatsApp
                </a>
            </div>

            <div class="mt-8 flex gap-3">
                <a href="{{ route('bookings.index') }}"
                   class="px-6 py-3 rounded-xl bg-gray-100 font-bold">
                    Back
                </a>

                @if($booking->status === 'Pending')
                    <form method="POST" action="{{ route('bookings.cancel', $booking->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-red-600 text-white font-bold"
                                onclick="return confirm('Are you sure you want to cancel this booking?')">
                            Cancel Booking
                        </button>
                    </form>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>