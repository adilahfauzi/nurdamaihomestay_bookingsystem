<x-app-layout>
    <div class="min-h-screen bg-[#f8f5ff] py-10 px-6">
        <div class="max-w-7xl mx-auto">

            <div class="rounded-[35px] p-10 text-white shadow-xl mb-8"
                 style="background: linear-gradient(135deg, #352A86, #C41E75);">
                <h1 class="text-4xl font-bold mb-3">
                    Welcome, {{ Auth::user()->name }}
                </h1>
                <p class="text-white/90 mb-6">
                    Manage your profile, view booking updates and start your homestay reservation.
                </p>
                <a href="/homestays"
                   class="inline-block bg-white text-[#352A86] px-7 py-3 rounded-xl font-bold">
                    Explore Homestays
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-3xl shadow p-6">
                    <p class="text-gray-500">Pending Bookings</p>
                    <h2 class="text-4xl font-bold text-yellow-500 mt-2">0</h2>
                </div>

                <div class="bg-white rounded-3xl shadow p-6">
                    <p class="text-gray-500">Approved Bookings</p>
                    <h2 class="text-4xl font-bold text-green-500 mt-2">0</h2>
                </div>

                <div class="bg-white rounded-3xl shadow p-6">
                    <p class="text-gray-500">Completed Stays</p>
                    <h2 class="text-4xl font-bold text-[#C41E75] mt-2">0</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-8">

                    <div class="bg-white rounded-3xl shadow-xl p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="text-2xl font-bold text-[#352A86]">
                                    Recent Booking History
                                </h2>
                                <p class="text-gray-500 text-sm">
                                    Your latest booking activity will appear here.
                                </p>
                            </div>

                            <a href="/bookings"
                               class="px-5 py-2 rounded-xl text-white font-semibold"
                               style="background: linear-gradient(135deg, #352A86, #C41E75);">
                                View All
                            </a>
                        </div>

                        <div class="border border-dashed border-[#C41E75]/40 rounded-2xl p-8 text-center bg-[#f8f5ff]">
                            <div class="text-5xl mb-4">📅</div>
                            <h3 class="text-xl font-bold text-[#352A86] mb-2">
                                No booking yet
                            </h3>
                            <p class="text-gray-500 mb-5">
                                Once you make a booking, your booking history and status will be shown here.
                            </p>
                            <a href="/homestays"
                               class="inline-block px-6 py-3 rounded-xl text-white font-semibold"
                               style="background: linear-gradient(135deg, #352A86, #C41E75);">
                                Browse Homestays
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-xl p-8">
                        <h2 class="text-2xl font-bold text-[#352A86] mb-6">
                            How Booking Works
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                            <div class="bg-[#f8f5ff] rounded-2xl p-5 text-center">
                                <div class="text-4xl mb-3">🏠</div>
                                <h3 class="font-bold text-[#352A86]">Browse</h3>
                                <p class="text-sm text-gray-500 mt-2">Choose your preferred homestay.</p>
                            </div>

                            <div class="bg-[#f8f5ff] rounded-2xl p-5 text-center">
                                <div class="text-4xl mb-3">📅</div>
                                <h3 class="font-bold text-[#352A86]">Select Date</h3>
                                <p class="text-sm text-gray-500 mt-2">Pick check-in and check-out dates.</p>
                            </div>

                            <div class="bg-[#f8f5ff] rounded-2xl p-5 text-center">
                                <div class="text-4xl mb-3">💬</div>
                                <h3 class="font-bold text-[#352A86]">WhatsApp</h3>
                                <p class="text-sm text-gray-500 mt-2">Contact owner for payment.</p>
                            </div>

                            <div class="bg-[#f8f5ff] rounded-2xl p-5 text-center">
                                <div class="text-4xl mb-3">✅</div>
                                <h3 class="font-bold text-[#352A86]">Approved</h3>
                                <p class="text-sm text-gray-500 mt-2">Admin confirms your booking.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-xl p-8 h-fit">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center text-white text-2xl font-bold"
                             style="background: linear-gradient(135deg, #352A86, #C41E75);">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <h2 class="text-2xl font-bold text-[#352A86]">
                                My Profile
                            </h2>
                            <p class="text-gray-500 text-sm">Customer Account</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-[#f8f5ff] rounded-2xl p-4">
                            <p class="text-sm text-gray-500">Name</p>
                            <p class="font-bold text-[#352A86]">{{ Auth::user()->name }}</p>
                        </div>

                        <div class="bg-[#f8f5ff] rounded-2xl p-4">
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-bold text-[#352A86]">{{ Auth::user()->email }}</p>
                        </div>

                        <div class="bg-[#f8f5ff] rounded-2xl p-4">
                            <p class="text-sm text-gray-500">Phone Number</p>
                            <p class="font-bold text-[#352A86]">
                                {{ Auth::user()->phone ?? 'Not set' }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 space-y-3">
                        <a href="{{ route('profile.edit') }}"
                           class="block text-center py-3 rounded-2xl text-white font-semibold"
                           style="background: linear-gradient(135deg, #352A86, #C41E75);">
                            Edit Profile
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="block text-center py-3 rounded-2xl bg-[#f8f5ff] text-[#352A86] font-semibold">
                            Change Password
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>