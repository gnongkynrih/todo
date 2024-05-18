<x-app-layout>
<x-slot  name="header">
  <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center">Room List</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="mb-4 text-right">
        <a href="{{ route('rooms.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create New Room</a>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Room Count</th>
                <th class="py-2 px-4 border-b">Price</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $room->name }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $room->room_count }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ number_format($room->price, 2) }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200 ">{{ $room->description }}</td>
                    <td class="px-6 py-3 border border-b-2 border-gray-200  text-center">
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this room?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-slot>
</x-app-layout>