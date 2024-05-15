<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookings') }}
        </h2>
        <form action="{{route('dashboard')}}" method="get">
        @csrf
            <div class="flex">
                <select name="bookingstatus" id="bookingstatus" class="form-select mt-1 block w-1/4">
                    <option value="pending" {{ request('bookingstatus') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('bookingstatus') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ request('bookingstatus') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                    <i class="fa-solid fa-search"></i>&nbsp;Filter</button>
            </div>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full table-auto border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Sl No</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Name</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Mobile</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Email</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Room Type</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Check in</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Check out</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Room <br/>Count</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Confirm</th>
                                <th class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                                    <td class="px-6 py-4 border border-b border-gray-200">{{ ($bookings->currentPage() - 1) * $bookings->perPage() + $loop->iteration }}</td>
                                    <td class="px-6 py-4 border border-b border-gray-200">{{ $booking->name }}</td>
                                    <td class="px-6 py-4 border border-b border-gray-200">{{ $booking->mobile }}</td>
                                    <td class="px-6 py-4 border border-b border-gray-200">{{ $booking->email }}</td>
                                    <td class="px-6 py-4 border border-b border-gray-200">{{ $booking->roomType }}</td>
                                    <td class="px-6 py-4 border border-b border-gray-200">{{ $booking->arrival_date }}</td>
                                    <td class="px-6 py-4 border border-b border-gray-200">{{ $booking->departure_date }}</td>
                                    <td class="px-6 py-4 border border-b border-gray-200">{{ $booking->roomCount }}</td>
                                    <td class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider">
                                        <a href="#" @click.prevent="confirmDelete = true; bookingId = {{ $booking->id }}">
                                            <i class="fa-regular fa-square"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider  text-red-500">
                                        <a href="#" @click.prevent="confirmDelete = true; bookingId = {{ $booking->id }}">
                                            <i class="fa-regular fa-rectangle-xmark"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-gray-100 dark:text-amber-500 mt-2">
                {{ $bookings->links('pagination::tailwind', ['class' => 'bg-gray-800']) }}
            </div>
                </div>
            </div>
        </div>
    </div>
    <div x-data="{ confirmDelete: false, bookingId: null }">
  <div x-show="confirmDelete" x-cloak @close.away="confirmDelete = false">
    <div class="fixed inset-0 bg-gray-500 opacity-75 transition-opacity"></div>
    <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-md p-4">
      <p class="text-lg font-medium text-center">Are you sure you want to delete booking?</p>
      <div class="flex justify-end mt-4">
        <button type="button" class="btn btn-outline mr-2" @click="confirmDelete = false">Cancel</button>
        <button wire:click="deleteBooking(bookingId)" class="btn btn-danger" @click="confirmDelete = false">Delete</button>
      </div>
    </div>
  </div>

  </div>
</x-app-layout>
