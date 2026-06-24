<x-app-layout>
    <div class="min-h-screen bg-[#f8f5ff] py-10 px-6">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold text-[#352A86] mb-6">My Bookings</h1>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-5">
                    {{ session('success') }}
                </div>
            @endif

            @if($bookings->isEmpty())
                <div class="bg-white rounded-3xl shadow p-10 text-center">
                    <div class="text-5xl mb-4">📅</div>
                    <h2 class="text-2xl font-bold text-[#352A86]">No booking yet</h2>
                    <p class="text-gray-500 mt-2 mb-6">Your booking history will appear here.</p>
                    <a href="/homestays"
                       class="px-7 py-3 rounded-xl text-white font-bold"
                       style="background: linear-gradient(135deg, #352A86, #C41E75);">
                        Browse Homestays
                    </a>
                </div>
            @else
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-[#352A86] text-white">
                            <tr>
                                <th class="p-4">Homestay</th>
                                <th class="p-4">Check-in</th>
                                <th class="p-4">Check-out</th>
                                <th class="p-4">Total</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($bookings as $booking)
                                <tr class="border-b">
                                    <td class="p-4 font-semibold">
                                        {{ $booking->homestay->name ?? 'Homestay Deleted' }}
                                    </td>
                                    <td class="p-4">{{ $booking->check_in }}</td>
                                    <td class="p-4">{{ $booking->check_out }}</td>
                                    <td class="p-4">RM {{ number_format($booking->total_price, 2) }}</td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-[#f8f5ff] text-[#C41E75]">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <a href="{{ route('bookings.show', $booking->id) }}"
                                           class="text-[#352A86] font-bold">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>