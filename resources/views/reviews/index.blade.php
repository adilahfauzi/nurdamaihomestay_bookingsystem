<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Homestay Reviews
                </h1>

                <a href="{{ route('reviews.create') }}"
                   class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                    + Add Review
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <table class="w-full">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left">Homestay</th>
                            <th class="px-4 py-3 text-left">Reviewer</th>
                            <th class="px-4 py-3 text-center">Rating</th>
                            <th class="px-4 py-3 text-left">Comment</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($reviews as $review)
                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-4 py-3">
                                    {{ $review->homestay->name ?? 'Homestay' }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $review->reviewer_name }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    @for($i = 1; $i <= $review->rating; $i++)
                                        ⭐
                                    @endfor
                                </td>

                                <td class="px-4 py-3">
                                    {{ $review->comment }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('reviews.edit',$review->id) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('reviews.destroy',$review->id) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Delete this review?')"
                                                class="bg-red-600 text-white px-3 py-1 rounded">
                                            Delete
                                        </button>

                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-500">
                                    No reviews found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</x-app-layout>