<x-app-layout>
  <x-slot name="header">
      <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4 text-center">Add Room</h2>
          <form action="{{ route('roomImages.store') }}" method="POST"  enctype="multipart/form-data">
              @csrf
              <div class="mb-4">
                  <label for="room_id" class="block text-sm font-medium text-gray-700">Room</label>
                  <select name="room_id" id="room_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                      <option value="">Select Room</option>
                      @foreach($rooms as $room)
                          <option value="{{ $room->id }}">{{ $room->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="mb-4">
                  <label for="show_in_bookroom" class="block text-sm font-medium text-gray-700">Room</label>
                  <select name="show_in_bookroom" id="show_in_bookroom" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                      <option value="no">No</option>
                      <option value="yes">Yes</option>
                  </select>
              </div>
              <div class="mb-4">
                  <label for="image" class="block text-sm font-medium text-gray-700">Room Count</label>
                  <input type="file" name="image" id="image" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
              </div>
              
              <div class="mb-4">
                  <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                  <input type="text" name="title" id="title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
              </div>
              
              <div class="text-center">
                  <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
              </div>
          </form>
      </div>
  </x-slot>
</x-app-layout>