
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
                                    <td class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-lg leading-4 tracking-wider text-green-500">
                                        <a href="#" class="confirm" >
                                            <i class="fa-solid fa-check"" id="C{{$booking->id}}"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-3 border border-b-2 border-gray-200 font-medium text-left text-lg leading-4 tracking-wider  text-red-500">
                                        <a href="#" class="confirm" >
                                            <i class="fa-solid fa-xmark" id="D{{$booking->id}}"></i>
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

</x-app-layout>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        let confirm = document.querySelectorAll('.confirm');
        //loop through all elements
        confirm.forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                let id = e.target.id;
                let action = id.charAt(0);
                let msg = '';
                if(action === 'C') {
                    msg = 'Are you sure you want to confirm this booking?';
                } else {
                    msg = 'Are you sure you want to cancel this booking?';
                }
                // display confirmation dialog box
                
                let bookingId = id.substring(1);
                let bookingStatus = action === 'C' ? 'confirmed' : 'cancelled';
                Swal.fire({
                    title: 'Are you sure',
                    text: `${msg}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send a PUT request to the server using Axios
                        axios.put('/booking/' + bookingId, {
                            status: bookingStatus
                        }, {
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => {
                            // Display success toast notification
                            Toastify({
                                text: "Booking status updated successfully!",
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                backgroundColor: "#4CAF50",
                                stopOnFocus: true // Prevents dismissing of toast on hover
                            }).showToast();

                            //hide the row
                            document.getElementById(id).closest('tr').style.display = 'none';
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // Display error toast notification
                            Toastify({
                                text: "An error occurred. Please try again.",
                                duration: 3000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                backgroundColor: "#F44336",
                                stopOnFocus: true // Prevents dismissing of toast on hover
                            }).showToast();
                        });
                    }
                });
            });
        });
    });
</script>