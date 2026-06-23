<x-app-layout>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    /* Ubah warna titik petunjuk slider mengikut tema ungu anda */
    .swiper-pagination-bullet-active {
        background: rgb(27, 7, 47) !important;
    }
</style>

<div class="max-w-4xl mx-auto px-4 py-8">
    
    <!-- Butang Kembali -->
    <div class="mb-6">
        <a href="/homestays" class="text-sm font-medium text-gray-600 hover:text-purple-900 transition flex items-center gap-1">
            ← Back to Homestay List
        </a>
    </div>

    <!-- Kad Utama Detail -->
    <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-100">
        
        <!-- 🎚️ RUANGAN SLIDER GAMBAR MULTIPLE IMAGES -->
        <div class="swiper mySwiper w-full h-96 bg-gray-100 relative">
            <div class="swiper-wrapper w-full h-full">
                
                <!-- Gambar Utama (Slaid Pertama) -->
                @if($homestay->image)
                    <div class="swiper-slide w-full h-full">
                        <img src="{{ asset($homestay->image) }}" alt="{{ $homestay->name }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="swiper-slide w-full h-full flex items-center justify-center text-gray-400 bg-gray-200">
                        <span class="text-lg">No Image Available</span>
                    </div>
                @endif

                <!-- Gambar Tambahan dari Table homestay_images (Slaid Seterusnya) -->
                @if($homestay->images && $homestay->images->count() > 0)
                    @foreach($homestay->images as $img)
                        <div class="swiper-slide w-full h-full relative bg-gray-950 flex items-center justify-center overflow-hidden">
    <img src="{{ asset($img->image_path) }}" class="absolute inset-0 w-full h-full object-cover opacity-30 blur-md scale-110 z-0">
    
    <img src="{{ asset($img->image_path) }}" alt="Gallery Image" class="relative z-10 max-w-full max-h-full object-contain shadow-2xl">
</div>
                    @endforeach
                @endif

            </div>

            <!-- Butang Navigasi (Kiri & Kanan) -->
            <div class="swiper-button-next !text-white bg-black/30 p-6 rounded-full !w-4 !h-4 after:!text-sm"></div>
            <div class="swiper-button-prev !text-white bg-black/30 p-6 rounded-full !w-4 !h-4 after:!text-sm"></div>

            <!-- Titik Petunjuk (Pagination Dots) -->
            <div class="swiper-pagination"></div>
        </div>

        <!-- Ruangan Kandungan / Maklumat -->
        <div class="p-6 md:p-8">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2 tracking-tight">{{ $homestay->name }}</h1>
            <p class="text-gray-600 flex items-center gap-1 mb-6">📍 {{ $homestay->location }}</p>

            <!-- Grid Ringkasan (Harga & Kapasiti) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border-t border-b border-gray-100 py-4 mb-6">
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider block">Price per night</span>
                    <span class="text-2xl font-bold text-green-600">RM {{ $homestay->price_per_night }}</span>
                </div>
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider block">Capacity</span>
                    <span class="text-xl font-semibold text-gray-800">👥 {{ $homestay->capacity }} pax</span>
                </div>
            </div>

            <!-- Penerangan (Description) -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Description</h3>
                <p class="text-gray-600 leading-relaxed">{{ $homestay->description }}</p>
            </div>

            <!-- Kemudahan (Facilities) -->
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Facilities</h3>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 text-sm border border-gray-100">
                    {{ $homestay->facilities }}
                </div>
            </div>

            <!-- Peta Google Maps -->
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Location Map</h3>
                <div class="w-full h-80 rounded-xl overflow-hidden shadow-sm border border-gray-200">
                    <iframe 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        style="border:0" 
                        src="https://maps.google.com/maps?q={{ urlencode($homestay->location) }}&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                        allowfullscreen>
                    </iframe>
                </div>
                <span class="text-xs text-gray-400 mt-1 block">📍 Pin location is based on text: "{{ $homestay->location }}"</span>
            </div>

            <!-- Butang Tindakan (Book Now) -->
            <div class="flex justify-end">
                <a href="/bookings/create/{{ $homestay->id }}" 
                   class="w-full sm:w-auto text-center bg-purple-950 hover:bg-purple-900 text-white font-medium px-8 py-3 rounded-lg shadow transition duration-200">
                    Book Now
                </a>
            </div>

        </div>
    </div>
</div>

<!-- Swiper JS Script -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
</script>
</x-app-layout>