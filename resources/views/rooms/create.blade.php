<x-app-layout>
  <x-slot name="header">
      <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4 text-center">Add Room</h2>
          <form action="{{ route('rooms.store') }}" method="POST">
              @csrf
              <div class="mb-4">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
              </div>
              
              <div class="mb-4">
                  <label for="room_count" class="block text-sm font-medium text-gray-700">Room Count</label>
                  <input type="number" name="room_count" id="room_count" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
              </div>
              
              <div class="mb-4">
                  <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                  <input type="number" name="price" id="price" step="0.01" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
              </div>
              
              <div class="mb-4">
                  <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                  <textarea name="description" id="description" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
              </div>
              
              <div class="text-center">
                  <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
              </div>
          </form>
      </div>
  </x-slot>
</x-app-layout>