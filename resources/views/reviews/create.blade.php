<x-app-layout>

<div style="
background:linear-gradient(135deg,#faf5ff,#fdf2f8);
min-height:100vh;
padding:50px 20px;
">

    <div style="
    max-width:1000px;
    margin:auto;
    ">

        <div style="
        background:white;
        border-radius:30px;
        overflow:hidden;
        box-shadow:0 20px 60px rgba(0,0,0,.12);
        border:1px solid #f3e8ff;
        ">

            <!-- Header -->
            <div style="
            background:linear-gradient(135deg,#6d28d9,#db2777);
            padding:40px;
            ">

                <h1 style="
                color:white;
                font-size:42px;
                font-weight:900;
                margin:0;
                letter-spacing:-1px;
                ">
                    Write a Review
                </h1>

                <p style="
                color:#fce7f3;
                margin-top:12px;
                font-size:17px;
                ">
                    Share your experience and help future guests choose the perfect stay.
                </p>

            </div>

            <!-- Form -->
            <div style="padding:40px;">

                <form action="{{ route('reviews.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <!-- Homestay -->
                    <div style="margin-bottom:25px;">

                        <label style="
                        display:block;
                        font-weight:700;
                        margin-bottom:10px;
                        color:#374151;
                        font-size:15px;
                        ">
                            Select Homestay
                        </label>

                        <select
                            name="homestay_id"
                            style="
                            width:100%;
                            padding:15px;
                            border:2px solid #e9d5ff;
                            border-radius:16px;
                            font-size:16px;
                            background:white;
                            ">

                            @foreach($homestays as $home)

                                <option value="{{ $home->id }}">
                                    {{ $home->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Reviewer Name -->
                    <div style="margin-bottom:25px;">

                        <label style="
                        display:block;
                        font-weight:700;
                        margin-bottom:10px;
                        color:#374151;
                        font-size:15px;
                        ">
                            Reviewer Name
                        </label>

                        <input
                            type="text"
                            name="reviewer_name"
                            placeholder="Enter your full name"
                            style="
                            width:100%;
                            padding:15px;
                            border:2px solid #e9d5ff;
                            border-radius:16px;
                            font-size:16px;
                            ">

                    </div>

                    <!-- Rating -->
                    <div style="margin-bottom:25px;">

                        <label style="
                        display:block;
                        font-weight:700;
                        margin-bottom:10px;
                        color:#374151;
                        font-size:15px;
                        ">
                            Rating
                        </label>

                        <select
                            name="rating"
                            style="
                            width:100%;
                            padding:15px;
                            border:2px solid #e9d5ff;
                            border-radius:16px;
                            font-size:16px;
                            background:white;
                            ">

                            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                            <option value="4">⭐⭐⭐⭐ Very Good</option>
                            <option value="3">⭐⭐⭐ Good</option>
                            <option value="2">⭐⭐ Fair</option>
                            <option value="1">⭐ Poor</option>

                        </select>

                    </div>

                    <!-- Comment -->
                    <div style="margin-bottom:25px;">

                        <label style="
                        display:block;
                        font-weight:700;
                        margin-bottom:10px;
                        color:#374151;
                        font-size:15px;
                        ">
                            Review Comment
                        </label>

                        <textarea
                            name="comment"
                            rows="6"
                            placeholder="Tell others about your stay experience..."
                            style="
                            width:100%;
                            padding:15px;
                            border:2px solid #e9d5ff;
                            border-radius:16px;
                            font-size:16px;
                            resize:none;
                            "></textarea>

                    </div>

                    <!-- Upload Photo -->
                    <div style="margin-bottom:35px;">

                        <label style="
                        display:block;
                        font-weight:700;
                        margin-bottom:10px;
                        color:#374151;
                        font-size:15px;
                        ">
                            Upload Review Photo
                        </label>

                        <div style="
                        border:2px dashed #c084fc;
                        background:#faf5ff;
                        border-radius:20px;
                        padding:25px;
                        ">

                            <input type="file" name="photo">

                            <p style="
                            color:#6b7280;
                            margin-top:12px;
                            font-size:14px;
                            ">
                                📷 Upload JPG, JPEG or PNG image (optional)
                            </p>

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div style="
                    display:flex;
                    gap:16px;
                    flex-wrap:wrap;
                    ">

                        <button
                            type="submit"
                            style="
                            background:linear-gradient(135deg,#7e22ce,#db2777);
                            color:white;
                            border:none;
                            padding:16px 34px;
                            border-radius:18px;
                            font-size:18px;
                            font-weight:700;
                            box-shadow:0 8px 20px rgba(126,34,206,.25);
                            cursor:pointer;
                            ">

                            Submit Review

                        </button>

                        <a href="{{ route('reviews.index') }}"
                           style="
                           background:#ede9fe;
                           color:#6d28d9;
                           padding:16px 34px;
                           border-radius:18px;
                           text-decoration:none;
                           font-size:18px;
                           font-weight:700;
                           border:1px solid #d8b4fe;
                           ">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>