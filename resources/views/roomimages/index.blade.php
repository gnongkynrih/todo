<x-app-layout>
<x-slot  name="header">
  <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center">Room Images </h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="mb-4 text-right">
        <a href="{{ route('roomImages.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add New Image</a>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Image</th>
                <th class="py-2 px-4 border-b">Room</th>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">
                      <img style="width:150px; height:150px" class="max-w-16 max-h-16" src="{{ asset('storage/images/' .$image->image) }}" /></td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $image->room->name }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $image->title }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">
                        <form action="{{ route('roomImages.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"><i class="fa-solid fa-xmark"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-slot>
</x-app-layout>