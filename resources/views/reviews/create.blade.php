<x-app-layout>
  <x-slot name="header">
      <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4 text-center">Add Review</h2>
          <form action="{{ route('reviews.store') }}" method="POST"  enctype="multipart/form-data">
              @csrf
              
              <div class="mb-4">
                  <label for="image" class="block text-sm font-medium text-gray-700">Profile</label>
                  <input type="file" name="image" id="image" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
              </div>
              
              <div class="mb-4">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input required type="text" name="name" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
              </div>
              <div class="mb-4">
                  <label for="review" class="block text-sm font-medium text-gray-700">Review</label>
                  <textarea required type="text" name="review" id="review" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
              </div>
              <div class="mb-4">
                  <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                  <input required min="1" max="5" type="number" name="rating" id="rating" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
              </div>
              <div class="text-center">
                  <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
              </div>
          </form>
      </div>
  </x-slot>
</x-app-layout>