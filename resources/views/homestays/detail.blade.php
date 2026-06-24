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

            <div class="mb-8">
                <a href="{{ route('bookings.create', $homestay->id) }}"
                    class="inline-block w-full text-center px-8 py-4 rounded-xl text-white font-bold text-lg"
                    style="background: linear-gradient(135deg, #352A86, #C41E75);">
                    Book Now
                </a>
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

<!-- Customer Reviews -->
<div class="mb-8">

    <div class="flex justify-between items-center mb-5">

        <h3 class="text-xl font-bold text-gray-800">
            Customer Reviews
        </h3>

        <a href="{{ route('reviews.create') }}"
           style="
           background:linear-gradient(135deg,#7e22ce,#db2777);
           color:white;
           padding:12px 24px;
           border-radius:14px;
           font-weight:700;
           text-decoration:none;
           box-shadow:0 8px 20px rgba(126,34,206,.25);
           ">

            Add Review

        </a>

    </div>

    @forelse($homestay->reviews as $review)

        <div class="bg-gray-50 border border-gray-200 rounded-2xl p-4 mb-4">

            <div class="flex justify-between items-start mb-3">

                <div>

                    <h4 class="font-semibold text-gray-900">
                        {{ $review->reviewer_name }}
                    </h4>

                    <p class="text-xs text-gray-400">
                        {{ $review->created_at->format('d M Y') }}
                    </p>

                </div>

                <span class="bg-yellow-50 text-yellow-600 px-3 py-1 rounded-full text-sm font-semibold">
                    ⭐ {{ $review->rating }}/5
                </span>

            </div>

            <p class="text-gray-700 mb-3">
                {{ $review->comment }}
            </p>

            @if($review->photo)

                <div class="mt-3">

                    <img
                        src="{{ asset('review_images/' . $review->photo) }}"
                        alt="Review Photo"
                        onclick="openImageModal(this.src)"
                        style="
                        width:100px;
                        height:70px;
                        object-fit:cover;
                        border-radius:10px;
                        border:1px solid #e9d5ff;
                        cursor:pointer;
                        ">

                </div>

            @endif

        </div>

    @empty

        <div class="bg-gray-50 border border-gray-200 rounded-xl p-5">

            <p class="text-gray-500">
                No reviews available yet.
            </p>

        </div>

    @endforelse

</div>

<!-- IMAGE POPUP -->
<div id="imageModal"
     style="
     display:none;
     position:fixed;
     top:0;
     left:0;
     width:100%;
     height:100%;
     background:rgba(0,0,0,.85);
     z-index:9999;
     justify-content:center;
     align-items:center;
     ">

    <span
        onclick="closeImageModal()"
        style="
        position:absolute;
        top:20px;
        right:35px;
        color:white;
        font-size:45px;
        cursor:pointer;
        font-weight:bold;
        ">

        &times;

    </span>

    <img
        id="modalImage"
        style="
        max-width:85%;
        max-height:85%;
        border-radius:16px;
        box-shadow:0 0 40px rgba(255,255,255,.15);
        ">

</div>

<script>

function openImageModal(imageSrc)
{
    document.getElementById('imageModal').style.display = 'flex';
    document.getElementById('modalImage').src = imageSrc;
}

function closeImageModal()
{
    document.getElementById('imageModal').style.display = 'none';
}

window.onclick = function(event)
{
    let modal = document.getElementById('imageModal');

    if(event.target == modal)
    {
        modal.style.display = 'none';
    }
}

</script>

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