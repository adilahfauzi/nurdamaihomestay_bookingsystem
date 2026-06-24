<x-app-layout>
<div class="min-h-screen bg-[#f8f5ff] py-12 px-6">

    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-xl p-10 text-center">

        <div class="text-6xl mb-4">✅</div>

        <h1 class="text-4xl font-bold text-[#352A86] mb-4">
            Booking Submitted Successfully
        </h1>

        <p class="text-gray-600 mb-8">
            Your booking has been recorded and is currently awaiting payment verification.
        </p>

        <div class="bg-[#f8f5ff] rounded-2xl p-6 max-w-xl mx-auto mb-8 text-left space-y-2">
            <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
            <p><strong>Homestay:</strong> {{ $booking->homestay->name }}</p>
            <p><strong>Check-in:</strong> {{ $booking->check_in }}</p>
            <p><strong>Check-out:</strong> {{ $booking->check_out }}</p>
            <p><strong>Guests:</strong> {{ $booking->guests }}</p>
            <p><strong>Total Price:</strong> RM {{ number_format($booking->total_price, 2) }}</p>
            <p><strong>Status:</strong> <span class="text-orange-600 font-bold">{{ $booking->status }}</span></p>
        </div>

        <div class="flex flex-col md:flex-row gap-4 justify-center">

            <a href="https://wa.me/60194762314?text={{ urlencode('Hi Admin, I have made a booking. Booking ID: ' . $booking->id . ', Homestay: ' . $booking->homestay->name . ', Total Price: RM ' . number_format($booking->total_price, 2)) }}"
                target="_blank"
                style="
                    background:#16a34a;
                    color:white !important;
                    display:inline-block;
                    padding:14px 28px;
                    border-radius:12px;
                    font-weight:bold;
                    text-decoration:none;
                ">
                📱 Contact Admin via WhatsApp
            </a>

            <a href="{{ route('bookings.index') }}"
                style="
                    background:#0969de;
                    color:white !important;
                    display:inline-block;
                    padding:14px 28px;
                    border-radius:12px;
                    font-weight:bold;
                    text-decoration:none;
                ">
                View My Bookings
            </a>

        </div>

    </div>

</div>
</x-app-layout>