<x-app-layout>
<x-slot  name="header">
  <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center">Review and Rating </h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="mb-4 text-right">
        <a href="{{ route('reviews.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add New Review</a>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Profile</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Review</th>
                <th class="py-2 px-4 border-b">Rating</th>
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Publish</th>
                <th class="py-2 px-4 border-b">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">
                      <img style="width:150px; height:150px" class="max-w-16 max-h-16" src="{{ asset('storage/images/' .$review->profile) }}" /></td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $review->name }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $review->review }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $review->rating }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $review->status }}</td>
                    @if($review->status=='draft')
                        <td class="px-6 py-3 border border-b-2 border-gray-200 ">
                            <form action="{{ route('reviews.approve', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to approve this review?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600"><i class="fa-solid fa-check"></i> </button>
                            </form>
                        </td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"><i class="fa-solid fa-xmark"></i> </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-gray-100 dark:text-amber-500 mt-2">
        {{ $reviews->links('pagination::tailwind', ['class' => 'bg-gray-800']) }}
    </div>
</div>
</x-slot>
</x-app-layout>