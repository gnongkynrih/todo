<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookings') }}
        </h2>
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
                                    <td class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider"><i class="fa-regular fa-square"></i></td>
                                    <td class="px-6 py-3 text-red-500 border border-b-2 border-gray-200 font-medium text-left text-xs leading-4 tracking-wider"><i class="fa-solid fa-xmark"></i></td>
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
</x-app-layout>
